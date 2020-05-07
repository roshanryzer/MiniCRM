<?php

namespace Tests\Unit;

use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Model\Company;
use App\Model\Employee;

class EmployeeTest extends TestCase
{

    use  DatabaseMigrations, WithoutMiddleware;

    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function employee_can_be_created()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
        $company = factory(Company::class)->create();
        $employee = [
            'employee_first_name' => $this->faker->firstName,
            'employee_last_name' => $this->faker->lastName,
            'employee_email' => $this->faker->email,
            'employee_company' => $company->id,
            'employee_phone' => '0123333232',
        ];
        $this->post(route('employees.store'), $employee)
            ->assertStatus(200);
    }

    /** @test */
    public function employee_can_be_updated()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
        $company = factory(Company::class)->create();
        $employee = factory(Employee::class)->create(['company_id'=> $company->id]);
        $newEmployee = [
            'employee_update_first_name' => $this->faker->firstName,
            'employee_update_last_name' => $this->faker->lastName,
            'employee_update_email' => $this->faker->email,
            'employee_update_company' => $company->id,
            'employee_update_phone' => '0982873456',
        ];
        $this->put(route('employees.update', $employee->id), $newEmployee)
            ->assertStatus(200);
    }


    /** @test */
    public function employee_can_be_deleted()
    {

        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
        $company = factory(Company::class)->create();
        $employee = factory(Employee::class)->create(['company_id'=> $company->id]);

        $this->delete(route('employees.destroy', $employee->id));
        $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
    }
}
