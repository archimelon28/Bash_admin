<?php

namespace App\Http\Controllers;

use App\ModelAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class ControllerAdmin extends Controller
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
            $admin = DB::table('admin')->orderBy('isAktif','asc')
                ->get();
            return view('Admin',compact('admin'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminStore');
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
            'nama' => 'required|min:4',
            'username' => 'required|min:4',
            'password' => 'required',
        ]);
        $Admin = new \App\ModelAdmin();

        $nama = $request->input('nama');
        $username =$request->input('username');
        $password =$request->input('password');

        $Admin-> nama= $nama;
        $Admin -> username =$username;
        $Admin-> password = bcrypt($password);
        $Admin->save();
        return redirect()->route('admin.index')->with('alert-success','Berhasil Menambahkan Data!');
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
    public function edit($id_admin)
    {
        $Admin= \App\ModelAdmin::findOrFail($id_admin);
        return view('AdminUpdate',compact('Admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_admin)
    {
        $Admin = \App\ModelAdmin::findOrFail($id_admin);
        $nama = $request->input('nama');
        $username = $request->input('username');
        $password = $request->input('password');

        $Admin-> nama = $nama;
        $Admin->username = $username;
        $Admin->password = bcrypt($password);
        $Admin->save();
        return redirect()->route('admin.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_admin)
    {
        if (DB::table('admin')->where('id_admin',$id_admin)->where('isAktif',1)->update([
            'isAktif' => 2
        ]));
        elseif (DB::table('admin')->where('id_admin',$id_admin)->where('isAktif',2)->update([
            'isAktif' => 1
        ]));
        return redirect()->route('admin.index')->with('alert-success','Berhasil Menambahkan Data!');
    }
}
