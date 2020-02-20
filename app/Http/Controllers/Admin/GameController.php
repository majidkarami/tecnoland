<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{

    public function index()
    {
        $games = Game::orderby('id', 'DESC')->paginate(10);
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return View('admin.games.create');
    }

    public function store(GameRequest $request)
    {
        $game = new Game($request->all());
        if ($request->hasFile('url')) {
            $file_name = time() . '.' . $request->file('url')->getClientOriginalExtension();
            if ($request->file('url')->move('upload/game', $file_name)) {
                $game->url = 'upload/game/' . $file_name;
            }
        }
        if($request->input('slug')){
            $game->slug = make_slug($request->input('slug'));
        }else{
            $game->slug = make_slug($request->input('title'));
        }
        $game->user_id = auth()->id();
        $game->is_active =  $request->get('is_active');
        $game->saveOrFail();
        Session::flash('success', 'تکنوگیم جدید با موفقیت ایجاد گردید.');
        return redirect(route('games.index'));
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

    public function update(GameRequest $request, $id)
    {
        $game = Game::findOrFail($id);
        if ($request->hasFile('url')) {
            $file_name = time() . '.' . $request->file('url')->getClientOriginalExtension();
            if ($request->file('url')->move('upload/game', $file_name)) {
                $game->url = 'upload/game/' . $file_name;
            }
        }
        $game->title = $request->input('title');
        if($request->input('slug')){
            $game->slug = make_slug($request->input('slug'));
        }else{
            $game->slug = make_slug($request->input('title'));
        }
        $game->description = $request->input('description');
        $game->user_id = auth()->id();
        $game->is_active = $request->get('is_active');
        $game->saveOrFail();
        Session::flash('success', 'تکنوگیم با موفقیت ویرایش گردید.');
        return redirect(route('games.index'));
    }


    public function active($id)
    {
        $game = Game::findOrFail($id);
        $game->is_active=($game->is_active==0) ? 1 : 0;
        $game->update();
        Session::flash('success', 'تکنوگیم با موفقیت تایید گردید.');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        Session::flash('error', 'تکنوگیم با موفقیت حذف شد.');
        return redirect()->back();
    }

}
