<?php

use App\Category;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class categoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_category_children()
    {
        $category = Category::create(['name' => 'Demo']);

        $board = $category->children()->create([
            'name' => 'A board',
            'description' => 'A board test..'
        ]);

        $this->assertEquals(1, count( Category::all()->toArray() ) );
        $this->assertTrue($board->parent_id == $category->id);
    }
}
