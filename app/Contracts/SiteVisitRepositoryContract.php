<?php

namespace App\Contracts;

/**
 * Interface that defines the basic methods to be implemented in order to
 * create an repository that could handled the persistence layer of the model SiteVisit
 */
interface SiteVisitRepositoryContract {

    /**
     * Returns by default the top 100 most visited sites
     *
     * @param integer $limit
     * @return array list of sites visited with the visit count
     */
    public function getMostPopular(int $limit = 100): array;

    /**
     * Creates or Updates the visit count of the specified site
     *
     * @param string $site_url
     * @return array record created
     */
    public function registerVisit(string $site_url): array;
}
