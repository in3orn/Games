<?php

namespace AppBundle\Form\Filter;

use AppBundle\Entity\Filter\SubscriptionFilter;
use AppBundle\Entity\Game;
use AppBundle\Entity\User;
use AppBundle\Form\Filter\Base\SimpleEntityFilterType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

class SubscriptionFilterType extends SimpleEntityFilterType
{
	/**
	 *
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Base\FormType::addMoreFields()
	 */
	protected function addMoreFields(FormBuilderInterface $builder, array $options) {
		$builder
		->add('users', EntityType::class, array(
				'class'			=> User::class,
				'choice_label' 	=> 'username',
				'required'		=> false,
				'expanded'      => false,
				'multiple'      => true,
				'placeholder'	=> 'Choose users'
		))
		->add('games', EntityType::class, array(
				'class'			=> Game::class,
				'choice_label' 	=> 'name',
				'required'		=> false,
				'expanded'      => false,
				'multiple'      => true,
				'placeholder'	=> 'Choose games'
		))
		;
	}
	
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Entity\Filter\Base\SimpleEntityFilterType::getEntityType()
	 */
	protected function getEntityType() {
		return SubscriptionFilter::class;
	}
}