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
        $task = Task::create([
            'name' => 'Comprar pa'
        ]);
        $tag = Tag::create([
            'name' => 'home'
        ]);
        $tag2 = Tag::create([
            'name' => 'work'
        ]);
        $tag3 = Tag::create([
            'name' => 'studies'
        ]);
        $tag = [$tag, $tag2, $tag3];
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
            'name' => 'home'
        ]);
        $tag2 = Tag::create([
            'name' => 'work'
        ]);
        $tag3 = Tag::create([
            'name' => 'studies'
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

}