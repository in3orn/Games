<?php

namespace AppBundle\Form\Filter;

use AppBundle\Entity\Filter\UserFilter;
use AppBundle\Form\Filter\Base\SimpleEntityFilterType;

class UserFilterType extends SimpleEntityFilterType
{	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Entity\Filter\Base\SimpleEntityFilterType::getEntityType()
	 */
	protected function getEntityType() {
		return UserFilter::class;
	}
}