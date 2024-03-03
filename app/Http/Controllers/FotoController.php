<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function hapuspostingan(Request $request, $id){
        $foto = Foto::find($id);
        $foto->all;
        $foto->delete();
    
        return redirect()->back()->with('success', 'Postingan Berhasil di Hapus');



        // public function editpostingan(Request $request,$id){
            //     $foto = Foto::find($id);
            
            //     $foto->judul_foto       = $request->judul_baru;
            //     $foto->deskripsi_foto   = $request->deskripsi_baru;
            //     $foto->album            = $request->album;
            
            //     $foto->save();
            
            //     return redirect()->back()->with('success', 'Postingan Berhasil Di Perbaharui');
            
            // }
            
            
        }
        }