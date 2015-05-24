<?php 

namespace SpsBundle\Form\FromRejon;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MufaRejonType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		

		$newArray= array();
		$i=0;
		foreach ($options['data'] as $op)
		{
			$newArray[$op['mid']] = $op['mname'];
			$i++;
		}
		;
		$builder
		->add('kod', 'text')
		->add('opis','textarea')
		->add('gps_e','text')
		->add('gps_n','text')
		->add('rejon', 'hidden');
		

		$builder->add('mufatype', 'choice', array(
				'choices' => $newArray
				,
				'required'    => false,
				'placeholder' => 'Wybierz typ mufy..',
				'empty_data'  => null
		
		));
		
		
		
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
		return 'spsbundle_mufarejon';
	}
}
