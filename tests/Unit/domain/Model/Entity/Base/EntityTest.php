<?php

namespace Tests\Unit\domain\Model\Entity\Base;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Base\Identifier;
use Tests\Helper\Domain\Model\Entity\Base\TestEntity;
use Tests\Helper\Domain\Model\ValueObject\Base\AbstractIdentifierMock;
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
        $this->identifier = new AbstractIdentifierMock($this->plainIdentifier);
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
        $this->assertTrue($this->entity->equals(new AbstractIdentifierMock($this->plainIdentifier)));

        $anotherIdentifier = new AbstractIdentifierMock('901e6a68-fbea-415b-af75-76bbed08fdb1');
        $this->assertFalse($this->entity->equals($anotherIdentifier));
    }
}
