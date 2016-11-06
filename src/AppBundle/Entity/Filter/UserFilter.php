<?php

namespace AppBundle\Entity\Filter;

use AppBundle\Entity\Filter\Base\SimpleEntityFilter;

class UserFilter extends SimpleEntityFilter {
	
	protected function getExpressions() {
		$expressions = parent::getExpressions();
	
		for($i = 0; $i < count($expressions); $i++) {
			$expression = $expressions[$i];
			if (strpos($expression, 'e.name') !== false) {
				$expressions[$i] = str_replace('e.name', 'e.username', $expression);
			}
		}
	
		return $expressions;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Entity\Filter\Base\SimpleEntityFilter::getOrderByExpression()
	 */
	public function getOrderByExpression() {
		return ' ORDER BY e.username ASC ';
	}
}