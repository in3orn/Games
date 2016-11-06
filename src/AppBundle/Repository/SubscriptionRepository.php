<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Subscription;
use AppBundle\Repository\Base\BaseEntityRepository;

class SubscriptionRepository extends BaseEntityRepository
{
    /**
	 * {@inheritdoc}
	 */
	protected function getEntityType() {
		return Subscription::class;
	}
}