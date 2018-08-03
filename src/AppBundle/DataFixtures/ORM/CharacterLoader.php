<?php
namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;

class CharacterLoader extends DataFixtureLoader
{


    /**
     * Returns an array of file paths to fixtures
     *
     * @return array<string>
     */
    protected function getFixtures()
    {
        return array(
            __DIR__ .'/characters.yml'
        );
    }

    public function heroName(){
        $names = array(
            'Mario',
            'Bowser',
            'Yoshi',
            'Peach',
            'Wario',
            'Luigi'
        );
        return$names[array_rand($names)];
    }


    public function avatarFilename(){
        $names = array(
            'kitten1.jpg',
            'kitten2.jpg',
            'kitten3.jpg',
            'kitten4.jpg',
        );
        return$names[array_rand($names)];
    }

    public function getProcessors()
    {
        return array(
            new CharacterProcessor($this->container->getParameter('kernel.root_dir'))
        );

    }
}