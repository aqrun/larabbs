<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function root()
    {
        //dd(\Auth::user()->hasVerifiedEmail());
        return view('pages.root');
    }

    public function permissionDenied()
    {
        if(config('administrator.permission')()) {
            return redirect(url(config('administrator.uri')), 302);
        }
        return view('pages.permission_denied');
    }

}
