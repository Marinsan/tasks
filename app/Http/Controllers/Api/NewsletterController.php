<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\NewsletterStore;
use Log;
use Response;
use App\Http\Controllers\Controller;
use Newsletter;

/**
 * Class NewsletterController.
 *
 * @package App\Http\Controllers
 */
class NewsletterController extends Controller
{
    /**
     * Store email in newsletter
     *
     * @param NewsletterStore $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NewsletterStore $request)
    {
        Log::debug('Subscribing user email: ' . $request->email);
        $result = Newsletter::subscribePending($request->email);
        if ($result) return $result;
        return Response::json([
            'message' => 'User already registered'
        ], 423);
    }
}