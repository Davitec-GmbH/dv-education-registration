<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class InquiryRequestRepository extends Repository
{
    protected $defaultOrderings = [
        'crdate' => QueryInterface::ORDER_DESCENDING,
    ];

    public function findByRequestType(string $type): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('requestType', $type));
        return $query->execute();
    }

    public function findExpired(\DateTime $before): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->lessThan('crdate', $before->getTimestamp()));
        return $query->execute();
    }
}
