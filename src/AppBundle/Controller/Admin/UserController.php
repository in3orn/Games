<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\Admin\Base\SimpleEntityController;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Filter\UserFilter;
use AppBundle\Form\Filter\UserFilterType;
use AppBundle\Form\Lists\UserListType;
use AppBundle\Entity\Game;
use AppBundle\Entity\Subscription;

class UserController extends SimpleEntityController {
	
	public function profileAction(Request $request)
	{
		$tokenStorage = $this->get('security.token_storage');
		$entry = $tokenStorage->getToken()->getUser();
		
		$form = $this->createForm($this->getFormType(), $entry);
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid())
		{
			$this->saveEntry($entry);
		
			$this->addFlash('success', 'success.created');
		
			if ($form->get('save')->isClicked()) {
				return $this->redirectToRoute($this->getProfileRoute());
			}
		}
		
		$gameRepository = $this->getDoctrine()->getRepository(Game::class);
		$games = $gameRepository->findAll();
		
		$subscriptionRepository = $this->getDoctrine()->getRepository(Subscription::class);
		
		foreach ($games as $game) {
			$subscriptions = $subscriptionRepository->findBy(['user' => $entry, 'game' => $game]);
			$game->setSubscriptionsCount(count($subscriptions));
		}
			
		return $this->render($this->getTwigProfile(), array('form' => $form->createView(), 'entry' => $entry, 'games' => $games));
	}
	
	//------------------------------------------------------------------------
	// Entity creators
	//------------------------------------------------------------------------
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::createNewEntity()
	 */
	protected function createNewEntity(Request $request) {
		return new User();
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::createNewFilter()
	 */
	protected function createNewFilter() {
		return new UserFilter();
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
		return User::class;
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
		return UserType::class;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::getListFormType()
	 */
	protected function getListFormType() {
		return UserListType::class;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Controller\Admin\Base\SimpleEntityController::getFilterFormType()
	 */
	protected function getFilterFormType() {
		return UserFilterType::class;
	}
	
	//------------------------------------------------------------------------
	// Views
	//------------------------------------------------------------------------
	protected function getTwigProfile() {
		return $this->getTwigBase() . $this->getTwigName() . '/profile.html.twig';
	}
	
	//------------------------------------------------------------------------
	// Routing
	//------------------------------------------------------------------------
	protected function getProfileRoute() {
		return $this->getIndexRoute() . '_profile';
	}
}