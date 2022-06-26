<?php

namespace App\Http\Controllers;

use App\Lib\Creators;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index() {
        $creators = Creators::getInstance();

        return view("dashboard")->with('creators', $creators::getCreators());
    }
}
