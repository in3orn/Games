<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\Admin\Base\SimpleEntityController;
use AppBundle\Entity\Filter\SubscriptionFilter;
use AppBundle\Entity\Game;
use AppBundle\Entity\Subscription;
use AppBundle\Entity\User;
use AppBundle\Form\Filter\SubscriptionFilterType;
use AppBundle\Form\SubscriptionType;
use Symfony\Component\HttpFoundation\Request;

class SubscriptionController extends SimpleEntityController {
	
	//------------------------------------------------------------------------
	// Entity creators
	//------------------------------------------------------------------------
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::createNewEntity()
	 */
	protected function createNewEntity(Request $request) {
		return new Subscription();
	}
	
	/**
	 *
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::createNewFilter()
	 */
	protected function createNewFilter() {
		$gameRepository = $this->getDoctrine()->getRepository(Game::class);
		$userRepository = $this->getDoctrine()->getRepository(User::class);
		
		return new SubscriptionFilter($gameRepository, $userRepository);
	}
	
	
	//------------------------------------------------------------------------
	// Entity types
	//------------------------------------------------------------------------
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::getEntityType()
	 */
	protected function getEntityType() {
		return Subscription::class;
	}
	
	
	//------------------------------------------------------------------------
	// Form types
	//------------------------------------------------------------------------
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::getFormType()
	 */
	protected function getFormType() {
		return SubscriptionType::class;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::getFilterFormType()
	 */
	protected function getFilterFormType() {
		return SubscriptionFilterType::class;
	}
}