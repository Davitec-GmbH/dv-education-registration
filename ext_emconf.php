<?php

declare(strict_types=1);

$EM_CONF[$_EXTKEY] = [
    'title' => 'Education Registration',
    'description' => 'Online registration for education courses with PDF confirmation and email notifications.',
    'category' => 'plugin',
    'author' => 'Davitec GmbH, +Pluswerk Standort Dresden',
    'author_email' => 'devops@davitec.de',
    'author_company' => 'Davitec GmbH',
    'state' => 'stable',
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
            'dv_education_courses' => '1.0.0-1.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
