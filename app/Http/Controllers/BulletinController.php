<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bulletin;

class BulletinController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData['title'] = 'Anuncios';
        $viewData['bulletins'] = Bulletin::latest()->get();
        return view('bulletins.index')->with('viewData', $viewData);
    }

    public function detail(Bulletin $bulletin){
        $viewData = [];
        $viewData['title'] = "Detalle - " . $bulletin->title;
        $viewData['bulletin'] = $bulletin;
        return view('bulletins.detail')->with('viewData', $viewData);
    }
}