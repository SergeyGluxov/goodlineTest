<?php

namespace App\Http\View\Composers;

use App\Paste;
use Carbon\Carbon;
use Illuminate\View\View;

class UserAuthPasteComposer
{
    public function compose(View $view)
    {
        $user_auth_paste = Paste::where('visibility', 0)
            ->where('hide_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
            ->take(10)
            ->get()
            ->reverse();
        $view->with('user_auth_paste', $user_auth_paste);
    }
}