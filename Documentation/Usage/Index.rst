.. include:: ../Includes.rst.txt

=====
Usage
=====

.. contents:: Table of Contents
   :local:
   :depth: 2

Adding the registration form
=============================

The registration form is displayed on an event detail page or any page where
visitors should be able to sign up for a specific event.

1. Edit the page where the form should appear.
2. Add a new content element of type **Registration Form**
   (``dveducationregistration_registrationform``).
3. The form receives the ``eventUid`` either via a GET parameter (when linked
   from an event list) or from the TypoScript setting ``settings.eventUid``.

The form collects the following participant data:

- Salutation, first name, last name
- Email address, phone number
- Company name
- Address, city, zip code
- Notes (free text)

A checkbox for accepting the terms and conditions is rendered if
``settings.termsPageUid`` is set.

Confirmation workflow
======================

The double opt-in confirmation follows these steps:

1. **User submits the registration form** -- the ``createAction`` stores a new
   ``Participant`` record with ``confirmed = false`` and generates a random
   64-character hex hash (``confirmationHash``).

2. **Confirmation email is sent** -- the participant receives an email
   containing a unique confirmation link. The link points to the page
   configured in ``settings.confirmationPid`` and includes the hash as a
   parameter.

3. **User clicks the confirmation link** -- the ``confirmAction`` looks up the
   participant by hash. If found, it sets ``confirmed = true`` and displays
   a success message.

4. **Invalid or expired hash** -- if no matching record is found (e.g., the
   hash is wrong or the record was already deleted by garbage collection),
   an error message is shown.

At the same time, an **admin notification** email is sent to the address
configured in ``settings.adminEmail`` immediately when the registration is
created (step 1), so the admin is informed without waiting for confirmation.

Confirmation page setup
-----------------------

The confirmation page needs its own **Registration Form** content element:

1. Create a dedicated page (e.g., "Registration Confirmation").
2. Insert the **Registration Form** content element on this page.
3. Set the UID of this page as ``settings.confirmationPid`` in TypoScript
   constants.
4. The confirmation link in the email will direct users to this page with
   the ``hash`` parameter.

Inquiry form setup
===================

The inquiry form allows visitors to request inhouse training or general
information about a course.

1. Edit the page where the inquiry form should appear (typically the course
   detail page).
2. Add a content element of type **Inquiry Form**
   (``dveducationregistration_inquiryform``).

The form collects:

- Salutation, first name, last name
- Email address, phone number
- Company name
- Request type: **info** (general information) or **inhouse** (on-site
  training request)
- Course UID (can be passed automatically from the course detail context)
- Notes (free text)

On submission, an admin notification email is sent to the address configured
in ``settings.adminEmail``.

Admin notifications
====================

Three types of email notifications are sent to the admin:

**New registration**
   Sent immediately when a participant submits the registration form.
   Contains: participant name, email, company, and event UID.

**New inquiry**
   Sent when a visitor submits the inquiry form. Contains: request type
   (info/inhouse), name, email, company, and notes.

All emails are sent from the address configured in
``$GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress']``.

Typical page structure
=======================

A recommended page tree setup:

.. code-block:: none

   Root
   +-- Courses (list view from dv_education_courses)
   |   +-- Course Detail (detail view from dv_education_courses)
   |       +-- Event Registration
   |       |   Content: Registration Form plugin
   |       +-- Inquiry
   |           Content: Inquiry Form plugin
   +-- Registration Confirmation
   |   Content: Registration Form plugin (handles confirm action)
   +-- Terms and Conditions
   |   Content: Regular text content with T&C
   +-- Storage (SysFolder, not in menu)
       Stores: Participant records, InquiryRequest records

Configuration summary for this setup:

- ``persistence.storagePid`` = UID of "Storage" folder
- ``settings.adminEmail`` = admin email address
- ``settings.confirmationPid`` = UID of "Registration Confirmation" page
- ``settings.termsPageUid`` = UID of "Terms and Conditions" page
