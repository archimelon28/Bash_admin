<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
class ControllerPesanDetail extends Controller
{
    public function sendEmail(Request $request,$id_pesan)
    {
        try{
            $emails = DB::table('pesan')->where('id_pesan',$id_pesan)->get();

            Mail::send('email', ['nama' => 'info@bash.com', 'deskripsi' => $request->deskripsi], function ($message) use ($request,$emails)
            {
                $message->subject($request->judul);
                $message->from('donotreply@bash.com', 'Bash');
                foreach ($emails as $email)
                {
                    $message->to($email->email);
                }
            });
            return redirect()->route('pesan.index')->with('alert-success','Success send Email!');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
