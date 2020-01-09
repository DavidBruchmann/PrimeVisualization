<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use WDB\PrimeVisualization\Controller\PrimesInCircleController;

final class PrimesInCircleControllerTest extends TestCase
{

    public function testGetCircleByDegree(): void
    {
        $primesInCircleController = new PrimesInCircleController;
        $this->assertEquals([0,1,1,1,1,2,2,3], [
            $primesInCircleController->getCircleByDegree(0),
            $primesInCircleController->getCircleByDegree(0.000001),
            $primesInCircleController->getCircleByDegree(1),
            $primesInCircleController->getCircleByDegree(359),
            $primesInCircleController->getCircleByDegree(360),
            $primesInCircleController->getCircleByDegree(361),
            $primesInCircleController->getCircleByDegree(720),
            $primesInCircleController->getCircleByDegree(721),
        ]);
    }
/*
    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
*/
}
