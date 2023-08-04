<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondController extends Controller
{
    function test() {
        return 'it is come from another controller';
    }
}
