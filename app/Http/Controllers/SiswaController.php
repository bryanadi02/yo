<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Siswa;
use App\Models\Project;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }



    public function index()
    {
        $data = Siswa::all();
        return view('MasterSiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TambahSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required' => ':attribute harus diisi gaesss',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes'  => 'file :attribute harus bertipe jpg,png, jpeg',
            'size' => 'file yang diupload maksimal :size'
        ];

        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:50',
            'foto' => 'required|mimes:jpg,jpeg,png,gif,svg'
        ], $message);

        //ambil informasi file yang diupload
        $file = $request->file('foto');

        //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
		$file->move($tujuan_upload,$nama_file);

        //Proses Insert Database
        Siswa::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'about' => $request->about,
            'foto' => $nama_file
        ]);

        return redirect('/mastersiswa');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        $kontak = $data->kontak()->get();
        // return($kontak);
        return view('ShowSiswa', compact('data', 'kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('EditSiswa', compact('data'));
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
        $message=[
            'required' => ':attribute harus diisi gaesss',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes'  => 'file :attribute harus bertipe jpg,png, jpeg',
            'size' => 'file yang diupload maksimal :size'
        ];

        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:50',
            'foto' => 'mimes:jpg,jpeg,png,gif,svg'
        ], $message);

        if($request->foto != ''){
            //Ganti Foto

            //1. menghapus file foto lama
            $siswa=Siswa::find($id);
            file::delete('./template/img/'.$siswa->foto);

            //2. ambil informasi file yang diupload
            $file = $request->file('foto');

            //3. rename + ambil nama file
            $nama_file = time()."_".$file->getClientOriginalName();

            //4. proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload,$nama_file);

            //5. menyimpan ke database
            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->foto = $nama_file;
            $siswa->save();
            return redirect ('mastersiswa');


        }else{
            //Tanpa Ganti Foto
            $siswa=Siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->save();
            return redirect ('mastersiswa');
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('mastersiswa');
    }

}
