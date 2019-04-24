<?php

namespace App\Http\Controllers\Api\Notifications;

use App\Events\NotificationRead;
use App\Http\Controllers\Controller;
use App\DatabaseNotification;
use App\User;
use Illuminate\Http\Request;
use NotificationChannels\WebPush\PushSubscription;

/**
 * Class UnreadNotificationsController.
 *
 * @package App\Http\Controllers\Tenant\Api\Changelog
 */
class UnreadNotificationsController extends Controller
{

    /**
     * destroy.
     *
     * @param Request $reques
     * @param DatabaseNotification $notification
     * @return mixed
     */
    public function destroy(Request $request, DatabaseNotification $notification)
    {
        if (empty($request->endpoint)) {
            return response()->json('Endpoint missing.', 403);
        }
        $subscription = PushSubscription::findByEndpoint($request->endpoint);
        if (is_null($subscription)) {
            return response()->json('Subscription not found.', 404);
        }
        $user = User::find($subscription->user->id);
        $notification = $user->notifications()->where('id', $notification->id)->first();
        if (is_null($notification)) {
            return response()->json('Notification not found.', 404);
        }
        $notification->markAsRead();
        event(new NotificationRead($subscription->user->id, $notification->id));
    }

}