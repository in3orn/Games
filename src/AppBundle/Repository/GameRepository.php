<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Game;
use AppBundle\Repository\Base\BaseEntityRepository;

class GameRepository extends BaseEntityRepository
{
    /**
	 * {@inheritdoc}
	 */
	protected function getEntityType() {
		return Game::class;
	}
}