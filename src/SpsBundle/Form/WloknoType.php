<?php

namespace SpsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WloknoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	
 //  var_dump($options['data']);
 
  
    	$newArray= array();
   foreach ($options['data'] as $op)
   {
   	$newArray[$op['od_id_w']]= 
   			'('.$op['od_id_w'].')   '
   				.$op['w_pos'].'-'
   				.$op['s_nazwa'].' '
   				.$op['od_id'].'-'
   				.$op['od_kod'].'--->'
   				.$op['do_id'].'-'
   				.$op['do_kod'].' '
   				.$op['j'].'x'
   				.$op['tubs'].'('
   				.$op['standard'].')'
   				;
   
   	
   }
       $builder->add('id_prawa', 'choice', array(
    'choices' => $newArray	
    ,
    'required'    => false,
    'placeholder' => 'Wybierz wlokno..',
    'empty_data'  => null
	
		))->add('id_lewa', 'hidden')
       ->add('side', 'hidden');
       
  
       
       
       $builder->add('tags', 'collection', array('type' => new TagType()));
       
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        		'error_mapping' => array(
        				'matchingCityAndZipCode' => 'city',
        		)
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'spsbundle_wlokno';
    }
}
