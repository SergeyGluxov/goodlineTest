<?php

namespace App\Http\Controllers;

use App;
use App\Helpers\HelpersPaste;
use App\Paste;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PasteController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->getAuthIdentifier());
            $user_paste = $user->pastes
                ->where('hide_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
                ->reverse();
        }
        /**Получение последних 10 публичных паст**/
        $public_paste = Paste::where('visibility', 0)
            ->where('hide_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
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
        //Если пользователь зарегистрирован, то передаем в paste его id
        if (Auth::check()) {
            $paste->user_id = auth('web')->user()->getAuthIdentifier();
        }
        $paste->visibility = $request->get('visibility');
        $paste->title = $request->get('title');
        $paste->body = $request->get('body');
        $paste->create_at = Carbon::now();
        $paste->hide_at = HelpersPaste::addHours($request->get('time-live'));
        $paste->save();
        return redirect(url('/', $paste->slug()));
    }

    public function show($slug)
    {
        $show_paste = Paste::findBySlug($slug);
        if ($show_paste == null) {
            abort(404);
        } elseif (Carbon::parse($show_paste->hide_at) <= Carbon::now()) {
            abort(404);
        } else
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
