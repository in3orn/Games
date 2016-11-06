<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Form\Base\SimpleEntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends SimpleEntityType
{
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Base\SimpleEntityType::addMainFields()
	 */
	protected function addMainFields(FormBuilderInterface $builder, array $options) {
		$builder
		->add('username', TextType::class, array(
				'attr' => array('autofocus' => true),
				'required' => true
		));
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Base\FormType::addMoreFields()
	 */
	protected function addMoreFields(FormBuilderInterface $builder, array $options) {
		$roles = array(
				'User' => 'ROLE_USER', 
				'Responsible' => 'ROLE_RESPONSIBLE',
				'Admin' => 'ROLE_ADMIN',
				'Super admin' => 'ROLE_SUPER_ADMIN'
		);
		
		$builder
			->add('code', TextType::class, array(
					'required' => true
			))
			->add('roles', ChoiceType::class, array(
					'choices'		=> $roles,
					'placeholder'	=> 'Select roles',
					'multiple'		=> true,
					'expanded'		=> true
			))
			;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Base\SimpleEntityType::getEntityType()
	 */
	protected function getEntityType() {
		return User::class;
	}
}