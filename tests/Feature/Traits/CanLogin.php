<?php


namespace Tests\Feature\Traits;


use App\User;

trait CanLogin
{
    public function login($guard = null): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user, $guard);
    }
}