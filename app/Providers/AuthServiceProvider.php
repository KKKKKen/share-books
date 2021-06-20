<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
// use App\Models\Post;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',

        // 'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',


    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 第一引数＝ユーザーインスタンス？
        // $userのrolesにadminがあるかをforeachで調べていく

        Gate::define('admin', function($user){
            foreach($user->roles as $role){
                if($role->name == 'admin'){
                    return true;
                }
            }
            return false;
        });

        //
    }
}
