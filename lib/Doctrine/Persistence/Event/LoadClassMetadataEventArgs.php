<?php

namespace Doctrine\Persistence\Event;

use Doctrine\Common\EventArgs;
use Doctrine\Persistence\Mapping\ClassMetadata;
use Doctrine\Persistence\ObjectManager;

/**
 * Class that holds event arguments for a loadMetadata event.
 */
class LoadClassMetadataEventArgs extends EventArgs
{
    /** @var ClassMetadata */
    private $classMetadata;

    /** @var ObjectManager */
    private $objectManager;

    /**
     * @template T of object
     * @psalm-param ClassMetadata<T> $classMetadata
     */
    public function __construct(ClassMetadata $classMetadata, ObjectManager $objectManager)
    {
        $this->classMetadata = $classMetadata;
        $this->objectManager = $objectManager;
    }

    /**
     * Retrieves the associated ClassMetadata.
     *
     * @return ClassMetadata
     *
     * @template T of object
     * @psalm-return ClassMetadata<T>
     */
    public function getClassMetadata()
    {
        return $this->classMetadata;
    }

    /**
     * Retrieves the associated ObjectManager.
     *
     * @return ObjectManager
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }
}
