<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Skill;
use App\Policies\SkillPolicy;
use App\Models\Sertifikat;
use App\Policies\SertifikatPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        Skill::class => SkillPolicy::class,
        Sertifikat::class => SertifikatPolicy::class,
    ];
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
