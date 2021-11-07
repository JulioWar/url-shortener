<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ShortUrlRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ShortUrlBaseRequest;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    private $_shortUrlRepository;

    public function __construct(ShortUrlRepositoryContract $shortUrlRepository) {
        $this->_shortUrlRepository = $shortUrlRepository;
    }

    public function store(ShortUrlBaseRequest $request) {
        return response()->json(
            $this->_shortUrlRepository->create(
                $request->get('url'),
                $request->get('nsfw', false)
            )
        );
    }
}
