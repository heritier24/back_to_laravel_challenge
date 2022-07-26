<?php

use App\Models\Employees;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// it('has employeepest page', function () {
//     $response = $this->get('/api/employees');

//     $response->assertStatus(200);
// });

test('can create employee to database', function (){
    $employee = [
            "names" => "Ganza Tamba Heritier",
            "gender" => "Male",
            "phonenumber" => "0789326245"
    ];
    $response = $this->postJson('/api/postemployees', $employee);
    $response->assertStatus(201);
});

it('can fetch employees ', function(){
    Employees::create([
        'names' => "names",
        'gender' => "male",
        'phonenumber' => "0789326245"
    ]);
    $response = $this->getJson('/api/employees');

    $response->assertStatus(200);
});

test('can update employees', function() {
    $employee = Employees::create([
        'names' => "tamba",
        "gender" => "female",
        "phonenumber" => "0788519633"
    ]);
    $response = $this->putJson("/api/update-employee/{$employee->id}", [
        "names" => "heritier",
        "gender" => "male",
        "phonenumber" => "0789326245"
    ]);
    $response->assertStatus(201);
});
it('can delete employee', function() {
    $employee = Employees::create([
        'names' => "heritier",
        'gender' => "male",
        'phonenumber' => "0739380749"
    ]);
    $response = $this->deleteJson("api/delete-employee/{$employee->id}");
    $response->assertStatus(200);
    $this->assertCount(0, Employees::all());
});