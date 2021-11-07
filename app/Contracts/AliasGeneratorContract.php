<?php

namespace App\Contracts;

interface AliasGeneratorContract {
    public function generate(int $length = NULL): string;
}
