<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'HOME',
        ];

        return view('/page/Home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me',
    ];

    return view('page/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
        ];

        return view('page/contact', $data);
    }

}
