<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entity;
use App\Models\Category;

class EntityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_an_entity()
    {
        // Prepare
        $category = Category::factory()->create();

        // Act
        $entity = Entity::create([
            'api' => 'sample-api',
            'description' => 'Sample description',
            'link' => 'https://example.com',
            'category_id' => $category->id,
        ]);

        // Assert
        $this->assertDatabaseHas('entities', [
            'api' => 'sample-api',
            'description' => 'Sample description',
            'link' => 'https://example.com',
            'category_id' => $category->id,
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $response = $this->post('/entities', [
            'link' => '',
            'category_id' => 999,
        ]);
    
        $response->assertStatus(302); 
    
        $response->assertSessionHasErrors([
            'link' => 'The link field is required.',
            'category_id' => 'The selected category does not exist.',
        ]);
    }

    /** @test */
    public function it_has_a_valid_foreign_key_constraint()
    {
        // Prepare
        $category = Category::factory()->create();

        // Act
        $entity = Entity::create([
            'api' => 'valid-api',
            'description' => 'Valid description',
            'link' => 'https://validlink.com',
            'category_id' => $category->id,
        ]);

        // Assert
        $this->assertTrue($entity->category->is($category));
    }

    /** @test */
    public function it_handles_nullable_fields()
    {
        // Prepare
        $category = Category::factory()->create();

        // Act
        $entity = Entity::create([
            'link' => 'https://nullable.com',
            'category_id' => $category->id,
            // 'api' and 'description' are null by default
        ]);

        // Assert
        $this->assertNull($entity->api);
        $this->assertNull($entity->description);
    }
}
