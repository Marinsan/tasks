<?php
namespace Tests\Unit;
use App\Tag;
use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class TagTest extends TestCase
{
    use refreshDatabase;
    /**
     * @test
     */
    public function map()
    {
        //preparar
        $tag = factory(Tag::class)->create();
        $tag=Tag::create([
            'name'=>'Comprar pa',
            'description'=>'Comprar pa',
            'color'=>'blau'
        ]);
        //executar
        $mappedTask = $tag->map();
        $this->assertEquals($mappedTask['id'],$tag->id);
        $this->assertEquals($mappedTask['name'],$tag->name);
        $this->assertEquals($mappedTask['description'],$tag->description);
        $this->assertEquals($mappedTask['color'],$tag->color);
    }

    /**
     * @test
     */

    /**
     * @test
     */
    public function can_add_a_task_to_tag()
    {
//        $tag->addTask($task); // On $task vull sigui id o model
//        $tag->addTasks($tasks);  // On $tasks  sigui vector de ids o de model
        // 1 Prepare
        $task = Task::create([
            'name' => 'Comprar pa'
        ]);
        $task2 = Task::create([
            'name' => 'Comprar llet'
        ]);
        $tag = Tag::create([
            'name' => 'home',
            'description' => 'bla bla',
            'color' => 'blue'
        ]);
        // execució
        $tag->addTask($task);
        // Assertion
        $tasks = $tag->tasks;
        $this->assertTrue($tasks[0]->is($task));
        // execució
        $tag->addTask($task2->id);
//        // Assertion
//        $tasks = $tag->tasks;
//        $this->assertTrue($tasks[1]->is($task2));
    }
}
}