<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Log;

class ApiService
{
    public function fetchEntries()
    {
        try {
            $response = Http::get('https://web.archive.org/web/20240403172734if_/https://api.publicapis.org/entries');

            if ($response->successful()) {
                return $response;
                //return $response->json();
            } else {
                Log::error('API responde con error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error('No pudimos obtener la información', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return null;
        }
    }
}