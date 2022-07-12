<?php

namespace Tests\Feature;

use App\Models\Types;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TypeTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function user_can_create_types_of_movement(){
        $types = Types::create([
            "types" => "Entry"
        ]);
        $response = $this->postJson('/api/post-types', [
            'types' => $types->types
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'types'
        ])->json();

        $result = $response->json('types');
        print_r($result);
    }
}
