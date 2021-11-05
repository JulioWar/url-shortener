<?php

namespace App\Repositories;

use App\Contracts\ShortUrlRepositoryContract;

class ShortUrlRepository implements ShortUrlRepositoryContract {

    public function create(string $url): array {
        return [];
    }
}
