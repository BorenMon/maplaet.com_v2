<?php

namespace App\Providers;

use App\Models\AdminPage;
use App\Models\Artwork;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        Gate::define('manage_user', fn(User $user) => $user->role == 'admin');
        Gate::define('preview_artwork', function(User $user, Artwork $artwork) {
            $artworkCategory = $artwork->artworkCategory;
            $brandPage = $artworkCategory->brandPage;
            $adminPage = $brandPage->admin_page;
            
            if($user->admin_page_id == $adminPage->id) {
                if($user->role == 'admin') {
                    return true;
                } else if(isset($user->accessible_pages_id) && in_array($brandPage->id, $user->accessible_pages_id)){
                    return true;
                }
            }

            return false;
        });
    }
}
