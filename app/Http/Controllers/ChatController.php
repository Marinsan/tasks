<?php

namespace App\Http\Controllers;


use App\Http\Requests\Chat\ChatIndex;
use App\User;

/**
 * Class ChatController.
 *
 * @package App\Http\Controllers\Tenant\Web
 */
class ChatController extends Controller
{
    /**
     * Index.
     *
     * @param ChatIndex $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ChatIndex $request)
    {
        $channels = $request->user()->channels;
        return view('chat.index', compact('channels'));
    }
}
