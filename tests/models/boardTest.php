<?php

use App\Board;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class boardTest extends TestCase
{
    use DatabaseTransactions;

    private $board;
    private $category;

    /** @test */
    public function set_a_new_parent(){
        $this->createCategoryAndBoard();
        $anotherCategory = factory('App\Category', 1)->create(['name' => 'New category']);

        $this->board->setParent($anotherCategory);

        $this->assertEquals($anotherCategory->id, $this->board->parent->id);
    }

    /** @test */
    public function create_board_children(){
        $this->createCategoryAndBoard();

        factory('App\Board', 3)->create([
            'parent_id' => $this->board->id,
            'parent_type' => 'App\Board'
        ]);

        $this->assertEquals(3, $this->board->children()->count());

        $this->board->addChild(['name' => 'Sub child', 'description' => 'Sub child description..']);

        $this->assertEquals(4, $this->board->children()->count());
    }

    protected function createCategoryAndBoard(){
        $this->category = factory('App\Category', 1)->create();
        $this->board = $this->category->children()->create([
            'name' => 'Test Board',
            'description' => 'Test board...'
        ]);
    }
}

/**
 * Relations that a board has
 *
 * OPTIONAL parent (hasOne) - A polymorphic relationship that could either be a category or a board
 * OPTIONAL children - A board may have a child or many child boards
 * topics (hasMany)
 *
 */

/**
 * A list of things a board should be able to do
 *
 * getParent /
 * getChildren /
 * getTopics
 * getLatestThread
 * getLatestPost
 * createThread
 *
 */