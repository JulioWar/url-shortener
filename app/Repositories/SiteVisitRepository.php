<?php

namespace App\Repositories;

use App\Contracts\SiteVisitRepositoryContract;
use App\Models\SiteVisit;

class SiteVisitRepository implements SiteVisitRepositoryContract {

    private function format(SiteVisit $visit): array {
        return [
            'site_url' => $visit->site_url,
            'visits' => $visit->visit_count,
            'last_visit' => $visit->updated_at->diffForHumans()
        ];
    }

    public function getMostPopular(int $limit = 100): array {
        return SiteVisit::orderBy('visit_count', 'desc')
            ->limit($limit)
            ->get()
            ->map(fn($visit) => $this->format($visit))
            ->toArray();
    }

    public function registerVisit(string $site_url): array {
        $newVisit = SiteVisit::firstOrNew([
            'site_url' => $site_url,
        ]);

        if (!isset($newVisit->id)) {
            $newVisit->visit_count = 0;
        }

        $newVisit->visit_count += $newVisit->visit_count + 1;
        $newVisit->save();

        return $this->format($newVisit);
    }

}
