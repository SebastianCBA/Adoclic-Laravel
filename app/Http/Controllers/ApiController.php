<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\Category;

class ApiController extends Controller
{
    public function getCategoryData($category)
    {
        $category = Category::where('category', $category)->first();
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $entities = Entity::where('category_id', $category->id)->get();
        
        $data = $entities->map(function ($entity) {
            return [
                'api' => $entity->api,
                'description' => $entity->description,
                'link' => $entity->link,
                'category' => [
                    'id' => $entity->category_id,
                    'category' => $entity->category->category
                ]
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
