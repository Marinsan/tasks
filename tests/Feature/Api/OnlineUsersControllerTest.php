<?php
namespace Tests\Feature\Api;
use App\Models\UserType;
use App\User;
use Carbon\Carbon;
use Config;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;
/**
 * Class OnlineUsersControllerTest.
 *
 * @package Tests\Feature
 */
class OnlineUsersControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;
    /**
     * @test
     */
    public function regular_user_cannot_see_online_users()
    {
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        factory(User::class)->create();
        $expiresAt = Carbon::now()->addMinutes(5);
        Cache::put(User::USERS_CACHE_KEY. '-user-is-online-' . $user1->id, true, $expiresAt);
        Cache::put(User::USERS_CACHE_KEY. '-user-is-online-' . $user2->id, true, $expiresAt);
        $response = $this->json('GET','/api/v1/users/online');
        $response->assertStatus(401);
    }
    /**
     * @test
     */
    public function user_can_see_online_users_empty()
    {
        $this->login('api');
        $response = $this->json('GET','/api/v1/users/online');
        $response->assertSuccessful();
        $this->assertCount(0,json_decode($response->getContent()));
    }
    /**
     * @test
     */
    public function user_can_see_online_users()
    {
        $this->login('api');
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        factory(User::class)->create();
        $expiresAt = Carbon::now()->addMinutes(5);
        Cache::put(User::USERS_CACHE_KEY. '-user-is-online-' . $user1->id, true, $expiresAt);
        Cache::put(User::USERS_CACHE_KEY. '-user-is-online-' . $user2->id, true, $expiresAt);
        $response = $this->json('GET','/api/v1/users/online');
        $response->assertSuccessful();
        $result = json_decode($response->getContent());
        $this->assertCount(2,$result);
    }
}