<?php

namespace Woodoocoder\LaravelLocation\Console;

use Illuminate\Console\Command;

class InitCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'locations:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize Lacations';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $this->info('Migrating ...');
        $this->call('migrate');

        $this->info('Seeding Data ...');
        $this->call('db:seed', ["--class" => "Woodoocoder\LaravelLocation\Database\Seeds\CountiesTableSeeder"]);
        //$this->call('db:seed', ["--class" => "RegionsTableSeeder"]);
        //$this->call('db:seed', ["--class" => "CitiesTableSeeder"]);
        
        $this->info('Done!');
    }
}