<?php

namespace App\Http\View\Composers;

use App\Paste;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserAuthPasteComposer
{
    public function compose(View $view)
    {
        $user_paste = null;
        if (Auth::check()) {
            $user = User::find(Auth::user()->getAuthIdentifier());
            $user_paste = $user->pastes
                ->where('hide_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
                ->reverse();
        }
        $view->with('user_auth_paste', $user_paste);

    }
}