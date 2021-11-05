<?php

namespace App\Contracts;

interface ShortUrlRepositoryContract {
    public function create(string $url): array;
}
