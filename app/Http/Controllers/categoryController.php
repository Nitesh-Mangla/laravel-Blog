<?php

namespace App\Http\Controllers;
use App\category;
use App\Http\Requests;
use Validator;
use Session;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function createCategory()
    {
        return view( 'category.create' );
    }

    public function storeCategory( Request $request )
    {
        if( $request->submit ){
             $validation = validator::make( $request->all() , [
            'name' => 'required|max:20|min:5'
        ]);

        if( $validation->fails() )
        {
            return redirect('/')->withinput()->withErrors( $validation );;            
        }

        $category = new category();
        $category->name = $request->name;
        $category->save();

        session::flash( 'category', 'Category is created successfully' );
    }
        return reqdirect( 'category/create' );
    }
}
