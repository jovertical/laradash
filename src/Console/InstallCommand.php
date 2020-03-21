<?php

namespace JovertPalonpon\Laradash\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laradash:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Install all of Laradash's resources";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing Laradash Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'laradash-config']);

        $this->comment('Publishing Laradash Assets...');
        $this->purgeAssets();
        $this->callSilent('vendor:publish', ['--tag' => 'laradash-assets']);

        $this->comment('Publishing Laradash Views...');
        $this->callSilent('vendor:publish', ['--tag' => 'laradash-views']);

        $this->comment('Publishing Laravel Emails...');
        $this->callSilent('vendor:publish', ['--tag' => 'laravel-mail']);

        $this->info('Laradash installed successfully.');
    }

    /**
     * Remove previously published assets
     *
     * @return bool
     */
    private function purgeAssets()
    {
        return File::deleteDirectory(public_path('vendor/laradash'));
    }
}
