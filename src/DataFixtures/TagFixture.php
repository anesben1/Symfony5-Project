<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Time;

class TagFixture extends BaseFixture
{


 

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_tags', function($i) use ($manager) {
            $tag = new Tag();
             
            $tag->setName($this->faker->name);
            $tag->setSlug(time().$i);
        
                           
            return $tag;
        });

      
        $manager->flush();
    }
}
