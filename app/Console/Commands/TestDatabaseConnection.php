<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class TestDatabaseConnection extends Command
{
    protected $signature = 'db:test-connection';
    protected $description = 'Test the database connection';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            // Realiza una consulta simple para verificar la conexión
            DB::connection()->getPdo();
            $this->info('Database connection is successful.');
        } catch (\Exception $e) {
            $this->error('Database connection failed: ' . $e->getMessage());
        }
    }
}
