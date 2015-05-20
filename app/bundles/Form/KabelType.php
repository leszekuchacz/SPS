<?php

namespace SpsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class KabelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('producent')
            ->add('j')
            ->add('tubs')
            ->add('lenght')
            ->add('id_standard')
            ->add('id_kabel_type')
            ->add('id_object_type')
            ->add('id_mufa_start')
            ->add('id_mufa_end')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SpsBundle\Entity\Kabel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'spsbundle_kabel';
    }
}
