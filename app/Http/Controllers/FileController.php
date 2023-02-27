<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::select()
                ->paginate(3);
        return view('file.index', ['files'=>$files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            // 'name' => '',
            // 'name_fr' => '',
            // 'path_file'=>'required',
            
        ]);
        //
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        $file->storeAs('public/uploads',$filename);

      

        $newFile= File::create([
            'name'=>$request->name,
            'name_fr'=>$request->name_fr,
            'path_file'=> $filename,
            'user_id'=>Auth::user()->id,
        ]  );
        return redirect(route('file.index'));
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
        return view('file.edit', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //

        $file->update([
            'name' => $request->name,
            'name_fr' => $request->name_fr,
           
           
        ]);

        return redirect(route('file.index'));

    }




    public function download(File $file){
        $filename= $file->path_file;
        $file_path= storage_path('app/public/uploads/'.$filename);

        if(File_exists($file_path)){
            return response()->download($file_path);

        }else{
            abort(404,'file not found');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
      
        $file->delete();
        Storage::delete('public/uploads/'.$file->path_file);
        return redirect(route('file.index'));
    }

    
 
}
