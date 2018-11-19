<?php
namespace Tests\Unit;
use App\Tag;
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
}