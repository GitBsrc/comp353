<?php

namespace App\Http\Controllers;
use App\_Posts_;
use Illuminate\Http\Request;

//add routes
class postController extends Controller
{
     /**
     * Display a listing of all posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // get all the posts
         $posts = Posts::all();

       // load the view and pass the posts
       return View::make('views.posts')
           ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/postform.blade.php)
        return View::make('views.postform');   
    
    }

    /**
     * Store a newly created post in database.
     *
     * @return Response
     */
    public function store()
    {
            //include validation + make sure session logged in

            // store
            $posts = new Posts;
            $posts->user_id    = Input::get('user_id');
            $posts->first_name = Input::get('first_name');
            $posts->group_id   = Input::get('group_id');
            $posts->event_id   = Input::get('event_id');
            $posts->constraint = Input::get('constraint');
            $posts->save();

            // redirect
            Session::flash('message', 'Successfully created new post!');
            return Redirect::to('Posts');
        
    }

   /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the nerd
        $posts = Posts::find($id);

        // show the view and pass the nerd to it
        return View::make('views.posts')
            ->with('posts', $posts);
    }


  /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        //validate that the owner of the post is the only one who can edit
        // get the nerd
        $posts = Posts::find($id);

        // show the edit form and pass the current post
        return View::make('views.editpost')
            ->with('posts', $posts);
    }

   /**
     * Update the specified post in database.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //validate that the owner of the post is the only one who can edit
        // store
            $posts = new Posts;
            $posts->user_id    = Input::get('user_id');
            $posts->first_name = Input::get('first_name');
            $posts->group_id   = Input::get('group_id');
            $posts->event_id   = Input::get('event_id');
            $posts->constraint = Input::get('constraint');
            $posts->save();

            // redirect
            Session::flash('message', 'Successfully updated post!');
            return Redirect::to('Posts');
        
    }

  /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //validate that the owner of the post is the only one who can edit
        // delete
        $posts = Posts::find($id);
        $posts->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the post!');
        return Redirect::to('Posts');
    }

}

