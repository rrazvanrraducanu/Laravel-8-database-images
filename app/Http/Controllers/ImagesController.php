<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
//use Illuminate\Support\Facades\Request;
use Session;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $image=new Image;
        $image->title=$request->get('nume');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $target=md5(uniqid(time())).$file->getClientOriginalName();
            $image->name=$target;
            $image->size=$file->getSize();
            $image->type=$file->getClientMimeType();
            
            $file->move(public_path().'/images/',$target);
            
        }
        $image->save();
       // return 'data saved in database';
     return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showall()
    {
        $image=Image::all();
        return view('showall', compact('image'));
    }
    public function show($id)
    {
        $image=Image::findorfail($id);
        return view('show',compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image=Image::where('id','=',$id)->first();
        return view('edit',['image'=>$image]);
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
         $image=Image::findOrFail($id);  
    if ($request->hasFile('image'))
        {
$file=$request->file('image');
$target=md5(uniqid(time())).$file->getClientOriginalName();
$file->move(public_path().'/images/',$target);
$image->name=$target;                            
        }   
             $image->id = $request['id'];
             $image->title = $request['title'];

          $image->save();             
      return redirect('/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
    $image=Image::where('id','=',$id)->first();
    if($image->delete()){
    Session::flash('message','Record was deleted');
    return redirect('/');
    }else{
        Session::flash('message','Error!Please try again!');
        return redirect('/');
    }
}
    public function destroy($id)
    {
        //
    }
}
