<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Request;
/**
 * Class OnlineUsersController.
 *
 * @package App\Http\Controllers\Tenant\Api\Users
 */
class OnlineUsersController extends Controller
{
    public function index(Request $request)
    {
        $onlineUsers = User::all()->filter(function ($user) {
            return $user['online'];
        });
        return map_simple_collection($onlineUsers->values());
    }
}