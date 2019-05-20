<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*******************************************************************************************************************************************
        ADDED DUE TO EXCEPTION WARNING
        **********************************************************************************************************************************************/
              if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    /*****************************************************************************************************************************************************/
}
        //
        $posts = Post::all();
        return view('posts.index', compact('posts'));     //compact ->takes any name of var and converts to var=> addts "$" to it
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //
        return view('posts.create');  //checked from php srtisan route:list
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     //  return $request->all(); //to check the data input

     //   return $request->get('title'); //returns title only 

    //    return $request->title;    //same as above but here used as property

       /***********************************************************************************************                 
       Persisting data to DB
       ***********************************************************************************************/


      Post::create($request->all());       // 1) first way
      return redirect('/posts');


       // $input = $request->all();            // 2) Second way
       // $input['title'] = $request->title;
       // Post::create($request->all());        //  Ends Here <-


       // $post = new Post;                    // 3) Third Way
       // $post->title = $request->title;
       // $post->save();                       // Ends Here <-
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return "this is show time" . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function contact() 
    {
    	$people = ['Karen', 'Peter', 'Tony', 'Arya', 'Jon'];

    	return view('contact', compact('people'));

    }

    public function show_post($id, $name, $password)
    {
    	// return view('post')->with('id',$id); //with = open post view and pass that data

    	return view('post', compact('id', 'name', 'password')); //compact = convert this 'id'  var into the var passed at the top  $id and pass into view 
    }
}
