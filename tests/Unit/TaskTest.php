<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 19/10/18
 * Time: 16:17
 */

namespace Tests\Unit;


use App\File;
use App\Tag;
use App\Task;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function can_assign_user_to_task()
    {
        // 1 Prepare
        $task = Task::create([
            'name' => 'Comprar pa'
        ]);

        $userOriginal = factory(User::class)->create();

        $task->assignUser($userOriginal);

        $user = $task->user;

        $this->assertTrue($user->is($userOriginal));
    }

    /**
     * @test
     */
    public function can_assign_tag_to_task()
    {
        // 1 Prepare
        $task = Task::create([
            'name' => 'Comprar pa'
        ]);
        $tag = Tag::create([
            'name' => 'feina',
            'description' => "blablab",
            'color' => '#04B404'
        ]);
        // execució
        $task->addTag($tag);
        // Assertion
        $tags = $task->tags;
        $this->assertTrue($tags[0]->is($tag));
    }

    /**
     * @test
     */
    public function a_task_can_have_tags() {
        // 1 Prepare
        $task = Task::create([
            'name' => 'Comprar pa'
        ]);
        $tag1 = Tag::create([
            'name' => 'home',
            'description' => "blablab",
            'color' => '#04B404'
        ]);
        $tag2 = Tag::create([
            'name' => 'work',
            'description' => "blablab",
            'color' => '#04B404'
        ]);
        $tag3 = Tag::create([
            'name' => 'studies',
            'description' => "blablab",
            'color' => '#04B404'
        ]);
        $tags = [$tag1, $tag2, $tag3];
        // execució
        $task->addTags($tags);
        // Assertion
        $tags = $task->tags;

        $this->assertTrue($tags[0]->is($tag1));
        $this->assertTrue($tags[1]->is($tag2));
        $this->assertTrue($tags[2]->is($tag3));
    }

    /**
     * @test
     */

    public function a_task_can_have_one_file()
    {
        // 1 Preparacio
        $task = Task::create([
            'name' => 'Comprar pa'
        ]);
//        add_file_to_task($file, $task);
        $fileOriginal = File::create([
           'path' => 'fitxer1.pdf'
        ]);

        $task->assignFile($fileOriginal);
        // 2 Executo -> wishful programming
        // IMPORTANT
        // aixo torna tota la relacio
        $file = $task->file;
        // Aixo retorna el obkecte
        $file = $task->file;
        // 3 Comprovo
        $this->assertTrue($file->is($fileOriginal));

    }
    /**
     * @test
     */
    public function a_task_file_returns_null_when_no_file_is_assigned()
    {
        // 1 Preparacio
        $task = Task::create([
            'name' => 'Comprar pa'
        ]);
        // 2 Executo -> wishful programming
        $file = $task->file;
        // 3 Comprovo
        $this->assertNull($file);

    }

    /**
     * @test
     */
    public function can_toogle_completed()
    {
        $task = factory(Task::class)->create([
            'completed' => false
        ]);
        $task->toggleCompleted();
        $this->assertTrue($task->completed);
        $task = factory(Task::class)->create([
            'completed' => true
        ]);
        $task->toggleCompleted();
        $this->assertFalse($task->completed);

    }

    /**
     * @test
     */

    public function map()
    {
        //1
        $user = factory(User::class)->create();

        $user = factory(User::class)->create();
        $task = Task::create([
            'name' => 'Comprar pa',
            'completed' => false,
            'user_id' => $user->id
        ]);
        //2
        $mappedTask = $task->map();
        // 3
        $this->assertEquals($mappedTask['id'],1);
        $this->assertEquals($mappedTask['name'],'Comprar pa');
        $this->assertEquals($mappedTask['completed'],false);
        $this->assertEquals($mappedTask['user_id'],$user->id);
        $this->assertEquals($mappedTask['user_name'],$user->name);
        $this->assertEquals($mappedTask['user_email'],$user->email);
        $this->assertNotNull($mappedTask['created_at']);
        $this->assertNotNull($mappedTask['created_at_formatted']);
        $this->assertNotNull($mappedTask['created_at_human']);
        $this->assertNotNull($mappedTask['created_at_timestamp']);
        $this->assertNotNull($mappedTask['updated_at']);
        $this->assertNotNull($mappedTask['updated_at_formatted']);
        $this->assertNotNull($mappedTask['updated_at_human']);
        $this->assertNotNull($mappedTask['updated_at_timestamp']);
        // TODO fullsearch
        $this->assertTrue($user->is($mappedTask['user']));
    }

    public function login(): void
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
    }
}