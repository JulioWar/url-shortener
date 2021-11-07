<?php

namespace App\Contracts;

interface ShortUrlRepositoryContract {
    public function create(string $url, bool $nsfw = false): array;
    public function findByAlias(string $alias);
}
