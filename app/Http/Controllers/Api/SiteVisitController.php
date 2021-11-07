<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ShortUrlRepositoryContract;
use App\Contracts\SiteVisitRepositoryContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteVisitController extends Controller
{

    private $_siteVisitRepository;
    private $_shortUrlRepository;

    public function __construct(
        SiteVisitRepositoryContract $siteVisitRepository,
        ShortUrlRepositoryContract $shortUrlRepository
    ) {
        $this->_siteVisitRepository = $siteVisitRepository;
        $this->_shortUrlRepository = $shortUrlRepository;
    }

    public function mostPopular() {
        return response()->json($this->_siteVisitRepository->getMostPopular());
    }

    public function redirectToSite(string $alias) {
        $shortUrl = $this->_shortUrlRepository->findByAlias($alias);

        abort_if(is_null($shortUrl), 404, 'Site Not Found or Not Registered');

        $this->_siteVisitRepository->registerVisit($shortUrl['original_url']);

        if (boolval($shortUrl['is_nsfw'])) {
            return view('redirect', ['url' => $shortUrl['original_url']]);
        }

        return redirect()->to($shortUrl['original_url']);
    }

}
