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

    private function aliasExist(string $alias): bool {
        return ShortUrl::alias($alias)->count() > 0;
    }

    public function create(string $url,  bool $nsfw = false): array {
        $alias = $this->_aliasGenerator->generate();

        // Adding this to avoid collisions (in case an alias that already exist is generated).
        while($this->aliasExist($alias)) {
            $alias = $this->_aliasGenerator->generate();
        }

        return ShortUrl::create([
            'alias' => $alias,
            'original_url' => $url,
            'is_nsfw' => $nsfw
        ])->toArray();
    }

    public function findByAlias(string $alias) {
        $shortUrl = ShortUrl::alias($alias)->first();
        return is_null($shortUrl) ? $shortUrl : $shortUrl->toArray();
    }

}
