<?php 

namespace App\Form ;

use App\Entity\Article;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    
public function buildForm(FormBuilderInterface $builder, array $options)
{

    $builder
    ->add('title', TextareaType::class , [
        'help' => 'choose something catchy!'
    ])
    
    ->add('content')
    ->add('publishedAt', null, [
        'widget' => 'single_text'
    ])
    ;

}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([

        'data_class' => Article::class

    ]);
}

}