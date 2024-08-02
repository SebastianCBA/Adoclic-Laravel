<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Entity;
use App\Services\ApiService;
use App\Http\Requests\StoreEntityRequest;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $apiService;

    public function __construct(ApiService $apiService)
    {   
        $this->apiService = $apiService;
    }    


    public function importEntities()
    {
        $response = $this->apiService->fetchEntries();
        $data = $response->json();

        if ($data) {
            $entries = collect($data['entries']);
            $categories = ['Animals', 'Security'];

            $filteredEntries = $entries->filter(function ($entry) use ($categories) {
                return in_array($entry['Category'], $categories);
            });

            foreach ($filteredEntries as $entry) {
                Entity::create([
                    'api' => $entry['API'],
                    'description' => $entry['Description'],
                    'link' => $entry['Link'],
                    'category_id' => $this->getCategoryId($entry['Category']),
                ]);
            }

            return response()->json(['message' => 'Entities imported successfully'], 200);
        }

        return response()->json(['message' => 'Failed to fetch data from API'], 500);
    }

    private function getCategoryId($categoryName)
    {
        $category = Category::where('category', $categoryName)->first();
        return $category ? $category->id : null;
    }

    public function index()
    {
        return Entity::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntityRequest $request)
    {
        $entity = Entity::create($request->validated());
        return response()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $entity;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $entity->update($request->all());
        return response()->json($entity, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entity->delete();
        return response()->json(null, 204);
    }
}
