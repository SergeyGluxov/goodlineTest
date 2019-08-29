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
        $paste = new Paste();
        //Если пользователь авторизован, то передаем в paste его id
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
        if ($show_paste->visibility == 2) {
            if (Auth::id() == $show_paste->user_id) {
                return view('paste/show', compact('show_paste'));
            } else {
                abort(401);
            }
        } //Если срок доступности пасты истек
        elseif (Carbon::parse($show_paste->hide_at) <= Carbon::now()) {
            abort(404);
        } else
            return view('paste/show', compact('show_paste'));
    }

    /**Поиск среди публичных паст(доступно всем)
     * visibility 0 - публичные
     * visibility 1 - только по ссылке
     * visibility 2 - приватные
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search_paste = Paste::where('visibility', 0)
            ->where('hide_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
            ->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', "%$request->search_paste%")
                    ->orWhere('body', 'LIKE', "%$request->search_paste%");
            })
            ->get();
        return view('paste/search', compact('search_paste'));
    }
}
