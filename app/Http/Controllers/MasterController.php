<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function user()
    {
        return auth('api')->user();
    }
    public function isAdmin()
    {
        return $this->user() ? $this->user()->role == 'admin' : null;
    }
}
