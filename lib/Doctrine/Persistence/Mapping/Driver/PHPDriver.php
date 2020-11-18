<?php

namespace Doctrine\Persistence\Mapping\Driver;

use Doctrine\Persistence\Mapping\ClassMetadata;

/**
 * The PHPDriver includes php files which just populate ClassMetadataInfo
 * instances with plain PHP code.
 */
class PHPDriver extends FileDriver
{
    /** @var ClassMetadata */
    protected $metadata;

    /**
     * {@inheritDoc}
     */
    public function __construct($locator)
    {
        parent::__construct($locator, '.php');
    }

    /**
     * {@inheritDoc}
     *
     * @template T of object
     * @psalm-param class-string<T> $className
     * @psalm-param ClassMetadata<T> $metadata
     */
    public function loadMetadataForClass($className, ClassMetadata $metadata)
    {
        $this->metadata = $metadata;

        $this->loadMappingFile($this->locator->findMappingFile($className));
    }

    /**
     * {@inheritDoc}
     */
    protected function loadMappingFile($file)
    {
        $metadata = $this->metadata;
        include $file;

        return [$metadata->getName() => $metadata];
    }
}
