<?php

namespace App\Http\Controllers\Tenant\Api\Newsletter;

use App\Http\Requests\Newsletter\NewsletterStore;
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
        $result = Newsletter::subscribePending($request->email);

        if ($result) return $result;

        return Response::json([
            'message' => 'User already registered'
        ], 423);
    }
}