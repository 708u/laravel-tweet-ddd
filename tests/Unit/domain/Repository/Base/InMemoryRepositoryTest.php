<?php

namespace Tests\Unit\domain\Repository\Base;

use Domain\Model\Entity\Base\Entity;
use Domain\Model\ValueObject\Base\Identifier;
use Tests\Helper\Domain\Model\Entity\Base\AbstractEntityMock;
use Tests\Helper\Domain\Model\Repository\Base\AbstractInMemoryRepositoryMock;
use Tests\Helper\Domain\Model\ValueObject\Base\AbstractIdentifierMock;
use Tests\Helper\Utils\CanReferUnaccessible;
use Tests\TestCase;

/**
 * @internal
 */
class InMemoryRepositoryTest extends TestCase
{
    use CanReferUnaccessible;

    private AbstractInMemoryRepositoryMock $repository;

    private string $plainIdentifier = '901e66be-91ec-499e-b91a-70260f3c7ba6';

    private Identifier $identifier;

    private Entity $entity;

    public function setUp(): void
    {
        parent::setUp();

        $this->repository = resolve(AbstractInMemoryRepositoryMock::class);
        $this->identifier = new AbstractIdentifierMock($this->plainIdentifier);
        $this->entity = new AbstractEntityMock($this->identifier);
    }

    /**
     * @group repository
     *
     * @return void
     */
    public function testSave()
    {
        $this->repository->save($this->entity);
        $savedEntity = $this->getUnaccessibleProperty($this->repository, 'repository')[AbstractInMemoryRepositoryMock::class][$this->plainIdentifier];
        $this->assertSame($this->entity, $savedEntity);
    }

    /**
     * @group repository
     *
     * @return void
     */
    public function testFind()
    {
        $this->repository->save($this->entity);
        $foundEntity = $this->repository->find($this->identifier);
        $this->assertSame($foundEntity, $this->entity);
    }


    /**
     * @group repository
     *
     * @return void
     */
    public function testFindBy()
    {
        $this->repository->save($this->entity);
        $foundEntities = $this->repository->findBy($this->identifier, 'identifier');
        $this->assertSame($foundEntities->first(), $this->entity);
    }
}
