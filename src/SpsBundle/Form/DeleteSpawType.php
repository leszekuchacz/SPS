<?php

namespace SpsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeleteSpawType extends AbstractType
{
	
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		
		$builder->add('id_lewa', 'hidden')
		->add('id_prawa','hidden')
       ->add('side', 'hidden');
	}
	
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		
		$resolver->setDefaults(array());
	}
	
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return 'spsbundle_deletespaw';
	}
	
}