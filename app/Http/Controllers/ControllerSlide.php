<?php

namespace App\Http\Controllers;

use App\ModelSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;

class ControllerSlide extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $slide =  DB::table('slide')
                ->orderBy('isAktif','asc')
                ->get();
            return view('Slide',compact('slide'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SlideStore');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'gambar' => 'required',
        ]);
        $Slide = new \App\ModelSlide();
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        $gambar =$request->file('gambar');

        $Slide-> judul = $judul;
        $Slide-> deskripsi = $deskripsi;
        $ext = $gambar->getClientOriginalExtension();
        $newName = date('Ymd_his').Session::get('id_admin').".".$ext;
        $gambar->move('bash_profile/uploads/slide/',$newName);
        $Slide->gambar = $newName;
        $Slide->save();
        return redirect()->route('slide.index')->with('alert-success','Success insert data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_slide)
    {
        $Slide = \App\ModelSlide::findOrFail($id_slide);
        return view('SlideUpdate',compact('Slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_slide)
    {
        $Slide = \App\ModelSlide::findOrFail($id_slide);
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        if (empty($request->file('gambar'))){
            $Slide->gambar = $Slide->gambar;
        }
        else{
            unlink('bash_profile/uploads/slide/'.$Slide->gambar); //menghapus file lama
            $gambar= $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $newName = date('Ymd_his').Session::get('id_admin').".".$ext;
            $gambar->move('bash_profile/uploads/slide/',$newName);
            $Slide->gambar = $newName;
        }
        $Slide-> judul = $judul;
        $Slide-> deskripsi = $deskripsi;
        $Slide->save();
        return redirect()->route('slide.index')->with('alert-success','Success update data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_slide)
    {
        if (Input::get('Aktif'))
        {

            if (DB::table('slide')->where('id_slide',$id_slide)->where('isAktif',1)->update([
                'isAktif' => 2
            ]));
            elseif (DB::table('slide')->where('id_slide',$id_slide)->where('isAktif',2)->update([
                'isAktif' => 1
            ]));

        return redirect()->route('slide.index')->with('alert-success','Success update status data!');

        }
        elseif (Input::get('Hapus'))
        {
            $data = ModelSlide::where('id_slide',$id_slide)->first();
            $data->delete();
            unlink('bash_profile/uploads/slide/'.$data->gambar);

        return redirect()->route('slide.index')->with('alert-success','Success delete data!');

        }
    }
}
