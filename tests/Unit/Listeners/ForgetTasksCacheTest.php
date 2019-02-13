<?php
use App\Events\TaskStored;
use App\Listeners\ForgetTasksCache;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
class ForgetTasksCacheTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function can_forget_incidents_key()
    {
        $listener = new ForgetTasksCache();
        $task = Task::create([
            'name' => 'prova',
            'description' => 'Descripcio'
        ]);
        $user = User::create([
            'name' => 'Pepito',
            'email' => 'pepito@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        Cache::shouldReceive('forget')
            ->once()
            ->with(Task::TASKS_CACHE_KEY);
        $listener->handle(new TaskStored($task, $user));
    }
}