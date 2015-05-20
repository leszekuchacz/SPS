<?php

namespace SpsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class MufaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('kod')
            ->add('opis')
            ->add('gps_n')
            ->add('gps_e')
            ->add('id_mufa_type')
            ->add('id_object_type')
            ->add('id_rejon')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SpsBundle\Entity\Mufa'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'spsbundle_mufa';
    }
}
