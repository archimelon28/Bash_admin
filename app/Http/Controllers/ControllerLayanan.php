<?php

namespace App\Http\Controllers;

use App\ModelLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
class ControllerLayanan extends Controller
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
            $layanan = DB::table('layanan')
                ->orderBy('isAktif','asc')
                ->get();
            return view('Layanan',compact('layanan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('LayananStore');
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
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);
        $Layanan = new \App\ModelLayanan();
        $judul = $request->input('judul');
        $gambar =$request->file('gambar');
        $deskripsi = $request->input('deskripsi');

        $Layanan-> judul = $judul;
        $ext = $gambar->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $gambar->move('assets\images\upload\layanan',$newName);
        $Layanan->gambar= $newName;
        $Layanan-> deskripsi = $deskripsi;
        $Layanan->save();
        return redirect()->route('layanan.index')->with('alert-success','Berhasil Menambahkan Data!');
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
    public function edit($id_layanan)
    {
        $Layanan = \App\ModelLayanan::findOrFail($id_layanan);
        return view('LayananUpdate',compact('Layanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_layanan)
    {
        $Layanan = \App\ModelLayanan::findOrFail($id_layanan);
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        if (empty($request->file('gambar'))){
            $Layanan->gambar = $Layanan->gambar;
        }
        else{
            unlink('assets/images/upload/layanan/'.$Layanan->gambar); //menghapus file lama
            $gambar= $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar->move('assets/images/upload/layanan/',$newName);
            $Layanan->gambar = $newName;
        }
        $Layanan-> judul = $judul;
        $Layanan-> deskripsi = $deskripsi;
        $Layanan->save();
        return redirect()->route('layanan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_layanan)
    {
        if (Input::get('Aktif'))
        {

            if (DB::table('layanan')->where('id_layanan',$id_layanan)->where('isAktif',1)->update([
                'isAktif' => 2
            ]));
            elseif (DB::table('layanan')->where('id_layanan',$id_layanan)->where('isAktif',2)->update([
                'isAktif' => 1
            ]));
        }
        elseif (Input::get('Hapus'))
        {
            $data = ModelLayanan::where('id_layanan',$id_layanan)->first();
            $data->delete();
            unlink('assets/images/upload/layanan/'.$data->gambar);

        }

        return redirect()->route('layanan.index')->with('alert-success','Berhasil Menambahkan Data!');
    }
}
