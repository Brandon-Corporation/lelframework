<?php

namespace Bcorp\lelframework\Commands;

use Symfony\Component\Process\Process;
use TCG\Voyager\Traits\Seedable;
use Illuminate\Console\Command;
use Bcorp\Lelframework\BcorpLelServiceProvider;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{

    use Seedable;
    protected $seedersPath = __DIR__ . '/../../database/seeds/';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lelframework:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install your LeL framework';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function findComposer()
    {
        if (file_exists(getcwd() . '/composer.phar')) {
            return '"' . PHP_BINARY . '" ' . getcwd() . '/composer.phar';
        }

        return 'composer';
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Remove default welcome page');
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));

        $this->info('Remove default web route');
        $routes_contents = (new Filesystem)->get(base_path('routes/web.php'));
        if (false !== strpos($routes_contents, "return view('welcome')")) {
            $routes_contents = str_replace("\n\nRoute::get('/', function () {\n    return view('welcome');\n});", '',
                $routes_contents);
            (new Filesystem)->put(base_path('routes/web.php'), $routes_contents);
        }

        $this->call('vendor:publish', ['--provider' => BcorpLelServiceProvider::class]);

        $this->info('Dumping the autoloaded files and reloading all new files');
        $composer = $this->findComposer();
        $process = new Process([$composer, 'dump-autoload']);
        $process->setTimeout(null); // Setting timeout to null to prevent installation from stopping at a certain point in time
        $process->setWorkingDirectory(base_path())->mustRun();

        $this->call('migrate');
        $this->seed('lelframeworkDatabaseSeeder');
    }
}
