# Changelog

## [1.0.0] - 2026-03-28

### Added
- Full German translation
- Unit tests for all models
- RST documentation

### Changed
- Extension declared stable

## [0.2.0] - 2026-01-15

### Added
- Email confirmation workflow with hash-based verification
- Admin notification emails
- Inquiry form with inhouse/info request type selection
- Flash messages via LocalizationUtility

### Fixed
- Property mapping configuration for Participant creation
- cHash exclusion for all registration parameters

## [0.1.0] - 2025-10-20

### Added
- Initial extension for course/event registration
- Participant model with address and contact fields
- InquiryRequest model with request type (info/inhouse)
- RegistrationController with new, create, confirm actions
- InquiryController with new, create actions
- EmailService for confirmation and notification emails
- GarbageCollectionTask for DSGVO-compliant data cleanup
- Depends on dv_education_courses for Course/Event models
- TYPO3 v12.4 LTS and v13.4 LTS support
