<?php


namespace Tests\Feature\Traits;


use App\User;

trait CanLogin
{
    /**
     * @param null $guard
     * @return mixed
     */
    public function login($guard = null)
    {
        $user = factory(User::class)->create();
        $this->actingAs($user, $guard);
        return $user;
    }
}