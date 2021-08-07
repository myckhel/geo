<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\ArtisanDispatchable\Jobs\ArtisanDispatchable;
use Illuminate\Support\Facades\Artisan;

class GeonameInstall implements ShouldQueue, ArtisanDispatchable
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 86400;
    public $failOnTimeout = false;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call('geonames:install');
    }
}
