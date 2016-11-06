<?php

namespace AppBundle\Form;

use AppBundle\Entity\Game;
use AppBundle\Entity\Subscription;
use AppBundle\Entity\User;
use AppBundle\Form\Base\SimpleEntityType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class SubscriptionType extends SimpleEntityType
{
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Base\FormType::addMoreFields()
	 */
	protected function addMoreFields(FormBuilderInterface $builder, array $options) {
		$builder
			->add('user', EntityType::class, array(
					'class'			=> User::class,
					'choice_label' 	=> 'username',
					'expanded'      => false,
					'multiple'      => false,
					'placeholder'	=> 'Choose user'
			))
			->add('game', EntityType::class, array(
					'class'			=> Game::class,
					'choice_label' 	=> 'name',
					'expanded'      => false,
					'multiple'      => false,
					'placeholder'	=> 'Choose game'
			))
			->add('vPlayUserId', IntegerType::class, array(
					'required' => true
			))
			;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Base\SimpleEntityType::getEntityType()
	 */
	protected function getEntityType() {
		return Subscription::class;
	}
}