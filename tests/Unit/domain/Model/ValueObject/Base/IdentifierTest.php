<?php

namespace Tests\Unit\domain\Model\ValueObject\Base;

use Domain\Model\ValueObject\Base\Identifier;
use DomainException;
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
        $identifier = $this->createAnonymousIdentifier($this->plainIdentifier);
        $identifier2 = $this->createAnonymousIdentifier($this->plainIdentifier);

        $this->assertTrue($identifier->equals($identifier2));
    }

    /**
     * @test
     * @group value-object
     *
     * @return void
     */
    public function testShouldThrowExceptionIfInvalidArgumentGigen()
    {
        $this->expectException(DomainException::class);

        // Should throw exception because of foobar.
        $this->createAnonymousIdentifier('foobar');
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
