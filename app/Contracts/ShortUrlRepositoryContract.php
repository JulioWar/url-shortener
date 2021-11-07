<?php

namespace App\Contracts;

interface ShortUrlRepositoryContract {
    public function create(string $url): array;
    public function findByAlias(string $alias);
}
