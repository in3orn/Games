<?php

namespace AppBundle\Form\Filter;

use AppBundle\Entity\Filter\GameFilter;
use AppBundle\Form\Filter\Base\SimpleEntityFilterType;

class GameFilterType extends SimpleEntityFilterType
{
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Entity\Filter\Base\SimpleEntityFilterType::getEntityType()
	 */
	protected function getEntityType() {
		return GameFilter::class;
	}
}