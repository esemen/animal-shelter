<?php

namespace App\Http\Controllers;

use App\Models\PageType;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    protected function thanks() {

        $tabs = PageType::where('tag','thanks')
            ->with('pages')
            ->get();

        return view('pages.tabbedPage',[
            'title' => 'Thanks & Stories',
            'tabs' => $tabs
        ]);
    }

    protected function news() {
        $tabs = PageType::where('tag','news')
            ->with('pages')
            ->get();
        return view('pages.tabbedPage',[
            'title' => 'News And Events',
            'tabs' => $tabs
        ]);
    }
}
