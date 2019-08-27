<?php

namespace App\Http\Controllers;

use App;
use App\Paste;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PasteController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->getAuthIdentifier());
            $user_paste = $user->pastes;
        }
        /**Получение последних 10 публичных паст**/
        $public_paste = Paste::where('visibility', 0)
            ->take(10)
            ->get()
            ->reverse();
        return view('paste/create', compact('public_paste', 'user_paste'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        /**TODO: Разграничить пасту от пользователя и от гостя**/
        $paste = new Paste();
        $paste->user_id     = auth('web')->user()->getAuthIdentifier();
        $paste->visibility  = $request->get('visibility');
        $paste->title       = $request->get('title');
        $paste->body        = $request->get('body');
        $paste->create_at   = Carbon::now();
        $paste->hide_at     = Carbon::now();
        $paste->save();
        return redirect(url('/', $paste->getQueueableId()));
    }

    public function show($id)
    {
        $show_paste = Paste::find($id);
        //Паста не найдена
        if ($show_paste == null) {
            abort(404);
        }
        //Если пользователь авторизован
        if (Auth::check() && $show_paste->user_id == Auth::id()) {
            return view('paste/show', compact('show_paste'));
        } else {
            //Проверка доступности к пасте
            if ($show_paste->visibility == 1) {
                abort('403');
            }
        }
        return view('paste/show', compact('show_paste'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
