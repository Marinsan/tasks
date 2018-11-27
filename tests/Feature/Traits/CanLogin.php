<?php


namespace Tests\Feature\Traits;


use App\User;
use Spatie\Permission\Models\Permission;

trait CanLogin
{
    /**
     * @param null $guard
     * @return mixed
     */
    protected function login($guard = null)
    {
        $user = factory(User::class)->create();
        $this->actingAs($user,$guard);
        return $user;
    }
    /**
     * @param null $guard
     * @return mixed
     */
    protected function loginAsUsingRole($guard = null)
    {
        initialize_roles();
        $user = factory(User::class)->create();
        $user->assignRole($role);
        $this->actingAs($user,$guard);
        return $user;
    }
    /**
     * @param null $guard
     * @return mixed
     */
    protected function loginWithPermission($guard = null,$permission)
    {
        $user = factory(User::class)->create();
        Permission::create([
            'name' => $permission
        ]);
        $user->givePermissionTo($permission);
        $this->actingAs($user,$guard);
        return $user;
    }
    /**
     * @param null $guard
     * @return mixed
     */
    protected function loginAsSuperAdmin($guard = null)
    {
        $user = factory(User::class)->create();
        $user->admin = true;
        $user->save();
        $this->actingAs($user,$guard);
        return $user;
    }
    /**
     * @param null $guard
     * @return mixed
     */
    public function loginAsTaskManager($guard = null)
    {
        return $this->loginAsUsingRole;
    }
}