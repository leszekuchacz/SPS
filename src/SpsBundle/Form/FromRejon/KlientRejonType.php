<?php 

namespace SpsBundle\Form\FromRejon;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class KlientRejonType extends AbstractType
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
		$mufytyp = array();
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
		
	

		foreach ($options['data'][4] as $xp)
		{
			$mufytyp[$xp['mid']] = $xp['mname'];
		
		};
		
		
		$builder
		->add('lenght', 'text')
		->add('producent','textarea')
		->add('j','text')
		->add('tubs','text')
		->add('rejon', 'hidden')
		->add('oid', 'hidden')
		->add('do','text')
		->add('gps_e', 'text')
		->add('gps_n','text')
		->add('kod','text');
		
		
		
		$builder->add('mufatyp', 'choice', array(
				'choices' => $mufytyp
				,
				'required'    => false,
				'placeholder' => 'Wybierz rodzaj kasety..',
				'empty_data'  => null
		
		));
		
		$builder->add('od', 'choice', array(
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
		return 'spsbundle_klientrejon';
	}
}
