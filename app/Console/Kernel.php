<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use MichaelDrennen\Geonames\Console\Admin1Code;
use MichaelDrennen\Geonames\Console\Admin2Code;
use MichaelDrennen\Geonames\Console\AlternateName;
use MichaelDrennen\Geonames\Console\DownloadGeonames;
use MichaelDrennen\Geonames\Console\FeatureClass;
use MichaelDrennen\Geonames\Console\FeatureCode;
use MichaelDrennen\Geonames\Console\Geoname;
use MichaelDrennen\Geonames\Console\InsertGeonames;
use MichaelDrennen\Geonames\Console\Install;
use MichaelDrennen\Geonames\Console\IsoLanguageCode;
use MichaelDrennen\Geonames\Console\NoCountry;
use MichaelDrennen\Geonames\Console\PostalCode;
use MichaelDrennen\Geonames\Console\Status;
use MichaelDrennen\Geonames\Console\UpdateGeonames;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Admin1Code::class,
        Admin2Code::class,
        AlternateName::class,
        DownloadGeonames::class,
        FeatureClass::class,
        FeatureCode::class,
        Geoname::class,
        InsertGeonames::class,
        Install::class,
        IsoLanguageCode::class,
        NoCountry::class,
        PostalCode::class,
        Status::class,
        UpdateGeonames::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
