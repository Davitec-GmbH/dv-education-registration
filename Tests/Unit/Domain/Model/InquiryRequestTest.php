<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Tests\Unit\Domain\Model;

use Davitec\DvEducationRegistration\Domain\Model\InquiryRequest;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class InquiryRequestTest extends UnitTestCase
{
    private InquiryRequest $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new InquiryRequest();
    }

    #[Test]
    public function salutationIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getSalutation());
    }

    #[Test]
    public function setSalutationRetainsValue(): void
    {
        $this->subject->setSalutation('Frau');
        self::assertSame('Frau', $this->subject->getSalutation());
    }

    #[Test]
    public function firstNameIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getFirstName());
    }

    #[Test]
    public function setFirstNameRetainsValue(): void
    {
        $this->subject->setFirstName('Erika');
        self::assertSame('Erika', $this->subject->getFirstName());
    }

    #[Test]
    public function lastNameIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getLastName());
    }

    #[Test]
    public function setLastNameRetainsValue(): void
    {
        $this->subject->setLastName('Musterfrau');
        self::assertSame('Musterfrau', $this->subject->getLastName());
    }

    #[Test]
    public function emailIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getEmail());
    }

    #[Test]
    public function setEmailRetainsValue(): void
    {
        $this->subject->setEmail('erika@example.com');
        self::assertSame('erika@example.com', $this->subject->getEmail());
    }

    #[Test]
    public function phoneIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getPhone());
    }

    #[Test]
    public function setPhoneRetainsValue(): void
    {
        $this->subject->setPhone('+49 351 654321');
        self::assertSame('+49 351 654321', $this->subject->getPhone());
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
    public function notesIsEmptyByDefault(): void
    {
        self::assertSame('', $this->subject->getNotes());
    }

    #[Test]
    public function setNotesRetainsValue(): void
    {
        $this->subject->setNotes('Bitte Info-Material zusenden');
        self::assertSame('Bitte Info-Material zusenden', $this->subject->getNotes());
    }

    #[Test]
    public function requestTypeIsInfoByDefault(): void
    {
        self::assertSame('info', $this->subject->getRequestType());
    }

    #[Test]
    public function setRequestTypeRetainsValue(): void
    {
        $this->subject->setRequestType('inhouse');
        self::assertSame('inhouse', $this->subject->getRequestType());
    }

    #[Test]
    public function courseUidIsZeroByDefault(): void
    {
        self::assertSame(0, $this->subject->getCourseUid());
    }

    #[Test]
    public function setCourseUidRetainsValue(): void
    {
        $this->subject->setCourseUid(99);
        self::assertSame(99, $this->subject->getCourseUid());
    }

    #[Test]
    public function getNameReturnsFullName(): void
    {
        $this->subject->setFirstName('Erika');
        $this->subject->setLastName('Musterfrau');
        self::assertSame('Erika Musterfrau', $this->subject->getName());
    }

    #[Test]
    public function getNameReturnsFirstNameOnlyWhenLastNameIsEmpty(): void
    {
        $this->subject->setFirstName('Erika');
        self::assertSame('Erika', $this->subject->getName());
    }

    #[Test]
    public function getNameReturnsLastNameOnlyWhenFirstNameIsEmpty(): void
    {
        $this->subject->setLastName('Musterfrau');
        self::assertSame('Musterfrau', $this->subject->getName());
    }

    #[Test]
    public function getNameReturnsEmptyStringWhenBothNamesAreEmpty(): void
    {
        self::assertSame('', $this->subject->getName());
    }
}
