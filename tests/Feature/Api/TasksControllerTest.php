<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 11/10/18
 * Time: 19:24
 */

namespace Tests\Feature\Api;


use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @test
     */

    public function cannot_create_a_task_without_name()
    {
        $this->$this->withoutExceptionHandling();


        // XHR -> JSON

        $response = $this->json('GET','/api/v1/tasks/',[
            'name' => ''
        ]);

        $result = json_decode($response->getContent());

        $response -> assertStatus(422);

    }
    /**
     * A basic test example.
     *
     * @test
     */

    public function cannot_edit_a_task_without_name()
    {
        $oldTask = factory(Task::class)->create([
            'Comprar pa'
        ]);

        $response = $this->json('put','/api/v1/tasks/', $oldTask->id, [
            'name' => ''
        ]);

        $response -> assertStatus(422);

    }

    /**
     * A basic test example.
     *
     * @test
     */

    // CRUD -> CRU -> CREATE RETRIEVE UPDATE DELETE
    // BREAD -> PA -> BROWS READ EDIT ADD DELETE

    public function can_show_a_task()
    {
        // routes/api.php
        // http://tasks.test/api/v1/tasks
        // HTP -> GET | POST | PUT | DELETE

        $task = factory(Task::class)->create();
        // 2
        $response = $this->json('get','/api/v1/tasks/' . $task->id);

        $result = json_decode($response->getContent());
        dd($result->name);
        dd($response->getContent());

        // 3
        $response -> assertSuccessful();
        $this->assertEquals($task->completed, (boolean) $result->completed);

    }
    /**
     * A basic test example.
     *
     * @test
     */

    public function can_delete_task()
    {
        $task = factory(Task::class)->create();

        $response = $this->delete('/api/v1/tasks/', $task->id);

        $result = json_decode($response->getContent());

        $response -> assertSuccessful();
        $this->assertEquals( '',$result);

//        $this->assertDatabaseMissing('tasks',$task);
        $this->assertNull(Task::find($task->id));

    }

    /**
     * A basic test example.
     *
     * @test
     */

    public function can_create_task()
    {


        $response = $this->json('get','/api/v1/tasks/',[
            'name' => 'Comprar pa'
            ]);

        $result = json_decode($response->getContent());

        $response -> assertSuccessful();
        $this->assertEquals( '',$result);

//        $this->assertDatabaseMissing('tasks',$task);
        $this->assertNotNull(Task::find($result->id));
        $this->assertEquals( 'Comprar pa', $result->name);
        $this->assertFalse( $result->completed);

    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function can_list_tasks()
    {
        create_exemple_tasks();

        $response = $this->json('get','/api/v1/tasks/');
        $response->assertSuccessful();

        $result = json_decode($response->getContent());

        $this->assertCount(3,$result);
        $this->assertEquals('comprar pa', $result[0]->name);
        $this->assertEquals('comprar llt', $result[0]->name);
        $this->assertEquals('Estudiar PHP', $result[1]->name);

    }

    /**
     * A basic test example.
     *
     * @test
     */

    public function can_edit_task()
    {
        $task = Task::create([
            'name' => 'asdasdasd',
            'completed' => '0'
        ]);
        //2
        $response = $this->put('/tasks/' . $task->id,$newTask = [
            'name' => 'Comprar pa',
            'completed' => '1'
        ]);
        $response->assertStatus(302);
        $task = $task->fresh();
        $this->assertEquals($task->name,$newTask['name']);
        $this->assertEquals($task->completed,$newTask['completed']);


    }

}