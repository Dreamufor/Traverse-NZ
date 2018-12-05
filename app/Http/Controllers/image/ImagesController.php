<?php

namespace App\Http\Controllers\image;

use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Imgur;
use App\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $images = Image::where('post_id', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $images = Image::latest()->paginate($perPage);
        }

        return view('image.images.index', compact('images'));
    }

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    private function upload_picture(UploadedFile $file){

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();


        $image = Imgur::upload($file);

        return $image;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('image.images.create');
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



        $this->validate($request, [
            'post_id' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $requestData = $request->all();


        try {

            $file1 = $request->file('img');



            if($file1){
                $img = $this->upload_picture($file1);
                $requestData['url'] = $img->link();
            }


            $image= Image::create($requestData);


            return redirect('/posts/'.$image->post_id)->with('flash_message', 'Image added!'."add image for it" );



        }catch (\Exception $e){
            echo 'errors during uploading image'.$e;

            return redirect('posts')->with('flash_message', 'Errors'.$e);
        }

//        return redirect('images')->with('flash_message', 'Image added!');
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
        $image = Image::findOrFail($id);

        return view('image.images.show', compact('image'));
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
        $image = Image::findOrFail($id);

        return view('image.images.edit', compact('image'));
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

        $image = Image::findOrFail($id);
        $image->update($requestData);

        return redirect('images')->with('flash_message', 'Image updated!');
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
        Image::destroy($id);

        return redirect('images')->with('flash_message', 'Image deleted!');
    }
}
