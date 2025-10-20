<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::registerPlugin('DvEducationRegistration', 'RegistrationForm', 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang.xlf:plugin.registration.title', 'ext-dveducationregistration-participant');
ExtensionUtility::registerPlugin('DvEducationRegistration', 'InquiryForm', 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang.xlf:plugin.inquiry.title', 'ext-dveducationregistration-inquiry');
