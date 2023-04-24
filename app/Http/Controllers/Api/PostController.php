<?php

namespace App\Http\Controllers\Api;

use App\Models\Demografis;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\DB;
use App\Http\Controllers\Controller;

use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $posts = Demografis::latest()->paginate(5);
            
        return new PostResource(true, 'List Data Demografis', $posts);
    }
    
    public function total()
    {
        $laki = Demografis::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Demografis::where('jenis_kelamin', 'Perempuan')->count();
        $data = [
        'success' => true,
        'message' => "List total data",
        'total' => Demografis::count(),
        'Laki-laki' => $laki,
        'Perempuan' => $perempuan  ,
       ];

       return response()->json($data);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kota' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendapatan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $post = Demografis::create([
            'nama'     => $request->nama,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'kota'   => $request->kota,
            'agama'   => $request->agama,
            'pekerjaan'   => $request->pekerjaan,
            'pendapatan'   => $request->pendapatan,
        ]);

        //return response
        return new PostResource(true, 'Data Berhasil Ditambahkan!', $post);
    }

    public function show($id)
    {
        $post = Demografis::find($id);

        return new PostResource(true, 'Detail Data Post!', $post);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kota' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendapatan' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $post = Demografis::find($id);

            $post->update([
                'nama'     => $request->nama,
                'tanggal_lahir'   => $request->tanggal_lahir,
                'jenis_kelamin'   => $request->jenis_kelamin,
                'kota'   => $request->kota,
                'agama'   => $request->agama,
                'pekerjaan'   => $request->pekerjaan,
                'pendapatan'   => $request->pendapatan,
            ]);

        return new PostResource(true, 'Data Post Berhasil Diubah!', $post);
    }

    public function destroy($id)
    {
        $post = Demografis::find($id);

        $post->delete();

        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
