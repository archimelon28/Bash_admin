<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
class ControllerBerita extends Controller
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
            $berita = DB::table('news')
                ->join('admin','news.id_admin', '=', 'admin.id_admin')
                ->select('news.*','admin.nama')
                ->orderBy('isAktif','asc')
                ->get();
            return view('News',compact('berita'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('NewsStore');
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
            'isi' => 'required|min:100',
            'gambar_utama' => 'required',
        ]);
        $Berita = new \App\ModelBerita();
        $judul = $request->input('judul');
        $isi = $request->input('isi');
        $gambar_utama =$request->file('gambar_utama');

        $Berita-> judul = $judul;
        $Berita-> isi =$isi;
        $ext = $gambar_utama->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $gambar_utama->move('assets/images/upload/catering/berita/',$newName);
        $Berita->gambar_utama= $newName;
        $Berita-> id_admin = 1;
        $Berita->save();

        return redirect()->route('berita.index')->with('alert-success','Berhasil Menambahkan Data!');
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
    public function edit($id_news)
    {
        $Berita = \App\ModelBerita::findOrFail($id_news);
        return view('NewsUpdate',compact('Berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_news)
    {
        $Berita = \App\ModelBerita::findOrFail($id_news);
        $judul = $request->input('judul');
        $isi = $request->input('isi');
        if (empty($request->file('gambar'))){
            $Berita->gambar_utama = $Berita->gambar_utama;
        }
        else{
            unlink('assets/images/upload/catering/berita/'.$Berita->gambar_utama); //menghapus file lama
            $gambar_utama= $request->file('gambar_utama');
            $ext = $gambar_utama->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_utama->move('assets/images/upload/catering/berita/',$newName);
            $Berita->gambar_utama = $newName;

        }
        $id_admin = $request->input('id_admin');

        $Berita-> judul = $judul;
        $Berita->isi= $isi;
        $Berita->id_admin= $id_admin;
        $Berita->save();
        return redirect()->route('berita.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_news)
    {

        if (Input::get('Aktif'))
        {
            if (DB::table('news')->where('id_news',$id_news)->where('isAktif',1)->update([
                'isAktif' => 2
            ]));
            elseif (DB::table('news')->where('id_news',$id_news)->where('isAktif',2)->update([
                'isAktif' => 1
            ]));
        }
        elseif (Input::get('Hapus'))
        {
            DB::table('news')->where('id_news',$id_news)->update([
                'judul' => '', 'isi' => '','tanggal' => '1998-01-01', 'gambar_utama' => 'default.jpg', 'isAktif' => 2, 'id_admin' => 1
            ]);
        }
        return redirect()->route('berita.index')->with('alert-success','Berhasil Menambahkan Data!');
    }
    public function uploadImage(Request $request) {
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $filename =rand(1000,9999).$file->getClientOriginalName();
                $file->move(public_path().'../konsuldok_profil/uploads/ckeditor/artikel/', $filename);
                $url = url('../konsuldok_profil/uploads/ckeditor/artikel/' . $filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
}
