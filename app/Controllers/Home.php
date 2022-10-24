<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Chen's Florist Admin System",

        ];
        return view('home/index', $data);
    }
}
