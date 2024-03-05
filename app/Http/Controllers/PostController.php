<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Request $request - how to access the values that the user fills in
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->user()->id;
        //save to database
        Post::create($incomingFields);
        //redirect to home page
        return redirect('/');
    }
}
