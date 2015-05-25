<?php 

namespace SpsBundle\Form\FromRejon;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PanelRejonType extends AbstractType
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
		
		
	
	
		foreach ($options['data'][1] as $xp)
		{
			$standard[$xp['id']] = $xp['nazwa'];
						
		};
		
		

		
		foreach ($options['data'][2] as $xp)
		{
			$mufy[$xp['id']] = $xp['name'];
		
		};
		
		
		
		foreach ($options['data'][3] as $xp)
		{
			$newArray[$xp['mid']] = $xp['mname'];
		
		};


		
		
		$builder
		->add('opis', 'textarea')
		->add('kod','text')
		->add('rejon', 'hidden');
		
		
		$builder->add('j', 'choice', array(
				'choices' => $newArray
				,
				'required'    => false,
				'placeholder' => 'Wybierz przelacznice..',
				'empty_data'  => null
		
		));
		
		
		
		$builder->add('wezel', 'choice', array(
				'choices' => $mufy
				,
				'required'    => false,
				'placeholder' => 'Wybierz wezel..',
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
		return 'spsbundle_panelrejon';
	}
}
