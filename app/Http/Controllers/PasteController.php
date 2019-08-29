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
        return view('paste/create');
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
        $paste->lang = $request->get('_lang');
        $paste->save();
        return redirect(url('/', $paste->slug()));
    }

    public function show($slug)
    {
        $show_paste = Paste::findBySlug($slug);
        //Если паста не найдена
        if ($show_paste == null) {
            abort(404);
        }
        if($show_paste->visibility==2)
        {
            if(Auth::id()!=$show_paste->user_id)
            {
                abort(401);
            }
            else{
                return view('paste/show', compact('show_paste'));
            }
        }
        //Если срок доступности пасты истек
        elseif (Carbon::parse($show_paste->hide_at) <= Carbon::now()) {
            abort(404);
        }
        else
            return view('paste/show', compact('show_paste'));
    }

}
