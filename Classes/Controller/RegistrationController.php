<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Controller;

use Davitec\DvEducationRegistration\Domain\Model\Participant;
use Davitec\DvEducationRegistration\Domain\Repository\ParticipantRepository;
use Davitec\DvEducationRegistration\Service\EmailService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Controller for event registration.
 */
class RegistrationController extends ActionController
{
    public function __construct(
        private readonly ParticipantRepository $participantRepository,
        private readonly EmailService $emailService,
        private readonly PersistenceManager $persistenceManager,
    ) {}

    public function initializeCreateAction(): void
    {
        $config = $this->arguments->getArgument('participant')->getPropertyMappingConfiguration();
        $config->allowProperties(
            'salutation', 'firstName', 'lastName', 'email', 'phone',
            'company', 'address', 'city', 'zipcode', 'notes', 'eventUid'
        );
        $config->setTypeConverterOption(
            PersistentObjectConverter::class,
            PersistentObjectConverter::CONFIGURATION_CREATION_ALLOWED,
            true
        );
    }

    public function newAction(int $eventUid = 0): ResponseInterface
    {
        if ($eventUid === 0) {
            $eventUid = (int)($this->settings['eventUid'] ?? 0);
        }

        $this->view->assignMultiple([
            'eventUid' => $eventUid,
            'termsPageUid' => (int)($this->settings['termsPageUid'] ?? 0),
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Participant $participant): ResponseInterface
    {
        $participant->setConfirmationHash(bin2hex(random_bytes(32)));
        $participant->setConfirmed(false);

        $this->participantRepository->add($participant);
        $this->persistenceManager->persistAll();

        $confirmUrl = $this->uriBuilder
            ->setTargetPageUid((int)($this->settings['confirmationPid'] ?? 0))
            ->uriFor('confirm', ['hash' => $participant->getConfirmationHash()], 'Registration', 'DvEducationRegistration', 'RegistrationForm');

        $adminEmail = $this->settings['adminEmail'] ?? '';
        $fromEmail = $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] ?? 'noreply@example.com';

        if ($participant->getEmail() !== '') {
            $this->emailService->sendConfirmation($participant, $confirmUrl, $fromEmail);
        }

        if ($adminEmail !== '') {
            $this->emailService->sendAdminNotification($participant, $adminEmail, $fromEmail);
        }

        $this->addFlashMessage(
            LocalizationUtility::translate('registration.success', 'DvEducationRegistration') ?? '',
            LocalizationUtility::translate('registration.success.title', 'DvEducationRegistration') ?? '',
            ContextualFeedbackSeverity::OK
        );

        return $this->redirect('new', null, null, ['eventUid' => $participant->getEventUid()]);
    }

    public function confirmAction(string $hash = ''): ResponseInterface
    {
        $participant = $this->participantRepository->findByConfirmationHash($hash);

        if ($participant instanceof Participant) {
            $participant->setConfirmed(true);
            $this->participantRepository->update($participant);
            $this->persistenceManager->persistAll();

            $this->addFlashMessage(
                LocalizationUtility::translate('registration.confirmed', 'DvEducationRegistration') ?? '',
                '',
                ContextualFeedbackSeverity::OK
            );
        } else {
            $this->addFlashMessage(
                LocalizationUtility::translate('registration.invalidHash', 'DvEducationRegistration') ?? '',
                '',
                ContextualFeedbackSeverity::ERROR
            );
        }

        $this->view->assign('confirmed', $participant instanceof Participant);

        return $this->htmlResponse();
    }
}
