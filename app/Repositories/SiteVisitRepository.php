<?php

namespace App\Repositories;

use App\Contracts\SiteVisitRepositoryContract;
use App\Models\SiteVisit;

class SiteVisitRepository implements SiteVisitRepositoryContract {

    public function getMostPopular(int $limit = 100): array {
        return SiteVisit::orderBy('visit_count', 'desc')
            ->limit($limit)
            ->get()
            ->map(fn($visit) => $this->format($visit))
            ->toArray();
    }

    private function format(SiteVisit $visit): array {
        return [
            'site_url' => $visit->site_url,
            'visits' => $visit->visit_count,
            'last_visit' => $visit->updated_at->diffForHumans()
        ];
    }
}
