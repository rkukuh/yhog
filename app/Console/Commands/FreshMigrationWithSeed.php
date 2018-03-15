<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FreshMigrationWithSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'madewow:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fresh migration and Seeding data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Continue to Fresh migration and Seeding data?')) {

            $this->info('[START] Fresh migration and Seeding data..........');

            $this->callSilent('migrate:fresh', [
                '--seed'  => true,
                '--force' => true
            ]);

            $this->info('[DONE ] Fresh migration and Seeding data.');

            if ($this->confirm('Install example data?')) {

                $this->info('[START] Install example data..........');

                $this->call('db:seed', ['--class' => 'ExampleDataSeeder']);

                $this->info('[DONE ] Install example data.');
            }

            $this->info('');

        }
    }
}
