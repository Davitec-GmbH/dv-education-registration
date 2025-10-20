<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:tx_dveducationregistration_domain_model_participant',
        'label' => 'last_name',
        'label_alt' => 'first_name,email',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => ['disabled' => 'hidden'],
        'searchFields' => 'first_name,last_name,email,company',
        'iconIdentifier' => 'ext-dveducationregistration-participant',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    salutation, first_name, last_name, email, phone, company,
                --div--;LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:tab.address,
                    address, zipcode, city,
                --div--;LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:tab.registration,
                    event_uid, confirmed, confirmation_hash, notes,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden,
            ',
        ],
    ],
    'columns' => [
        'salutation' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.salutation', 'config' => ['type' => 'input', 'size' => 10, 'max' => 20]],
        'first_name' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.first_name', 'config' => ['type' => 'input', 'size' => 30, 'max' => 255, 'required' => true]],
        'last_name' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.last_name', 'config' => ['type' => 'input', 'size' => 30, 'max' => 255, 'required' => true]],
        'email' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.email', 'config' => ['type' => 'email', 'required' => true]],
        'phone' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.phone', 'config' => ['type' => 'input', 'size' => 20, 'max' => 50]],
        'company' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.company', 'config' => ['type' => 'input', 'size' => 30, 'max' => 255]],
        'address' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.address', 'config' => ['type' => 'input', 'size' => 50, 'max' => 255]],
        'city' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.city', 'config' => ['type' => 'input', 'size' => 30, 'max' => 255]],
        'zipcode' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.zipcode', 'config' => ['type' => 'input', 'size' => 10, 'max' => 20]],
        'notes' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.notes', 'config' => ['type' => 'text', 'rows' => 5]],
        'event_uid' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.event_uid', 'config' => ['type' => 'number']],
        'confirmation_hash' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.confirmation_hash', 'config' => ['type' => 'input', 'size' => 64, 'readOnly' => true]],
        'confirmed' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.confirmed', 'config' => ['type' => 'check', 'renderType' => 'checkboxToggle', 'readOnly' => true]],
    ],
];
