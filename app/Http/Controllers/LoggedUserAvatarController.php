<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoggedUserAvatarController extends Controller
{
    public function show(Request $request)
    {
        $avatar = $this->userAvatarExists($request->user()) ? $request->user()->lastAvatar() : $this->defaultAvatar();
        return response()->file(Storage::disk('local')->path($avatar), [
            'Cache-Control' => 'no-cache, must-revalidate, no-store, max-age=0, private',
            'Pragma' => 'no-cache'
        ]);
    }

    protected function userAvatarExists($user)
    {
        return $user->avatars && Storage::disk('local')->exists($user->lastAvatar());
    }

    protected function defaultAvatar()
    {
        return 'avatars/default.jpg';
    }
}
