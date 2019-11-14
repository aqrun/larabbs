<?php
namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        // if use hase manage_contents permission return true
        if($user->can('manage_contents')) {
            return true;
        }
    }
}
