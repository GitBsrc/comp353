<?php

namespace App\Http\Controllers;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;
use App\Event;
use App\Group;
use App\Traits\UploadTrait;

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
        $id = Auth::id();

        // load the view and pass the posts
        return view('posts', ['posts'=>$posts, 'id' => $id]);
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

            $this->validate($request, ['selected_event' => 'nullable', 'selected_group' => 'nullable', 'cancomment' => 'nullable', 'postContent' => 'nullable', 'post_image' => 'nullable']);
            $posts = new Posts();
            $posts->userID     = Auth::id();
            $posts->firstName = Auth::user()->name;
            $posts->groupID   = $request->input('selected_group'); // change once proper frontend options are there
            $posts->eventID   = $request->input('selected_event'); //change once proper frontend options are there
            if($request->has('canComment')) {
                $posts->canComment = 1;
            }
            else {
                $posts->canComment = 0;
            }
            $posts->postContent = $request->input('postContent');


           // Check if a profile image has been uploaded
        if ($request->has('post_image')) {
            // Get image file
            $image = $request->file('post_image');
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . Auth::user()->name. '.' . $image->getClientOriginalExtension();
            // Upload image

            //$image_upload->uploadOne($image, $folder, 'public', Auth::user()->name);
            
            $posts->post_image = $request->validate([
                'post_image'     =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        }
        // Persist user record to database
        $posts->save();

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
    public function update(Request $request)
    {
        $this->validate($request, ['cancomment' => 'nullable', 'postContent' => 'nullable', 'post_image' => 'nullable']);

        $posts = new Posts;
        $posts->userID     = Auth::id();
        $posts->firstName = Auth::user()->name;
        $posts->canComment = $request->input('cancomment'); // need to fill DB table with only 2 values for this to really make sense         
        $posts->postContent = $request->input('postContent');
              // Check if a profile image has been uploaded
              if ($request->has('post_image')) {
                // Get image file
                $image = $request->file('post_image');
                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . Auth::user()->name. '.' . $image->getClientOriginalExtension();
                // Upload image
    
                //$image_upload->uploadOne($image, $folder, 'public', Auth::user()->name);
                
                $posts->post_image = $request->validate([
                    'post_image'     =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
                ]);
              }
            $posts->save();

            // redirect
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

    public function createPostForm()
    {
        $events = Event::all();
        $groups = Group::all();
        return view('postform')->with(['events' => $events, 'groups' => $groups]);
    }
}