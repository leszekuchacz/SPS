<?php 

namespace SpsBundle\Form\FromRejon;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WezelRejonType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('name', 'text')
		->add('opis','textarea')
		->add('rejon', 'hidden');
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			
		));
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'spsbundle_wezelrejon';
	}
}
