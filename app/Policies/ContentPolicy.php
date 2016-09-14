<?php

namespace App\Policies;

use App\User;
use App\Content;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can view the content.
     *
     * @param  App\User  $user
     * @param  App\Content  $content
     * @return mixed
     */
    public function view(User $user, Content $content)
    {
        return true;
    }

    /**
     * Determine whether the user can create contents.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the content.
     *
     * @param  App\User  $user
     * @param  App\Content  $content
     * @return mixed
     */
    public function update(User $user, Content $content)
    {
        if ($user->role->level > 90)
        {
            return true;
        }

        if ($user->id === $content->project->user_id)
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the content.
     *
     * @param  App\User  $user
     * @param  App\Content  $content
     * @return mixed
     */
    public function delete(User $user, Content $content)
    {
        if ($user->role->level > 90)
        {
            return true;
        }

        if ($user->id === $content->project->user_id)
        {
            return true;
        }

        return false;
    }

}