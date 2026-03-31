<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Tests\Unit\Domain\Model;

use Davitec\DvEducationRegistration\Domain\Model\Participant;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class ParticipantTest extends UnitTestCase
{
    private Participant $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Participant();
    }

    #[Test]
    public function salutationIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getSalutation());
    }

    #[Test]
    public function setSalutationRetainsValue(): void
    {
        $this->subject->setSalutation('Herr');
        self::assertSame('Herr', $this->subject->getSalutation());
    }

    #[Test]
    public function firstNameIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getFirstName());
    }

    #[Test]
    public function setFirstNameRetainsValue(): void
    {
        $this->subject->setFirstName('Max');
        self::assertSame('Max', $this->subject->getFirstName());
    }

    #[Test]
    public function lastNameIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getLastName());
    }

    #[Test]
    public function setLastNameRetainsValue(): void
    {
        $this->subject->setLastName('Mustermann');
        self::assertSame('Mustermann', $this->subject->getLastName());
    }

    #[Test]
    public function emailIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getEmail());
    }

    #[Test]
    public function setEmailRetainsValue(): void
    {
        $this->subject->setEmail('max@example.com');
        self::assertSame('max@example.com', $this->subject->getEmail());
    }

    #[Test]
    public function phoneIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getPhone());
    }

    #[Test]
    public function setPhoneRetainsValue(): void
    {
        $this->subject->setPhone('+49 351 123456');
        self::assertSame('+49 351 123456', $this->subject->getPhone());
    }

    #[Test]
    public function companyIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getCompany());
    }

    #[Test]
    public function setCompanyRetainsValue(): void
    {
        $this->subject->setCompany('Davitec GmbH');
        self::assertSame('Davitec GmbH', $this->subject->getCompany());
    }

    #[Test]
    public function addressIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getAddress());
    }

    #[Test]
    public function setAddressRetainsValue(): void
    {
        $this->subject->setAddress('Musterstraße 1');
        self::assertSame('Musterstraße 1', $this->subject->getAddress());
    }

    #[Test]
    public function cityIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getCity());
    }

    #[Test]
    public function setCityRetainsValue(): void
    {
        $this->subject->setCity('Dresden');
        self::assertSame('Dresden', $this->subject->getCity());
    }

    #[Test]
    public function zipcodeIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getZipcode());
    }

    #[Test]
    public function setZipcodeRetainsValue(): void
    {
        $this->subject->setZipcode('01069');
        self::assertSame('01069', $this->subject->getZipcode());
    }

    #[Test]
    public function notesIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getNotes());
    }

    #[Test]
    public function setNotesRetainsValue(): void
    {
        $this->subject->setNotes('Vegetarisches Essen');
        self::assertSame('Vegetarisches Essen', $this->subject->getNotes());
    }

    #[Test]
    public function eventUidIsZeroByDefault(): void
    {
        self::assertSame(0, $this->subject->getEventUid());
    }

    #[Test]
    public function setEventUidRetainsValue(): void
    {
        $this->subject->setEventUid(42);
        self::assertSame(42, $this->subject->getEventUid());
    }

    #[Test]
    public function confirmationHashIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getConfirmationHash());
    }

    #[Test]
    public function setConfirmationHashRetainsValue(): void
    {
        $this->subject->setConfirmationHash('abc123def456');
        self::assertSame('abc123def456', $this->subject->getConfirmationHash());
    }

    #[Test]
    public function confirmedIsFalseByDefault(): void
    {
        self::assertFalse($this->subject->getConfirmed());
    }

    #[Test]
    public function setConfirmedRetainsValue(): void
    {
        $this->subject->setConfirmed(true);
        self::assertTrue($this->subject->getConfirmed());
    }

    #[Test]
    public function getNameReturnsFullName(): void
    {
        $this->subject->setFirstName('Max');
        $this->subject->setLastName('Mustermann');
        self::assertSame('Max Mustermann', $this->subject->getName());
    }

    #[Test]
    public function getNameReturnsFirstNameOnlyWhenLastNameIsEmpty(): void
    {
        $this->subject->setFirstName('Max');
        self::assertSame('Max', $this->subject->getName());
    }

    #[Test]
    public function getNameReturnsLastNameOnlyWhenFirstNameIsEmpty(): void
    {
        $this->subject->setLastName('Mustermann');
        self::assertSame('Mustermann', $this->subject->getName());
    }

    #[Test]
    public function getNameReturnsEmptyStringWhenBothNamesAreEmpty(): void
    {
        self::assertSame('', $this->subject->getName());
    }
}
