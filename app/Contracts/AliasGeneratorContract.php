<?php

namespace App\Contracts;

/**
 * Interface that defines the basic methods to be implemented in order to
 * create an alias generator
 */
interface AliasGeneratorContract {

    /**
     * Function that should return a random string
     *
     * @param int $length
     * @return string
     */
    public function generate(int $length = NULL): string;
}
