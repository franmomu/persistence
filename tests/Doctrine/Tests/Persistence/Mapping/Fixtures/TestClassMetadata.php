<?php

declare(strict_types=1);

namespace Doctrine\Tests\Persistence\Mapping\Fixtures;

use Doctrine\Persistence\Mapping\ClassMetadata;
use LogicException;
use ReflectionClass;

final class TestClassMetadata implements ClassMetadata
{
    /**
     * @var string
     * @psalm-var class-string
     */
    private $className;

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * @psalm-return class-string
     */
    public function getName(): string
    {
        return $this->className;
    }

    /**
     * @return string[]
     */
    public function getIdentifier(): array
    {
        return ['id'];
    }

    public function getReflectionClass(): ReflectionClass
    {
        return new ReflectionClass($this->getName());
    }

    public function isIdentifier($fieldName): bool
    {
        return false;
    }

    public function hasField($fieldName): bool
    {
        return false;
    }

    public function hasAssociation($fieldName)
    {
        return false;
    }

    public function isSingleValuedAssociation($fieldName)
    {
        return false;
    }

    public function isCollectionValuedAssociation($fieldName)
    {
        return false;
    }

    public function getFieldNames(): array
    {
        return [];
    }

    public function getIdentifierFieldNames(): array
    {
        return [];
    }

    public function getAssociationNames(): array
    {
        return [];
    }

    public function getTypeOfField($fieldName)
    {
        throw new LogicException('Not implemented');
    }

    public function getAssociationTargetClass($assocName)
    {
        throw new LogicException('Not implemented');
    }

    public function isAssociationInverseSide($assocName): bool
    {
        return false;
    }

    public function getAssociationMappedByTargetField($assocName)
    {
        throw new LogicException('Not implemented');
    }

    public function getIdentifierValues($object): array
    {
        return [];
    }
}
