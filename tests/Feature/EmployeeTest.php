<?php

namespace Tests\Feature;

use App\Models\Employees;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function user_can_record_employees(){
        
        $employee = Employees::create([
            "names" => "Ganza Tamba Heritier",
            "gender" => "male",
            "phonenumber" => "0789326245"
        ]);
        $response = $this->postJson('/api/postemployees', [
            'names' => $employee->names,
            'gender' => $employee->gender,
            'phonenumber' => $employee->phonenumber
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'employee'
        ])->json();
    }

     /** @test */
     public function user_can_list_employees(){
        $employee = Employees::create([
            "names" => "heritier",
            "gender" => "female",
            "phonenumber" => "0788519633"
        ]);
        $response = $this->getJson("/api/employees");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'employees'
        ])->json();
        $result = $response->json('employees');
        print_r($result);
     }
     /** @test */
     public function user_can_update_employees(){
        
     }
}
