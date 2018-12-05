<?php

namespace App\Http\Controllers\posts;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use App\Post;
use Illuminate\Http\Request;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $posts = Post::where('title', 'ILIKE', "%$keyword%")
                ->orWhere('content', 'ILIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);
        } else {
            $posts = Post::latest()->paginate($perPage);
        }


        return view('posts.posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function home(Request $request)
    {

//        this sql should be safe, because there is not contents required from user input
        $posts = DB::select(
            DB::raw(
"
select p.id as id, p.title as title, p.featured as featured, p.content as content, p.created_at as created_at, p.updated_at as updated_at, i.url as url 
from posts as p, images as i 
where p.id = i.post_id
order by p.featured DESC ,  p.updated_at DESC , p.created_at DESC, p.id DESC
LIMIT 4
;"
//            the limit should work well on postgres sql and sqlite
        ) );


        return view('welcome', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Post::create($requestData);

        return redirect('posts')->with('flash_message', 'Post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
//        $images = Image::all() -> where('post_id', $id);



        return view('posts.posts.show',

            compact('post')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $post = Post::findOrFail($id);
        $post->update($requestData);

        return redirect('posts')->with('flash_message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('posts')->with('flash_message', 'Post deleted!');
    }
}
