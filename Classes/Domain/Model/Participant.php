<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Domain model for a course/event registration participant.
 */
class Participant extends AbstractEntity
{
    protected string $salutation = '';
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $email = '';
    protected string $phone = '';
    protected string $company = '';
    protected string $address = '';
    protected string $city = '';
    protected string $zipcode = '';
    protected string $notes = '';
    protected int $eventUid = 0;
    protected string $confirmationHash = '';
    protected bool $confirmed = false;

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
    public function getAddress(): string { return $this->address; }
    public function setAddress(string $address): void { $this->address = $address; }
    public function getCity(): string { return $this->city; }
    public function setCity(string $city): void { $this->city = $city; }
    public function getZipcode(): string { return $this->zipcode; }
    public function setZipcode(string $zipcode): void { $this->zipcode = $zipcode; }
    public function getNotes(): string { return $this->notes; }
    public function setNotes(string $notes): void { $this->notes = $notes; }
    public function getEventUid(): int { return $this->eventUid; }
    public function setEventUid(int $eventUid): void { $this->eventUid = $eventUid; }
    public function getConfirmationHash(): string { return $this->confirmationHash; }
    public function setConfirmationHash(string $confirmationHash): void { $this->confirmationHash = $confirmationHash; }
    public function getConfirmed(): bool { return $this->confirmed; }
    public function setConfirmed(bool $confirmed): void { $this->confirmed = $confirmed; }
}
