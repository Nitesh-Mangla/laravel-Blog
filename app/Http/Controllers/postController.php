<?php

namespace App\Http\Controllers;
use App\category;
use App\Post;
use Validator;
use Session;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
        $blogData = new category(); 
        $category = array();
        foreach( $blogData::all() as $cate )
        {
            $category[ $cate->id ] = $cate->name;
        }   
        return view('post.post')->with('category',$category);
    }

    public function createPost(  Request $request )
    {
        $validator = validator::make( $request->all(), [
            'pic' => 'required|mimes:jpg,jpeg,gif,png',
            'title' => 'required|max:30|min:10',
            'author' => 'required|max:15|min:5',
            'short' => 'required|max:100|min:10',
            'desc' => 'required|min:10'
         ] );

         if( $validator->fails() )
         { 
             return redirect('/post')->withInput()->withErrors( $validator);
         }

        $category = category::find( $request->input( 'cat' ) );
        $id = $category->id;    
        $image = $request->file( 'pic' );
        $upload  ='images/post/';
        $filename = time().$image->getClientOriginalName();
        $path = move_uploaded_file( $image->getPathName(), $upload.$filename );

        $post = new post();
        $post->category_id = $id;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->image = $filename;
        $post->short_desc = $request->short;
        $post->description = $request->desc;
        $post->save();
        session::flash('msg','Blog post is successfully uploaded' );
        return redirect( '/post' );
    }

    public function blogPost( $id = '' )
    {
        if( !empty( $id ) ){
            $post = post::where( 'category_id', $id )->get();   
        }else{
            $post = post::all();
        }
       
        $categories = category::all();
        $i=0;
        if( count($post) > 0 ){
            foreach( $post as $values )
            {
                $data[$i]['category'] = category::find( $values->category_id )->name;
                $data[$i]['title']  = $values->title;
                $data[$i]['author'] = $values->author;
                $data[$i]['image'] = '/'.$values->image;
                $data[$i]['short'] = $values->short_desc;
                $data[$i]['description'] = $values->description;
                $data[$i]['date'] = $values->created_at;
                $i++;
            }
        }
        if( empty( $data ) ){
            $data = array();
        }
        
        return view('post.blogPost')->with('post',$data)->with('category', $categories);
    }

    public function showBlogPost()
    {
        return; 
    }
}
