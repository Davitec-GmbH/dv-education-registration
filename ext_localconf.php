<?php

declare(strict_types=1);

use Davitec\DvEducationRegistration\Controller\InquiryController;
use Davitec\DvEducationRegistration\Controller\RegistrationController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] = array_merge(
    $GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] ?? [],
    [
        'tx_dveducationregistration_registrationform[action]',
        'tx_dveducationregistration_registrationform[controller]',
        'tx_dveducationregistration_registrationform[__referrer]',
        'tx_dveducationregistration_registrationform[__trustedProperties]',
        'tx_dveducationregistration_registrationform[hash]',
        'tx_dveducationregistration_inquiryform[action]',
        'tx_dveducationregistration_inquiryform[controller]',
        'tx_dveducationregistration_inquiryform[__referrer]',
        'tx_dveducationregistration_inquiryform[__trustedProperties]',
    ],
);

ExtensionUtility::configurePlugin(
    'DvEducationRegistration',
    'RegistrationForm',
    [RegistrationController::class => 'new,create,confirm'],
    [RegistrationController::class => 'new,create,confirm'],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'DvEducationRegistration',
    'InquiryForm',
    [InquiryController::class => 'new,create'],
    [InquiryController::class => 'new,create'],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
