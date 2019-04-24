<?php

namespace App\Http\Controllers;

use App\Http\Requests\PushSubscriptions\PushSubscriptionDestroy;
use App\Http\Requests\PushSubscriptions\PushSubscriptionUpdate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PushSubscriptionController extends Controller
{
    use ValidatesRequests;

    public function update(PushSubscriptionUpdate $request)
    {
        $this->validate($request, ['endpoint' => 'required']);

        $request->user()->updatePushSubscription(
            $request->endpoint,
            $request->key,
            $request->token
        );
    }


    public function destroy(PushSubscriptionDestroy $request)
    {
        $this->validate($request, ['endpoint' => 'required']);

        $request->user()->deletePushSubscription($request->endpoint);

        return response()->json(null, 204);
    }
}
