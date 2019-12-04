<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Posts;
use App\GroupMembers;
use App\Group;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // get user posts and groups
        $id = Auth::id();
        $posts = Posts::where('userID', $id)->get();
        $group_members = GroupMembers::where('userID', $id)->get();
        $groups = array();
        foreach($group_members as $membership){
            $groupID = $membership->groupID;
            $group = Group::where('id', $groupID)->first();
            array_push($groups, $group);
        }

        $post_count = 0;
        foreach($posts as $post){
            $post_count = $post_count + 1;
        }
        $group_count = 0;
        foreach($groups as $group){
            $group_count = $group_count + 1;
        }

        // return view
        return view('profile', 
            ['user'=>$user, 
            'posts'=>$posts, 
            'groups'=>$groups,
            'post_count'=>$post_count,
            'group_count'=>$group_count
        ]);
    }

    /**
     * Display unique group page.
     */
    public function get($id){
        $user = User::findOrFail($id);
        // get user posts and groups
        $posts = Posts::where('userID', $id)->get();
        $group_members = GroupMembers::where('userID', $id)->get();
        $groups = array();
        foreach($group_members as $membership){
            $groupID = $membership->groupID;
            $group = Group::where('id', $groupID)->first();
            array_push($groups, $group);
        }

        $post_count = 0;
        foreach($posts as $post){
            $post_count = $post_count + 1;
        }
        $group_count = 0;
        foreach($groups as $group){
            $group_count = $group_count + 1;
        }

        // return view
        return view('profile', 
            ['user'=>$user, 
            'posts'=>$posts, 
            'groups'=>$groups,
            'post_count'=>$post_count,
            'group_count'=>$group_count
        ]);
    }
}
