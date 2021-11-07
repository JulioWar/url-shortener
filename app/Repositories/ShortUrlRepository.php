<?php

namespace App\Repositories;

use App\Contracts\AliasGeneratorContract;
use App\Contracts\ShortUrlRepositoryContract;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Log;

class ShortUrlRepository implements ShortUrlRepositoryContract {

    private $_aliasGenerator;

    public function __construct(AliasGeneratorContract $aliasGenerator) {
        $this->_aliasGenerator = $aliasGenerator;
    }

    public function create(string $url): array {
        $alias = $this->_aliasGenerator->generate();

        // Adding this to avoid collisions (in case an alias that already exist is generated).
        while($this->aliasExist($alias)) {
            $alias = $this->_aliasGenerator->generate();
        }

        return ShortUrl::create([
            'alias' => $alias,
            'original_url' => $url
        ])->toArray();
    }

    private function aliasExist(string $alias): bool {
        return ShortUrl::alias($alias)->count() > 0;
    }
}
