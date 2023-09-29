<?php

namespace App\Policies;

use App\Models\Music;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MusicPolicy
{

    public function view(User $user, Music $music)
    {
        // Xác định xem người dùng có quyền xem một bản ghi Music cụ thể hay không.
        return true; // Hoặc bất kỳ logic xác định quyền truy cập nào dựa trên $user và $music.
    }

    public function update(User $user, Music $music)
    {
        // Xác định xem người dùng có quyền cập nhật một bản ghi Music cụ thể hay không.
        return $user->id === $music->user_updated_id;
    }
    // /**
    //  * Determine whether the user can view any models.
    //  */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can view the model.
    //  */
    // public function view(User $user, Music $music): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can create models.
    //  */
    // public function create(User $user): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can update the model.
    //  */
    // public function update(User $user, Music $music): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can delete the model.
    //  */
    // public function delete(User $user, Music $music): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, Music $music): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Music $music): bool
    // {
    //     //
    // }


}
