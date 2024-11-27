<?php

namespace Tests\Feature\Livewire\Task;

use App\Livewire\GoalLivewire;
use App\Livewire\Home;
use App\Models\Goal;
use Database\Factories\GoalFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(GoalLivewire::class)
            ->assertStatus(200);
    }
    /** @test */
    public function component_exists_on_the_page(){
        $this->get('/goal')->assertSeeLivewire(GoalLivewire::class);
    }
    /** @test */
    public function display_goals(){
        //create examples
        Goal::factory()->create(['title'=>'test 1']);
        Goal::factory()->create(['title'=>'test 2','description'=>"test description"]);

        Livewire::test(Home::class)->assertSee('test 1')->assertSee('test description');
    }

}
