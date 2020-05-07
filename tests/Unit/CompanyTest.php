<?php

namespace Tests\Unit;

use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CompanyTest extends TestCase
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
    public function company_can_be_created()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
//        $this->actingAs(factory('App\User')->create());

        $data = [
            'company_name' => $this->faker->name,
            'company_email' => $this->faker->email,
            'company_logo' => null,
            'company_website' => $this->faker->url
        ];
        $this->post(route('companies.store'), $data)
            ->assertStatus(200);

    }

    /** @test */
    public function company_can_be_updated()
    {
        $old_comp = factory('App\Model\Company')->create();
        $newCompany = [
            'company_name' => $this->faker->name,
            'company_email' => $this->faker->email,
            'company_logo' => null,
            'company_website' => $this->faker->url,
            'id' => $old_comp->id
        ];
        $this->put(route('companies.update.company'), $newCompany)
            ->assertStatus(200);
    }

    /** @test */
    public function company_can_be_deleted()
    {
        $old_comp = factory('App\Model\Company')->create();
        $this->delete(route('companies.destroy', $old_comp->id));
        $this->assertDatabaseMissing('companies', ['id' => $old_comp->id]);
    }

}
