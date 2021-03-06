<?php

namespace Tests\Feature\Api;


use App\Events\TaskUpdate;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\Feature\Traits\CanLogin;
use Tests\TestCase;

class LoggedUserTasksControllerTest extends TestCase
{
    use RefreshDatabase, CanLogin;

    /**
     * @test
     */
    public function can_list_logged_user_tasks()
{
    initialize_roles();
    $user=$this->loginAsTasksUser('api');

    $task1 = factory(Task::class)->create();
    $task2 = factory(Task::class)->create();
    $task3 = factory(Task::class)->create();

    $tasks = [$task1,$task2,$task3];
    $user->addTasks($tasks);

    // 2 execute
    $response = $this->json('GET','/api/v1/user/tasks');
    $response->assertSuccessful();

    $result = json_decode($response->getContent());
    $this->assertCount(3,$result);

    $this->assertEquals($result[0]->id,$task1->id);
    $this->assertEquals($result[1]->id,$task2->id);
    $this->assertEquals($result[2]->id,$task3->id);
}
    /**
     * @test
     */
    public function can_not_list_logged_user_tasks_if_user_is_not_logged()
{
    // 2
    $response = $this->json('GET','/user/tasks');
    $response->assertStatus(401);
}
    /**
     * @test
     */
    public function can_edit_a_task()
    {

        $user = $this->loginAsTasksUser('api');
        Event::fake();
        // 1
        $oldTask = factory(Task::class)->create([
            'name' => 'comprar llet',
            'description'=>'comprarla a la gasolinera'
        ]);
        // 2
        $user->addTask($oldTask);
        $response = $this->json('PUT','/api/v1/user/tasks/' . $oldTask->id, [
            'name' => 'Comprar pa',
            'description'=>'asdasdad'
        ]);
        // 3
        $result = json_decode($response->getContent());
        $response->assertSuccessful();
        $newTask = $oldTask->refresh();
        $this->assertNotNull($newTask);
        $this->assertEquals($oldTask->id,$result->id);
        $this->assertEquals('Comprar pa',$result->name);
        $this->assertEquals('asdasdad',$result->description);
        $this->assertFalse((boolean) $newTask->completed);
        Event::assertDispatched(TaskUpdate::class, function ($event) use ($newTask) {
            return $event->task->is($newTask);
        });

    }

    /**
     * @test
     */
    public function cannot_edit_a_task_not_associated_to_user()
    {
        $this->loginAsTasksUser('api');
        // 1
        $oldTask = factory(Task::class)->create([
            'name' => 'comprar llet'
        ]);
        // 2
        $response = $this->json('PUT','/api/v1/user/tasks/' . $oldTask->id, [
            'name' => 'Comprar pa'
        ]);
        // 3
        $response->assertStatus(404);

    }

    /**
     * @test
     */

    public function can_delete_task()
    {
        $this->withoutExceptionHandling();
        $user=$this->loginAsTasksUser('api');
        $task = factory(Task::class)->create([
            'name' => 'Comprar llet',
            'description'=>'asdasfadf'
        ]);
        $user->addTask($task);
        $response = $this->json('DELETE','/api/v1/user/tasks/' . $task->id);
        $response->assertSuccessful();
        $this->assertCount(0,$user->tasks);
        $task = $task->fresh();
        $this->assertNull($task);
    }

    /**
     * @test
     */

    public function cannot_delete_not_owned_task()
    {
        $user = $this->login('api');

        $task = factory(Task::class)->create([
            'name' => 'Comprar pa',
            'description'=>'asdasfadf'
        ]);

        $response = $this->json('DELETE','/api/v1/user/tasks' . $task->id);
        $response->assertStatus(404);
    }
}