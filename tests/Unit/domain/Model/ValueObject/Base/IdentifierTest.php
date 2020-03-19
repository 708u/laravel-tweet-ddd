<?php

namespace Tests\Unit\domain\Model\ValueObject\Base;

use DomainException;
use Tests\Helper\Domain\Model\ValueObject\Base\AbstractIdentifierMock;
use Tests\TestCase;

/**
 * @internal
 */
class IdentifierTest extends TestCase
{
    private string $plainIdentifier = '901e66be-91ec-499e-b91a-70260f3c7ba6';

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @grout value-object
     * @return void
     */
    public function testCanDetermineEquals()
    {
        $identifier = new AbstractIdentifierMock($this->plainIdentifier);
        $identifier2 = new AbstractIdentifierMock($this->plainIdentifier);

        $this->assertTrue($identifier->equals($identifier2));
    }

    /**
     * @test
     * @group value-object
     *
     * @return void
     */
    public function testShouldThrowExceptionIfInvalidArgumentGiven()
    {
        $this->expectException(DomainException::class);

        // Should throw exception because of foobar.
        new AbstractIdentifierMock('foobar');
    }
}
