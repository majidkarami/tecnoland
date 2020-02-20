<?php

namespace App\Http\Controllers\User;

use App\Contact;
use App\Game;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function index()
    {
        $questions = Contact::where('show' , 'game')->where('is_active' , 1)->get();
        $games = Game::where('is_active' , 1)->orderBy('id' ,  'DESC')->get();
        return view('technoland.game.index',compact('questions','games'));
    }

    public function show($slug)
    {
        $game=Game::where('slug' , $slug)->first();
        return view('technoland.game.show',compact('game'));
    }


}
