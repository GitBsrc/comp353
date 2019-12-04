<?php

namespace App\Http\Controllers;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;

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
        return view('posts', ['posts'=>$posts]);
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
    public function store(Request $request)
    {
            //include validation + make sure session logged in

         
            $posts = new Posts;
            $posts->userID     = Auth::id();
            $posts->firstName = Auth::user()->name;
            $posts->groupID   = 1; // change once proper frontend options are there
            $posts->eventID   = 1; //change once proper frontend options are there
            $posts->canComment = request('canComment'); // need to fill DB table with only 2 values for this to really make sense         
            $posts->save();
           
            $request->validate([
                'post_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            // Check if a profile image has been uploaded
        if ($request->has('post_image')) {
            // Get image file
            $image = $request->file('post_image');
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);

        }
        // Persist user record to database
        $posts->save();

            // redirect
            Session::flash('message', 'Successfully created new post!');
            return redirect('/posts');
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

