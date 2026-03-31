.. include:: ../Includes.rst.txt

.. _configuration:

=============
Configuration
=============

.. contents:: Table of Contents
   :local:
   :depth: 2

TypoScript constants
====================

All settings are configured as TypoScript constants under
``plugin.tx_dveducationregistration``. Use the :guilabel:`Constant Editor`
in the TYPO3 backend or set them in your site package.

.. t3-field-list-table::
   :header-rows: 1

   - :Constant: Constant
     :Type: Type
     :Default: Default
     :Description: Description

   - :Constant: ``persistence.storagePid``
     :Type: int
     :Default: *(empty)*
     :Description:
        UID of the SysFolder where participant and inquiry records are stored.

   - :Constant: ``settings.adminEmail``
     :Type: string
     :Default: *(empty)*
     :Description:
        Email address that receives admin notifications for new registrations
        and inquiries.

   - :Constant: ``settings.confirmationPid``
     :Type: int
     :Default: *(empty)*
     :Description:
        UID of the page that contains the Registration Form plugin used for
        the confirmation action. The confirmation link in the email points to
        this page.

   - :Constant: ``settings.termsPageUid``
     :Type: int
     :Default: *(empty)*
     :Description:
        UID of the page containing the terms and conditions. Used to render
        a link in the registration form.

Example:

.. code-block:: typoscript

   plugin.tx_dveducationregistration {
       persistence.storagePid = 42
       settings {
           adminEmail = admin@example.com
           confirmationPid = 55
           termsPageUid = 60
       }
   }

Plugins (CType content elements)
=================================

The extension registers two CType plugins. Both are **fully non-cacheable**
(all actions are listed as non-cacheable in ``ext_localconf.php``).

Registration Form
-----------------

- **CType**: ``dveducationregistration_registrationform``
- **Controller**: ``RegistrationController``
- **Actions**: ``new``, ``create``, ``confirm``
- **Purpose**: Displays the registration form for a specific event and handles
  the double opt-in confirmation.

Inquiry Form
------------

- **CType**: ``dveducationregistration_inquiryform``
- **Controller**: ``InquiryController``
- **Actions**: ``new``, ``create``
- **Purpose**: Displays the inquiry form for inhouse training or information
  requests.

FlexForm
========

If FlexForm XML files are provided in
``Configuration/FlexForms/``, they allow editors to override
TypoScript settings per content element (e.g., selecting a specific event or
overriding the admin email). Check the content element's plugin settings tab
in the backend for available options.

Caching
=======

Both plugins are registered as entirely non-cacheable. Every action
(``new``, ``create``, ``confirm``) bypasses the TYPO3 page cache. This
ensures that:

- Form tokens (``__trustedProperties``, ``__referrer``) are always fresh.
- Flash messages are displayed correctly after form submission.
- The confirmation action always reads the current database state.

No additional cache configuration is needed.

Email template customization
=============================

Email subjects and body texts are loaded via ``LocalizationUtility`` from
the extension's language files at:

.. code-block:: none

   EXT:dv_education_registration/Resources/Private/Language/

To customize email texts, override the language labels in your site package
using TYPO3's standard localization override mechanism in
:file:`config/system/settings.php`:

.. code-block:: php

   $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']
       ['EXT:dv_education_registration/Resources/Private/Language/locallang.xlf'][]
       = 'EXT:my_site_package/Resources/Private/Language/Overrides/dv_education_registration.xlf';

Relevant label keys:

- ``email.confirmation.subject`` -- subject line for the confirmation email
- ``email.confirmation.body`` -- body of the confirmation email (placeholders:
  ``%1$s`` = participant name, ``%2$s`` = confirmation URL)
- ``email.admin.subject`` -- subject line for admin registration notification
- ``email.inquiry.subject`` -- subject line for admin inquiry notification

Garbage collection (scheduler task)
=====================================

The extension provides a garbage collection task for DSGVO-compliant
deletion of old records. Configure it in the TYPO3 Scheduler:

1. Go to :guilabel:`Admin Tools > Scheduler`.
2. Create a new task of type **Garbage Collection** (provided by this
   extension).
3. Configure the retention periods:

   - **Participant records**: 365 days (default) -- confirmed and unconfirmed
     registrations older than this are permanently deleted.
   - **Inquiry records**: 180 days (default) -- inquiry requests older than
     this are permanently deleted.

4. Set the task frequency (recommended: daily).

This ensures that personal data is not stored longer than necessary,
in compliance with GDPR/DSGVO requirements.
