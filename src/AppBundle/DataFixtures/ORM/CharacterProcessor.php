<?php
namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Character;
use Nelmio\Alice\ProcessorInterface;
use Symfony\Component\Filesystem\Filesystem;

class CharacterProcessor implements ProcessorInterface
{


    /**
     * @var
     */
    private $rootDir;

    public function __construct($rootDir)
    {
        $this->rootDir = $rootDir;
    }

    public function preProcess($object)
    {
        if(false === $object instanceof Character){
            return;
        }

        if($object->getAvatarFilename()){
            $fs = new Filesystem();
            $filePath = $this->rootDir.'/../resources/'.$object->getAvatarFilename();
            $randomNumber = mt_rand(1,10000000);
            if($fs->exists($filePath)){
                $newFile = $randomNumber.'_'.$object->getAvatarFilename();
                $fs->copy($filePath,  $this->rootDir.'/../web/uploads/avatars/'.$newFile, true);
                $object->setAvatarFilename($newFile);
            }else{
                $object->setAvatarFilename(null);
            }
        }

    }

    /**
     * Processes an object before it is persisted to DB
     *
     * @param object $object instance to process
     */
    public function postProcess($object)
    {
        // TODO: Implement postProcess() method.
    }
}