<?php

namespace App\Http\Controllers\Api;

use App\Contracts\SiteVisitRepositoryContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteVisitController extends Controller
{

    private $_siteVisitRepository;

    public function __construct(SiteVisitRepositoryContract $siteVisitRepository) {
        $this->_siteVisitRepository = $siteVisitRepository;
    }

    public function mostPopular() {
        return response()->json($this->_siteVisitRepository->getMostPopular());
    }
}
