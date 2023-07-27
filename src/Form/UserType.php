<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'row_attr' => [
                    'style' => 'margin-top: 1vh;', // Ajoutez le style CSS personnalisé ici
                ]
            ])
            //->add('roles')
            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'row_attr' => [
                    'style' => 'margin-top: 1vh;', // Ajoutez le style CSS personnalisé ici
                ]
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'row_attr' => [
                    'style' => 'margin-top: 1vh;', // Ajoutez le style CSS personnalisé ici
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'row_attr' => [
                    'style' => 'margin-top: 1vh;', // Ajoutez le style CSS personnalisé ici
                ]
            ])
/*            ->add('imageFile', VichImageType::class, [
                'label' => 'Profil Picture',
            ]);*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
