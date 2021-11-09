<?php

namespace App\Contracts;

/**
 * Interface that defines the basic methods to be implemented in order to
 * create an repository that could handled the persistence layer of the model ShortUrl
 */
interface ShortUrlRepositoryContract {

    /**
     * Creates a new short url record
     *
     * @param string $url
     * @param boolean $nsfw
     * @return array
     */
    public function create(string $url, bool $nsfw = false): array;

    /**
     * Returns an short url based on its alias
     *
     * @param string $alias
     * @return void
     */
    public function findByAlias(string $alias);
}
