<?php 

namespace SpsBundle\Form\FromRejon;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class KabelRejonType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		

		$newArray= array();
		$standard = array();
		$mufy = array();
		$i=0;
		
		
	
		foreach ($options['data'][3] as $op)
		{
			$newArray[$op['id']] = $op['name'];
			$i++;
			
		
		};
		
	
		foreach ($options['data'][1] as $xp)
		{
			$standard[$xp['id']] = $xp['nazwa'];
						
		};
		
		foreach ($options['data'][2] as $xp)
		{
			$mufy[$xp['id']] = $xp['id'].'-'.$xp['kod'];
		
		};
		

		
		
		
		$builder
		->add('lenght', 'text')
		->add('producent','textarea')
		->add('j','text')
		->add('tubs','text')
		->add('rejon', 'hidden')
		->add('oid', 'hidden');
		
		
		
		
		$builder->add('od', 'choice', array(
				'choices' => $mufy
				,
				'required'    => false,
				'placeholder' => 'Wybierz od jakiej mufy..',
				'empty_data'  => null
		
		));
		
		$builder->add('do', 'choice', array(
				'choices' => $mufy
				,
				'required'    => false,
				'placeholder' => 'Wybierz do jakiej mufy..',
				'empty_data'  => null
		
		));
		
		$builder->add('kabeltype', 'choice', array(
				'choices' => $newArray
				,
				'required'    => false,
				'placeholder' => 'Wybierz typ kabla..',
				'empty_data'  => null
		
		));
		
		

		$builder->add('standard', 'choice', array(
				'choices' => $standard
				,
				'required'    => false,
				'placeholder' => 'Wybierz standard..',
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
		return 'spsbundle_kabelrejon';
	}
}
