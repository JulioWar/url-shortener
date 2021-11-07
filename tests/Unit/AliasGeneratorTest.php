<?php

namespace Tests\Unit;

use App\Services\AliasGenerator;
use PHPUnit\Framework\TestCase;

class AliasGeneratorTest extends TestCase
{
    /**
     * Test to see if the AliasGenerator is able to return a random string
     * of 8 characters
     *
     * @return void
     */
    public function test_alias_generator_should_generate_an_eight_length_alias()
    {
        $generator = new AliasGenerator();

        $result = $generator->generate(8);

        $this->assertIsString($result);
        $this->assertTrue(strlen($result) == 8);
    }

    /**
     * Test to see if the AliasGenerator is able to return a random string
     * from 5 to 8 characters
     *
     * @return void
     */
    public function test_alias_generator_should_generate_a_five_to_eight_length_alias()
    {
        $generator = new AliasGenerator();

        $result = $generator->generate();

        $this->assertIsString($result);
        $this->assertTrue(strlen($result) >= 5 && strlen($result) <= 8);
    }
}
