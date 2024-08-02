<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use Validator;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * Verifica que se pueda crear una Instancia.
     **/
    public function test_it_creates_an_instance_of_category()
    {
        $category = new Category();
        $this->assertInstanceOf(Category::class, $category);
    }

    /** 
     * Verifica que se pueda crear una Instancia y recuperar.
     **/
    public function test_it_has_category_attribute()
    {
        $category = new Category(['category' => 'Electronics']);
        $this->assertEquals('Electronics', $category->category);
    }
    /** 
     * Verifica que el campo category sea requerido 
     **/
    public function test_it_requires_a_category_field()
    {
        $response = $this->post('/categories', ['category' => '']);

        $response->assertSessionHasErrors('category');
    }
    /** 
     * Verifica que exista la relacion con entidades.
     **/
    public function test_it_has_many_entities_relationship()
    {
        $category = new Category();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $category->entities());
    }
}
