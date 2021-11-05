<?php

namespace App\Contracts;

interface SiteVisitRepositoryContract {
    public function getMostPopular(): array;
}
