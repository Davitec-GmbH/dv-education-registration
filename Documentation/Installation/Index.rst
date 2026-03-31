.. include:: ../Includes.rst.txt

============
Installation
============

.. contents:: Table of Contents
   :local:
   :depth: 2

Install via Composer
====================

Run the following command in your TYPO3 project root:

.. code-block:: bash

   composer require davitec/dv-education-registration

This automatically installs the required dependency
``davitec/dv-education-courses`` if it is not already present.

Activate the extension
======================

In the TYPO3 backend go to :guilabel:`Admin Tools > Extension Manager` and
activate **Education Registration** if it is not already active.

For Composer-based installations the extension is activated automatically.

Database update
===============

After installation, update the database schema:

- **Backend**: :guilabel:`Admin Tools > Maintenance > Analyze Database Structure`
  and apply all suggested changes.
- **CLI**:

  .. code-block:: bash

     vendor/bin/typo3 extension:setup

Include TypoScript
==================

Add the static TypoScript template to your site:

1. Go to :guilabel:`Web > Template` and select your root page.
2. Edit the template record and open the :guilabel:`Includes` tab.
3. Add **Education Registration (dv_education_registration)** from the list
   of available items.

Alternatively, include it directly in your site package:

.. code-block:: typoscript

   @import 'EXT:dv_education_registration/Configuration/TypoScript/setup.typoscript'
   @import 'EXT:dv_education_registration/Configuration/TypoScript/constants.typoscript'

Mail configuration
==================

The extension uses the TYPO3 mail API (``MailMessage``). Make sure your TYPO3
instance has a working mail transport configured. At minimum, set the default
sender address in :file:`config/system/settings.php` or
:file:`config/system/additional.php`:

.. code-block:: php

   $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] = 'noreply@example.com';
   $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'] = 'My Website';

   // Example: SMTP transport
   $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = 'smtp';
   $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = 'smtp.example.com:587';
   $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_encrypt'] = 'tls';
   $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = 'user@example.com';
   $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = 'secret';

Without a properly configured mail transport, confirmation and notification
emails will not be sent.

Quick start
===========

1. Install the extension via Composer.
2. Include the TypoScript template.
3. Set the TypoScript constants (see :ref:`Configuration <configuration>`):
   ``storagePid``, ``adminEmail``, ``confirmationPid``, ``termsPageUid``.
4. Create a page for the registration form and insert the
   **Registration Form** content element.
5. Create a separate page for confirmation and insert the same
   **Registration Form** content element (the ``confirm`` action uses it).
6. Verify your mail configuration by submitting a test registration.
