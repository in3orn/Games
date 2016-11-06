<?php

namespace AppBundle\Entity\Filter;

use AppBundle\Entity\Filter\Base\SimpleEntityFilter;
use AppBundle\Repository\GameRepository;
use AppBundle\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class SubscriptionFilter extends SimpleEntityFilter {
	
	/**
	 * @var GameRepository
	 */
	protected $gameRepository;
	
	/**
	 * @var GameRepository
	 */
	protected $userRepository;
	
	/**
	*
	* @param GameRepository $gameRepository
	*/
	public function __construct(GameRepository $gameRepository, UserRepository $userRepository) {
		$this->gameRepository = $gameRepository;
		$this->userRepository = $userRepository;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 * @see \AppBundle\Entity\Filter\Base\SimpleEntityFilter::initMoreValues()
	 */
	protected function initMoreValues(Request $request) {
		$games = $request->get('games', null);
		if($games) {
			$this->games = $this->gameRepository->findBy(array('id' => $games));
		}
		
		$users = $request->get('users', null);
		if($users) {
			$this->users = $this->userRepository->findBy(array('id' => $users));
		}
	
		return $this;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 * @see \AppBundle\Entity\Filter\Base\SimpleEntityFilter::clearMoreQueryValues()
	 */
	protected function clearMoreQueryValues() {
		$this->games = array();
		$this->users = array();
	
		return $this;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 * @see \AppBundle\Entity\Filter\Base\SimpleEntityFilter::getValues()
	 */
	public function getValues() {
		$values = parent::getValues();
		$values['games'] = $this->getIdValues($this->games);
		$values['users'] = $this->getIdValues($this->users);
	
		return $values;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 * @see \AppBundle\Entity\Filter\Base\SimpleEntityFilter::getExpressions()
	 */
	protected function getExpressions() {
		$expressions = parent::getExpressions();
	
		for($i = 0; $i < count($expressions); $i++) {
			$expression = $expressions[$i];
			if (strpos($expression, 'e.name') !== false) {
				$expressions[$i] = str_replace('e.name', 'e.username', $expression);
			}
		}
	
		$expression = $this->getEqualArrayExpression('game', $this->games);
		if($expression) {
			$expressions[] = $expression;
		}
		
		$expression = $this->getEqualArrayExpression('user', $this->users);
		if($expression) {
			$expressions[] = $expression;
		}
	
		return $expressions;
	}
	
	/**
	 * @var array
	 */
	protected $games;
	
	/**
	 * Add game
	 *
	 * @param $game
	 *
	 * @return UserFilter
	 */
	public function addGame($game)
	{
		$this->games[] = $game;
	
		return $this;
	}
	
	/**
	 * Set games
	 *
	 * @return UserFilter
	 */
	public function setGames($games)
	{
		$this->games = $games;
	
		return $this;
	}
	
	/**
	 * Get games
	 *
	 * @return array
	 */
	public function getGames()
	{
		return $this->games;
	}
	
	/**
	 * Clear games
	 *
	 * @return UserFilter
	 */
	public function clearGames()
	{
		$this->games = array();
	
		return $this;
	}
	
	/**
	 * @var array
	 */
	protected $users;
	
	/**
	 * Add user
	 *
	 * @param $user
	 *
	 * @return UserFilter
	 */
	public function addUser($user)
	{
		$this->users[] = $user;
	
		return $this;
	}
	
	/**
	 * Set users
	 *
	 * @return UserFilter
	 */
	public function setUsers($users)
	{
		$this->users = $users;
	
		return $this;
	}
	
	/**
	 * Get users
	 *
	 * @return array
	 */
	public function getUsers()
	{
		return $this->users;
	}
	
	/**
	 * Clear users
	 *
	 * @return UserFilter
	 */
	public function clearUsers()
	{
		$this->users = array();
	
		return $this;
	}
}