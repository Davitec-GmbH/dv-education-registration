<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Service;

use Davitec\DvEducationRegistration\Domain\Model\InquiryRequest;
use Davitec\DvEducationRegistration\Domain\Model\Participant;
use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Service for sending registration-related emails.
 */
class EmailService
{
    /**
     * Send registration confirmation to participant.
     */
    public function sendConfirmation(Participant $participant, string $confirmUrl, string $fromEmail): void
    {
        $subject = LocalizationUtility::translate('email.confirmation.subject', 'DvEducationRegistration') ?? 'Registration Confirmation';

        $body = LocalizationUtility::translate('email.confirmation.body', 'DvEducationRegistration', [
            $participant->getName(),
            $confirmUrl,
        ]) ?? 'Dear ' . $participant->getName() . ', please confirm: ' . $confirmUrl;

        $mail = GeneralUtility::makeInstance(MailMessage::class);
        $mail->from(new Address($fromEmail))
            ->to(new Address($participant->getEmail(), $participant->getName()))
            ->subject($subject)
            ->text($body)
            ->send();
    }

    /**
     * Send admin notification about new registration.
     */
    public function sendAdminNotification(Participant $participant, string $adminEmail, string $fromEmail): void
    {
        $subject = LocalizationUtility::translate('email.admin.subject', 'DvEducationRegistration') ?? 'New Registration';

        $body = sprintf(
            "New registration:\nName: %s\nEmail: %s\nCompany: %s\nEvent UID: %d",
            $participant->getName(),
            $participant->getEmail(),
            $participant->getCompany(),
            $participant->getEventUid()
        );

        $mail = GeneralUtility::makeInstance(MailMessage::class);
        $mail->from(new Address($fromEmail))
            ->to(new Address($adminEmail))
            ->subject($subject)
            ->text($body)
            ->send();
    }

    /**
     * Send inquiry notification to admin.
     */
    public function sendInquiryNotification(InquiryRequest $request, string $adminEmail, string $fromEmail): void
    {
        $subject = LocalizationUtility::translate('email.inquiry.subject', 'DvEducationRegistration') ?? 'New Inquiry';

        $body = sprintf(
            "New %s inquiry:\nName: %s\nEmail: %s\nCompany: %s\nNotes: %s",
            $request->getRequestType(),
            $request->getName(),
            $request->getEmail(),
            $request->getCompany(),
            $request->getNotes()
        );

        $mail = GeneralUtility::makeInstance(MailMessage::class);
        $mail->from(new Address($fromEmail))
            ->to(new Address($adminEmail))
            ->subject($subject)
            ->text($body)
            ->send();
    }
}
