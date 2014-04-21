<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/
namespace Aden\Kejawen\Bundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Aden\Kejawen\Bundle\Entity\Profile;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add(
                'fullname', 
                'text', 
                array(
                    'label'     => 'form.name',
                    'required'  => true,
                )
            )
            ->add(
                'birthday', 
                'birthday', 
                array(
                    'label'     => 'form.birthday',
                    'required'  => false,
                )
            )
            ->add(
                'gender', 
                'choice', 
                array(
                    'label'     => 'form.gender',
                    'required'  => false,
                    'choices'   => array(
                        Profile::GENDER_MALE    => 'form.gender_male',
                        Profile::GENDER_FEMALE  => 'form.gender_female',
                    ),
                    'expanded' => false,
                    'multiple' => false,
                )
            )
            ->add(
                'address',
                'textarea',
                array(
                    'label'     => 'form.address',
                    'required'  => false,
                )
            )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aden\Kejawen\Bundle\Entity\Profile',
            'translation_domain' => 'AdenKejawenBundle',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'aden_kejawen_profile';
    }
}
