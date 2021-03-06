<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Model\UserRegistrationFormModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\IsTrue;

class UserRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class  )          
            ->add('plainPassword', PasswordType::class, [                
                'constraints' => [
                    new NotBlank([
                        'message' => 'choose a password!'
                    ]),
                    new Length([
                        'min' =>5,
                        'minMessage' => 'com on, you can think ofa password longer that that!'
                    ])
                ]
            
            ])
            ->add('agreeTerms', CheckboxType::class,[
                    'constraints' => [
                    new IsTrue([
                        'message' => 'I know it is silly, but you must agree to our terms !'
                    ])
                ]
            ]
            
            )
            ;
            
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserRegistrationFormModel::class,
        ]);
    }
}
