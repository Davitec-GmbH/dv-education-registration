<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:tx_dveducationregistration_domain_model_inquiryrequest',
        'label' => 'last_name',
        'label_alt' => 'first_name,request_type',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => ['disabled' => 'hidden'],
        'searchFields' => 'first_name,last_name,email',
        'iconIdentifier' => 'ext-dveducationregistration-inquiry',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => [
        '1' => ['showitem' => 'salutation, first_name, last_name, email, phone, company, request_type, course_uid, notes, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden'],
    ],
    'columns' => [
        'salutation' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.salutation', 'config' => ['type' => 'input', 'size' => 10, 'max' => 20]],
        'first_name' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.first_name', 'config' => ['type' => 'input', 'size' => 30, 'max' => 255, 'required' => true]],
        'last_name' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.last_name', 'config' => ['type' => 'input', 'size' => 30, 'max' => 255, 'required' => true]],
        'email' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.email', 'config' => ['type' => 'email', 'required' => true]],
        'phone' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.phone', 'config' => ['type' => 'input', 'size' => 20, 'max' => 50]],
        'company' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.company', 'config' => ['type' => 'input', 'size' => 30, 'max' => 255]],
        'notes' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.notes', 'config' => ['type' => 'text', 'rows' => 5]],
        'request_type' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.request_type', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['label' => 'Info', 'value' => 'info'], ['label' => 'Inhouse', 'value' => 'inhouse']]]],
        'course_uid' => ['label' => 'LLL:EXT:dv_education_registration/Resources/Private/Language/locallang_db.xlf:field.course_uid', 'config' => ['type' => 'number']],
    ],
];
