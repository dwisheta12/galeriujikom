<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Like;

class ProfilController extends Controller
{
    public function getdatapin(Request $request){
        $data = auth()->user();
        return response()->json([
            'data'      => $data
        ], 200);
    }

    public function getdata(Request $request){
        $explore = Foto::with('likefotos')->withCount(['likefotos', 'comments'])->where('user_id', auth()->id())->paginate(4);
        return response()->json([
            'data' =>$explore,
            'statuscode' => 200,
            'id'     => auth()->user()->id
        ]);
    }

    public function likesfoto(Request $request){
        try {
            $request->validate([
                'idfoto' => 'required'
            ]);

            $existingLike = Like::where('foto_id', $request->idfoto)->where('user_id', auth()->user()->id)->first();
            if(!$existingLike){
                $dataSimpan = [
                    'foto_id'  => $request->idfoto,
                    'user_id'  => auth()->user()->id
                ];
                Like::create($dataSimpan);
            } else {
                Like::where('foto_id', $request->idfoto)->where('user_id', auth()->user()->id)->delete();
            }

            return response()->json('Data berhasil si simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('Something went wrong', 500);
        }
    }
    //ubah profile
    public function update(Request $request){
        $user = auth()->user();
        if($request->hasFile('picture')){
            $picture    = $request->file('picture');
            $extensi    = $picture->getClientOriginalExtension();
            $filename   = 'users' . now()->timestamp .'.'. $extensi;
            $picture->move('assets', $filename);
        } else {
            $picture = $user->picture;
        }
        
        $user->nama_lengkap = $request->nama_lengkap;
        $user->username     = $request->username;
        $user->alamat       = $request->alamat;
        $user->picture      = $filename;

        $user->save();

        return redirect()->back()->with('success','Profile Berhasil Diperbaharui');
    }
}
