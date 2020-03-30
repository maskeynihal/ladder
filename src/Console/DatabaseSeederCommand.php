<?php


namespace maskeynihal\ladder\Console;

use Illuminate\Console\Command;
use maskeynihal\ladder\Seeds\DatabaseSeeder;

class DatabaseSeederCommand extends Command
{
    protected $signature = 'ladder:seed';

    protected $description = 'Seed Ladder Data';

    public function handle()
    {
        $this->info('Seeding Data');
        $seeder = new DatabaseSeeder();

        $seeder->run();
    }
} 

