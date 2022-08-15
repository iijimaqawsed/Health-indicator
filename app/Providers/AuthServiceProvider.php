<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\BmiResult;
use App\Policies\BmiPolicy;
use App\PfcResult;
use App\Policies\PfcPolicy;
use App\User;
use App\Policies\MypagePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        BmiResult::class => BmiPolicy::class,
        PfcResult::class => PfcPolicy::class,
        User::class => MypagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
