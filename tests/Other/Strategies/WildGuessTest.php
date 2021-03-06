<?php

namespace Rubix\ML\Tests\Other\Strategies;

use Rubix\ML\Other\Strategies\Strategy;
use Rubix\ML\Other\Strategies\WildGuess;
use Rubix\ML\Other\Strategies\Continuous;
use PHPUnit\Framework\TestCase;

/**
 * @group Strategies
 * @covers \Rubix\ML\Other\Strategies\WildGuess
 */
class WildGuessTest extends TestCase
{
    /**
     * @var \Rubix\ML\Other\Strategies\WildGuess
     */
    protected $strategy;
    
    /**
     * @before
     */
    protected function setUp() : void
    {
        $this->strategy = new WildGuess();
    }
    
    /**
     * @test
     */
    public function build() : void
    {
        $this->assertInstanceOf(WildGuess::class, $this->strategy);
        $this->assertInstanceOf(Continuous::class, $this->strategy);
        $this->assertInstanceOf(Strategy::class, $this->strategy);
    }
    
    /**
     * @test
     */
    public function fitGuess() : void
    {
        $this->strategy->fit([1, 2, 3, 4, 5]);

        $guess = $this->strategy->guess();

        $this->assertThat(
            $guess,
            $this->logicalAnd(
                $this->greaterThanOrEqual(1),
                $this->lessThanOrEqual(5)
            )
        );
    }
}
