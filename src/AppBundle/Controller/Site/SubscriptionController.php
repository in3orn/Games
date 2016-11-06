<?php

namespace AppBundle\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Game;
use AppBundle\Entity\User;
use AppBundle\Entity\Subscription;

class SubscriptionController extends Controller
{
	public function newAction($gameId, $userId, $code) {
		$params = [];
		
		
		$gameRepository = $this->getDoctrine()->getRepository(Game::class);
		/** @var Game $game */
		$game = $gameRepository->findOneBy(['vPlayId' => $gameId]);
		
		if(!$game) {
			$response = 501;
			$params['response'] = $response;
			return $this->render('site/subscription/new.html.twig', $params);
		}
		
		
		$userRepository = $this->getDoctrine()->getRepository(User::class);
		$user = $userRepository->findOneBy(['code' => $code]);
		
		if(!$user) {
			$response = 502;
			$params['response'] = $response;
			return $this->render('site/subscription/new.html.twig', $params);
		}
		
		
		$subscriptionRepository = $this->getDoctrine()->getRepository(Subscription::class);
		$subscription = $subscriptionRepository->findOneBy(['game' => $game, 'vPlayUserId' => $userId]);
		
		if($subscription) {
			$response = 503;
			$params['response'] = $response;
			return $this->render('site/subscription/new.html.twig', $params);
		}
		
		
		$newSubscription = new Subscription();
		$newSubscription->setName(date('Y-m-d H:i:s'));
		$newSubscription->setGame($game);
		$newSubscription->setUser($user);
		$newSubscription->setVPlayUserId($userId);

		/** @var \Doctrine\ORM\EntityManager $em */
		$em = $this->getDoctrine()->getManager();
		$em->persist($newSubscription);
		
		$em->flush();
		
		
		$response = 100;
		$params['response'] = $response;
		return $this->render('site/subscription/new.html.twig', $params);
	}
}
