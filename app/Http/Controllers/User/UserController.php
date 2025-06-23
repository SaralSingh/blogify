<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

public function dashboardPage()
{
    $posts = Post::where('user_id', Auth::id())->latest()->get();

    // Add likes and dislikes count manually
    foreach ($posts as $post) {
        $post->likes = PostReaction::where('post_id', $post->id)->where('reaction', 1)->count();
        $post->dislikes = PostReaction::where('post_id', $post->id)->where('reaction', 0)->count();
        $post->comments = PostComment::where('post_id',$post->id)->count();
    }

    return view('User.dashboard', ['posts' => $posts]);
}

    public function postView(string $id)
    {
        $post = Post::with('user')->where('user_id', Auth::id())->findOrFail($id);
        return view('User.postView', compact('post'));
    }


    public function postAddPage()
    {
        return view('User.createPost');
    }

    public function postStore(Request $request)
    {
        // Step 1: Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Step 2: Create the post for the logged-in user
        Post::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => Auth::id(), // Logged-in user
        ]);

        // Step 3: Redirect to dashboard with success message
        return redirect()->route('dashboard.page')->with('success', 'Post created successfully!');
    }

    public function postEditPage(string $id)
    {
        $post = Post::where('user_id', Auth::id())->findorFail($id);
        return view('User.editPost', ['post' => $post]);
    }

    public function postEdit(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

      $status = Post::where('user_id',Auth::id())->findorFail($request->post_id)->update(
        [
            'title'=>$validated['title'],
            'description'=>$validated['description']
        ]
      );

      if($status)
      {
        return redirect()->route('dashboard.page')->with('success', 'Post updated successfully.');
      }
    }

    public function deletePost(string $id)
    {
        $post = Post::where('user_id', Auth::id())->findOrFail($id);
        $post->delete();
        return redirect()->route('dashboard.page')->with('success', 'Post deleted successfully.');
    }

public function viewComment($id)
{
    // Get the post (optional, for title/details)
    $post = Post::findOrFail($id);

    // Get all comments related to this post, with user name
    $comments = PostComment::where('post_id', $id)->with('user')->latest()->get();

    // Send both post and comments to the view
    return view('User.commentView', compact('post', 'comments'));
}
}
