<?php 

namespace App\Form ;


use App\Entity\Article;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

        
    }
    
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
     ->add('author', UserSelectTextType :: class)
        ;

    

}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([

        'data_class' => Article::class

    ]);
}

}