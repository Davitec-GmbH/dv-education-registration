<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Domain model for an inquiry request (inhouse or info material).
 */
class InquiryRequest extends AbstractEntity
{
    protected string $salutation = '';
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $email = '';
    protected string $phone = '';
    protected string $company = '';
    protected string $notes = '';
    protected string $requestType = 'info';
    protected int $courseUid = 0;

    public function getName(): string
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    public function getSalutation(): string { return $this->salutation; }
    public function setSalutation(string $salutation): void { $this->salutation = $salutation; }
    public function getFirstName(): string { return $this->firstName; }
    public function setFirstName(string $firstName): void { $this->firstName = $firstName; }
    public function getLastName(): string { return $this->lastName; }
    public function setLastName(string $lastName): void { $this->lastName = $lastName; }
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function getPhone(): string { return $this->phone; }
    public function setPhone(string $phone): void { $this->phone = $phone; }
    public function getCompany(): string { return $this->company; }
    public function setCompany(string $company): void { $this->company = $company; }
    public function getNotes(): string { return $this->notes; }
    public function setNotes(string $notes): void { $this->notes = $notes; }
    public function getRequestType(): string { return $this->requestType; }
    public function setRequestType(string $requestType): void { $this->requestType = $requestType; }
    public function getCourseUid(): int { return $this->courseUid; }
    public function setCourseUid(int $courseUid): void { $this->courseUid = $courseUid; }
}
