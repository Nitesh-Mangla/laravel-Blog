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
        return redirect( 'create' );
    }

    public function blogData()
    {
        $blogData = category::all();
        $total = count( $blogData );
        $recordsTotal =  $total;
        $recordsFiltered = $total;
        $i = 0;
        $data = array(array());
        foreach( $blogData as $v ){
           
            $data[$i][] = $i+1;
            $data[$i][] = $v['name'];
            $data[$i][] = $v['created_at'];
            $data[$i][] = $v['updated_at'];
            $data[$i][] = "<p id='".$v['id']."' data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' id = '".$v['id']."'><span class='glyphicon glyphicon-pencil'
            ></span></button></p>";
            $data[$i][] = "<p data-placement='top' data-toggle='tooltip' title='Delete'><button class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' id = '".$v['id']."'><span class='glyphicon glyphicon-trash'></span></button></p>";
             $i++;
        }
        if( $total == 0 ){
            $data[0][] = '';
            $data[0][] = '';
            $data[0][] = 'Blog is not available';
            $data[0][] = '';
            $data[0][] = '';
            $data[0][] = '';
        }

        $blogdata = array( 'draw' => 1,
                        'recordsTotal' => $recordsTotal,
                        'recordsFiltered' => $recordsFiltered,
                        'data' => $data
    );
        echo json_encode( $blogdata );
    }

    public function editBlogData( Request $request )
    {
        if( $request->input( 'name' ) ){
            //echo $request->input('id') ;
            $blogData = category::find( $request->input('id') );
            $blogData->name =$request->input('name');
            $blogData->save(); 
            session::flash( 'msg', "Blog is Successfully Updated" );
            return redirect('/');
        }else{
            $blogData = category::find( $request->input('id') );
            echo json_encode($blogData);
        }
    }

    public function destory( Request $request )
    {
        if( $request->input( 'id' ) ){
            $blogData = category::where('id',  $request->input( 'id' ) )->delete();
                if( $blogData )
                {
                    session::flash( 'msg', 'blog is deleted' );
                    $msg = array('status' => '200');
                    echo json_encode($msg);
                }else{
                    session::flash( 'msg', 'blog is not deleted ! Try again later' );
                    $msg = array('status' => '504');
                    echo json_encode($msg);
                }
                //return redirect('/');
        }
    }
}
