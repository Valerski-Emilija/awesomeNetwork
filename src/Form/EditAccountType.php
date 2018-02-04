<?php

namespace App\Form;

use App\Entity\EditAccount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EditAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('first_name', TextType::class, array('label' => 'First name',
                 'required' => false))
        ->add('surname', TextType::class, array('label' => 'Surname',
                 'required' => false))
        ->add('email', EmailType::class, array('label' => 'Update email'))
        ->add('city', TextType::class, array('label' => 'My city',
                 'required' => true))
        ->add('country', TextType::class, array('label' => 'My country',
                 'required' => true))
        ->add('description', TextareaType::class, array('label' => 'Introduce yourself',
                          'required' => false))
        ->add('save', SubmitType::class, array('label' => 'Update'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => EditAccount::class,
        ]);
    }
}
