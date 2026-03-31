<?php

declare(strict_types=1);

namespace Davitec\DvEducationRegistration\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class ParticipantRepository extends Repository
{
    protected $defaultOrderings = [
        'crdate' => QueryInterface::ORDER_DESCENDING,
    ];

    public function findByEventUid(int $eventUid): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('eventUid', $eventUid));
        return $query->execute();
    }

    public function findByConfirmationHash(string $hash): ?object
    {
        $query = $this->createQuery();
        $query->matching($query->equals('confirmationHash', $hash));
        return $query->execute()->getFirst();
    }

    public function findExpired(\DateTime $before): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->lessThan('crdate', $before->getTimestamp()));
        return $query->execute();
    }
}
