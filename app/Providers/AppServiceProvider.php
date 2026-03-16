<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::define('edit-student',function(User $user, Student $student) {
        //     return $user->id === $student->user_id;
        // });

        // Gate::define('teachers',function(User $user){
        //     return $user->user_type === 'teacher';
        // });
    }
}
