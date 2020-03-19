<?php

namespace Tests\Unit\domain\Model\Entity\Base;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Base\Identifier;
use Tests\Helper\Domain\Model\Entity\Base\TestEntity;
use Tests\TestCase;

/**
 * @internal
 */
class EntityTest extends TestCase
{
    private string $plainIdentifier = '901e66be-91ec-499e-b91a-70260f3c7ba6';

    private Identifier $identifier;

    private Entity $entity;

    public function setUp(): void
    {
        parent::setUp();

        // Create anonymous entity for testing
        $this->identifier = $this->createAnonymousIdentifier($this->plainIdentifier);
        $this->entity = new TestEntity($this->identifier);
    }

    /**
     * @group entity
     * @return void
     */
    public function testCanDetermineEquals()
    {
        $this->assertTrue($this->entity->equals($this->identifier));
        // Determine if when Created Identifier has another instance-id
        $this->assertTrue($this->entity->equals($this->createAnonymousIdentifier($this->plainIdentifier)));

        $anotherIdentifier = $this->createAnonymousIdentifier('901e6a68-fbea-415b-af75-76bbed08fdb1');
        $this->assertFalse($this->entity->equals($anotherIdentifier));
    }

    /**
     * Create fake Identifier for testing.
     *
     * @param string $uuid
     * @return Identifier
     */
    private function createAnonymousIdentifier(string $uuid): Identifier
    {
        return new class($uuid) extends Identifier {
        };
    }
}
