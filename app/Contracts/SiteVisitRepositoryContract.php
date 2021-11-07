<?php

namespace App\Contracts;

interface SiteVisitRepositoryContract {
    public function getMostPopular(): array;
    public function registerVisit(string $site_url): array;
}
