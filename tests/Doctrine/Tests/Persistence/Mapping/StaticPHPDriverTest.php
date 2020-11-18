<?php

namespace Doctrine\Tests\Persistence\Mapping;

use Doctrine\Persistence\Mapping\ClassMetadata;
use Doctrine\Persistence\Mapping\Driver\StaticPHPDriver;
use Doctrine\Tests\DoctrineTestCase;
use PHPUnit\Framework\MockObject\MockObject;

use function assert;

class StaticPHPDriverTest extends DoctrineTestCase
{
    public function testLoadMetadata(): void
    {
        $metadata = $this->createMock(ClassMetadata::class);
        assert($metadata instanceof ClassMetadata || $metadata instanceof MockObject);
        $metadata->expects($this->once())->method('getFieldNames');

        $driver = new StaticPHPDriver([__DIR__]);
        $driver->loadMetadataForClass(TestEntity::class, $metadata);
    }

    public function testGetAllClassNames(): void
    {
        $driver     = new StaticPHPDriver([__DIR__]);
        $classNames = $driver->getAllClassNames();

        self::assertContains(TestEntity::class, $classNames);
    }
}

class TestEntity
{
    /**
     * @psalm-param ClassMetadata<TestEntity> $metadata
     */
    public static function loadMetadata(ClassMetadata $metadata): void
    {
        $metadata->getFieldNames();
    }
}
