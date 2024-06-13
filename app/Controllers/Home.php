<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('view_html_header')
        .view('view_html_main')
        .view('view_html_footer');
    }
}
