<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Bulletin;
use App\Models\Category;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $viewData = [];
        $viewData['bulletins'] = Auth::user()->bulletins()->latest()->get(); 
        return view('admin.index')->with('viewData', $viewData);
    }

    public function store(Request $request){
        if ($request->method() !== 'POST'){
            $viewData = [];
            $viewData['title'] = "Crear un Anuncio";
            $viewData['categories'] = Category::where('id', '!=', 1)->get();
            return view('admin.add')->with('viewData', $viewData);
        }else{
            $validated = $request->validate(Bulletin::BULLETIN_VALIDATOR, Bulletin::BULLETIN_ERROR_MESSAGE);
            $category = Category::find($request->input('category'));
            $bulletin = new Bulletin(['title' => $validated['title'],
                                        'content' => $validated['content'],
                                        'price' => $validated['price'],
                                        'image' => $validated['image']]);
            $bulletin->category()->associate($category);
            $bulletin->user()->associate(Auth::user());
            $bulletin->save();
            if($request->hasFile('image')){
                $imageName = $bulletin->id.".".$request->file('image')->extension();
                Storage::disk('public')->put(
                    $imageName,
                    file_get_contents($request->file('image')->getRealPath())
                );
                $bulletin->image = $imageName;
                $bulletin->save();
            }
            return redirect()->route('admin.index');
        } 
    }

    public function edit(Bulletin $bulletin){
        $viewData = [];
        $viewData['title'] = $bulletin->id . " - Editar Oferta";
        $viewData['categories'] = Category::where('id', '!=', 1)->get();
        $viewData['bulletin'] = $bulletin;
        return view('admin.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, Bulletin $bulletin){
        $validated = $request->validate(Bulletin::BULLETIN_VALIDATOR, Bulletin::BULLETIN_ERROR_MESSAGE);
        $category = Category::find($request->input('category'));
        $bulletin->fill(['title' => $validated['title'],
                        'content' => $validated['content'],
                        'price' => $validated['price']]);
        $bulletin->category()->associate($category);
        $bulletin->user()->associate(Auth::user());
        $bulletin->save();
            if($request->hasFile('image')){
                $imageName = $bulletin->id.".".$request->file('image')->extension();
                Storage::disk('public')->put(
                    $imageName,
                    file_get_contents($request->file('image')->getRealPath())
                );
                $bulletin->image = $imageName;
                $bulletin->save();
            }
            return redirect()->route('admin.index');
    }

    public function delete(Bulletin $bulletin){
        $bulletin->delete();
        return redirect()->back();
    }

}