<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
    //pour verifier si on s'est connecté pour acceder à cette page
    public function __construct()
    {
        $this->middleware('auth')->except('bar'); //sauf pour bar
    }
    public function foo()
    {
        if (!Gate::allows('acces-admin')) {
            abort(403);
        }
        return view('test.foo');
    }
    public function bar()
    {
        return view('test.bar');
    }
}
