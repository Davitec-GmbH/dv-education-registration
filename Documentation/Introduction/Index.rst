.. include:: ../Includes.rst.txt

============
Introduction
============

.. contents:: Table of Contents
   :local:
   :depth: 2

What does it do?
================

The extension **Education Registration** (``dv_education_registration``) provides online
registration for courses and events managed by the companion extension
``dv_education_courses``. Visitors can sign up for scheduled events directly
on the website. A double opt-in email confirmation workflow ensures that
only verified registrations are stored.

In addition, the extension offers inquiry forms that allow visitors to
request inhouse training or general information about a course without
committing to a specific event date.

Key features
============

- **Online event registration** -- participants fill out a form and receive a
  confirmation email with a unique verification link.
- **Double opt-in confirmation** -- the participant must click the link to
  confirm the registration; unconfirmed records are clearly flagged.
- **Admin notifications** -- configurable email address that receives
  notifications for every new registration and inquiry.
- **Inquiry forms** -- two request types are supported: *inhouse* (request for
  an on-site training) and *info* (general information request).
- **DSGVO-compliant garbage collection** -- a scheduler task automatically
  deletes old participant and inquiry records after configurable retention
  periods (default: 365 days for participants, 180 days for inquiries).
- **Non-cacheable plugins** -- both CType plugins are fully non-cacheable,
  ensuring forms always reflect the current state.

Dependencies
============

This extension **requires** ``dv_education_courses`` (composer package
``davitec/dv-education-courses``). It uses the Course and Event models
provided by that extension to link registrations and inquiries to the
correct course or event.

Supported TYPO3 versions:

- TYPO3 v12.4 LTS
- TYPO3 v13.4 LTS

Required PHP version: **8.2** or higher.
