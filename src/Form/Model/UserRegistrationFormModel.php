<?php
namespace App\Form\Model;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\UniqueUser;



class UserRegistrationFormModel
{
    /**
     * @Assert\NotBlank(message="please Please enter an email wtf!!")
     * @Assert\Email()
     * @UniqueUser()
     */
    public $email; 


   /**
     * @Assert\NotBlank(message="Choose a password!")
     * @Assert\Length(min=5, minMessage="Come on, you can think of a password longer than that!")
     */
    public $plainPassword;
    /**
     * @Assert\IsTrue(message="I know, it is silly youmust agree to our terms.periodt!!")
     */
    public $agreeTerms;
}