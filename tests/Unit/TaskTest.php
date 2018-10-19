<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 19/10/18
 * Time: 16:17
 */

namespace Tests\Unit;


use App\File;
use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{

    use RefreshDatabase;

    public function a_task_can_have_tags()
    {
        
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
        $file = $task->file();
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
        $file = $task->file();
        // 3 Comprovo
        $this->assertNull($file);

    }

}