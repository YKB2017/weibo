<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 验证用户只能删除自己的动态
     * @param User $user
     * @param Article $article
     * @return bool
     */
    public function destroy(User $user,Article $article)
    {
        return $user->id === $article->user_id;
    }
}
