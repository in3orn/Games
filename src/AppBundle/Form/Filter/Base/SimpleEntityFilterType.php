<?php

namespace AppBundle\Form\Filter\Base;

use AppBundle\Form\Base\BaseFormType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Entity\Filter\Base\SimpleEntityFilter;

class SimpleEntityFilterType extends BaseFormType
{	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Base\FormType::addMainFields()
	 */
	protected function addMainFields(FormBuilderInterface $builder, array $options) {
		$builder
			->add('name', TextType::class, array(
					'attr' => array('autofocus' => true),
					'required' => false
			))
			->add('updatedAfter', DateTimeType::class, array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy HH:mm',
					'required' => false,
					'attr' => [
							'class' => 'form-control input-inline datetimepicker',
							'data-provide' => 'datetimepicker',
							'data-date-format' => 'DD/MM/YYYY HH:mm'
					]
			))
			->add('updatedBefore', DateTimeType::class, array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy HH:mm',
					'required' => false,
					'attr' => [
							'class' => 'form-control input-inline datetimepicker',
							'data-provide' => 'datepicker',
							'data-date-format' => 'DD/MM/YYYY HH:mm'
					]
			))
			->add('createdAfter', DateTimeType::class, array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy HH:mm',
					'required' => false,
					'attr' => [
							'class' => 'form-control input-inline datetimepicker',
							'data-provide' => 'datepicker',
							'data-date-format' => 'DD/MM/YYYY HH:mm'
					]
			))
			->add('createdBefore', DateTimeType::class, array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy HH:mm',
					'required' => false,
					'attr' => [
							'class' => 'form-control input-inline datetimepicker',
							'data-provide' => 'datepicker',
							'data-date-format' => 'DD/MM/YYYY HH:mm'
					]
			))
		;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \AppBundle\Form\Base\FormType::getEntityType()
	 */
	protected function getEntityType() {
		return SimpleEntityFilter::class;
	}
}