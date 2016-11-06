<?php

namespace AppBundle\Entity\Filter\Base;

use Symfony\Component\HttpFoundation\Request;

abstract class BaseEntityFilter {
	
	/**
	 * 
	 * @param Request $request
	 */
	public abstract function initValues(Request $request);
	
	/**
	 * 
	 */
	public abstract function clearQueryValues();
	
	/**
	 * 
	 */
	public abstract function getValues();
	
	/**
	 * Helper function which converts entry list into id list
	 * useful in request handling.
	 *
	 * @param array $entries
	 * @return array
	 */
	protected function getIdValues($entries) {
		$result = array();
		if($entries) {
			foreach ($entries as $entry) {
				$result[] = $entry->getId();
			}
		}
		return $result;
	}
	
	//TODO check if simple findBy can replace this
	/**
	 * 
	 * @return string
	 */
	public function getFilterExpression() {
		$expressions = $this->getExpressions();
		
		$size = count($expressions);
		if($size > 0) {
			$expression = 'WHERE ' . $expressions[0];
			
			for($i = 1; $i < $size; $i++) {
				$expression .= 'AND ' . $expressions[$i] . ' ';
			}
			
			return $expression;
		}
		
		return '';
	}
	
	/**
	 * @return array
	 */
	protected abstract function getExpressions();
	
	/**
	 *
	 * @param unknown $name
	 * @param unknown $entries
	 * @return NULL|string
	 */
	protected function getEqualArrayExpression($name, $entries) {
		$size = count($entries);
		if($size == 0) return null;
	
		if($size == 1) {
			$expression = 'e.' . $name .' = ' . $entries[0]->getId();
		}
		else {
			$expression = 'e.' . $name .' in (' . $entries[0]->getId();
			for ($i = 1; $i < $size; $i++) {
				$expression .= ', ' . $entries[$i]->getId();
			}
			$expression .= ')';
		}
		return $expression;
	}
	
	/**
	 * return string
	 */
	public abstract function getOrderByExpression();
}