<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Controller;

use Davitec\DvEducationRegistration\Domain\Model\InquiryRequest;
use Davitec\DvEducationRegistration\Domain\Repository\InquiryRequestRepository;
use Davitec\DvEducationRegistration\Service\EmailService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Controller for inquiry requests (inhouse or info material).
 */
class InquiryController extends ActionController
{
    public function __construct(
        private readonly InquiryRequestRepository $inquiryRequestRepository,
        private readonly EmailService $emailService,
        private readonly PersistenceManager $persistenceManager,
    ) {}

    public function initializeCreateAction(): void
    {
        $config = $this->arguments->getArgument('inquiryRequest')->getPropertyMappingConfiguration();
        $config->allowProperties(
            'salutation', 'firstName', 'lastName', 'email', 'phone',
            'company', 'notes', 'requestType', 'courseUid'
        );
        $config->setTypeConverterOption(
            PersistentObjectConverter::class,
            PersistentObjectConverter::CONFIGURATION_CREATION_ALLOWED,
            true
        );
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(InquiryRequest $inquiryRequest): ResponseInterface
    {
        $this->inquiryRequestRepository->add($inquiryRequest);
        $this->persistenceManager->persistAll();

        $adminEmail = $this->settings['adminEmail'] ?? '';
        $fromEmail = $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] ?? 'noreply@example.com';

        if ($adminEmail !== '') {
            $this->emailService->sendInquiryNotification($inquiryRequest, $adminEmail, $fromEmail);
        }

        $this->addFlashMessage(
            LocalizationUtility::translate('inquiry.success', 'DvEducationRegistration') ?? '',
            LocalizationUtility::translate('inquiry.success.title', 'DvEducationRegistration') ?? '',
            ContextualFeedbackSeverity::OK
        );

        return $this->redirect('new');
    }
}
