<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Berkas;
use App\Models\Biodata;
use App\Models\Jurusan;
use App\Models\Others;
use App\Models\Sekolah;
use App\Models\Wali;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDashboardController extends Controller
{
    //Biodata
    public function createBiodata(Request $request)
    {

        $req = $this->validate($request, [
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dusun' => 'required',
            'rt_rw' => 'required',
            'id_user' => 'required',
        ]);

        $create = Biodata::create($req);
        if ($create) {
            return response()->json([
                'message' => 'success'
            ]);
        } else {
            return response()->json([
                'message' => 'failed'
            ]);
        }
    }

    public function updateBiodata(Request $request)
    {

        $req = $this->validate($request, [
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dusun' => 'required',
            'rt_rw' => 'required',
            'id_user' => 'required',
        ]);

        $biodata = Biodata::where('id_user', $request->id_user);

        // Update data
        $update = $biodata->update([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'dusun' => $request->dusun,
            'rt_rw' => $request->rt_rw,
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function getBiodata()
    {

        $dataBiodata = Biodata::where('id_user', Auth::user()->id)->first();
        return response()->json([
            'data' => $dataBiodata ? $dataBiodata : null
        ]);
    }

    public function getSekolah()
    {
        $dataSekolah = Sekolah::where('id_user', Auth::user()->id)->first();

        return response()->json([
            'data' => $dataSekolah ? $dataSekolah : false
        ]);
    }

    public function createSekolah(Request $request){

        $req = $this->validate($request, [
            'nama_sekolah' => 'required',
            'nisn' => 'required',
            'no_ijazah' => 'required',
            'tahun_lulus' => 'required',
            'id_user' => 'required',
        ]);
        $create = Sekolah::create($req);
        if($create){
            return response()->json([
                'message' => 'success'
            ]);
        }else{
            return response()->json([
                'message' => 'failed'
            ]);
        }
    }

    public function updateSekolah(Request $request){

        $req = $this->validate($request, [
            'nama_sekolah' => 'required',
            'nisn' => 'required',
            'no_ijazah' => 'required',
            'tahun_lulus' => 'required',
            'id_user' => 'required',
        ]);
        $update = Sekolah::where('id_user', $request->id_user)->update([
            'nama_sekolah' => $request->nama_sekolah,
            'nisn' => $request->nisn,
            'no_ijazah' => $request->no_ijazah,
            'tahun_lulus' => $request->tahun_lulus,
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function getJurusan()
    {

        $dataJurusan = Jurusan::where('id_user', Auth::user()->id)->first();
        return response()->json([
            'data' => $dataJurusan ? $dataJurusan : null
        ]);
    }

    public function createJurusan(Request $request)
    {

        $req = $this->validate($request, [
            'fakultas' => 'required',
            'prodi'=> 'required',
            'reason' => 'required',
            'id_user' => 'required',
        ]);
        $create = Jurusan::create($req);
        if ($create) {
            return response()->json([
                'message' => 'success'
            ]);
        } else {
            return response()->json([
                'message' => 'failed'
            ]);
        }
    }

    public function updateJurusan(Request $request)
    {

        $req = $this->validate($request, [
            'fakultas' => 'required',
            'prodi'=> 'required',
            'reason'=> 'required',
            'id_user' => 'required',
        ]);
        $update = Jurusan::where('id_user', $request->id_user)->update([
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'reason' => $request->reason,
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function getWali(Request $request)
    {
        $dataWali = Wali::where('id_user', $request->route('id'))->first();
        return response()->json([
            'data' => $dataWali ? $dataWali : null
        ]);
    }

    public function createWali(Request $request)
    {
        $req = $this->validate($request, [
            'nama_wali' => 'required',
            'hubungan'=> 'required',
            'kontak'=> 'required',
            'pekerjaan'=> 'required',
            'alamat'=> 'required',
            'id_user' => 'required',
        ]);
        $create = Wali::create($req);
        if ($create) {
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'failed'
        ]);
    }

    public function updateWali(Request $request)
    {

        $req = $this->validate($request, [
            'nama_wali' => 'required',
            'hubungan'=> 'required',
            'kontak'=> 'required',
            'pekerjaan'=> 'required',
            'alamat'=> 'required',
            'id_user' => 'required',
        ]);
        $update = Wali::where('id_user', $request->id_user)->update([
            'nama_wali' => $request->nama_wali,
            'hubungan' => $request->hubungan,
            'kontak' => $request->kontak,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }

    
    public function getOthers(Request $request)
    {

        $dataOthers = Others::where('id_user', $request->route('id'))->first();
        return response()->json([
            'data' => $dataOthers ? $dataOthers : null
        ]);
    }

    public function createOthers(Request $request)
    {

        $req = $this->validate($request, [
            'organisasi' => 'required',
            'jabatan_organisasi' => 'required',
            'hobi' => 'required',
            'prestasi' => 'required',
            'id_user' => 'required',
        ]);
        $create = Others::create($req);
        if ($create) {
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'failed'
        ]);
    }

    public function updateOthers(Request $request)
    {

        $req = $this->validate($request, [
            'organisasi' => 'required',
            'jabatan_organisasi' => 'required',
            'hobi' => 'required',
            'prestasi' => 'required',
            'id_user' => 'required',
        ]);
        $update = Others::where('id_user', $request->id_user)->update([
            'organisasi' => $request->organisasi,
            'jabatan_organisasi' => $request->jabatan_organisasi,
            'hobi' => $request->hobi,
            'prestasi' => $request->prestasi,
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }
    // view
    public function viewBerkas()
    {

        return view('users.berkas');
    }

    public function createBerkas(Request $request)
    {

        $validatedData = $this->validate($request, [
            'ktp'=> 'required',
            'ijazah'=> 'required',
            'kk'=> 'required',
            'bukti_pembayaran'=> 'required',
            'skl'=> 'required',
            'raport'=> 'required',
            'sertifikat'=> 'required',
            'id_user' => 'required',
        ]);
        
       $ktp = Storage::url($request->file('ktp')->store('public/berkas')) ;
       $ijazah = Storage::url($request->file('ijazah')->store('public/berkas')) ;
       $kk = Storage::url($request->file('kk')->store('public/berkas')) ;
       $bukti_pembayaran = Storage::url($request->file('bukti_pembayaran')->store('public/berkas')) ;
       $skl = Storage::url($request->file('skl')->store('public/berkas')) ;
       $raport = Storage::url($request->file('raport')->store('public/berkas')) ;
       $sertifikat = Storage::url($request->file('sertifikat')->store('public/berkas')) ;
    
        $create = Berkas::create([
            'ktp' => $ktp,
            'ijazah' => $ijazah,
            'kk' => $kk,
            'bukti_pembayaran' => $bukti_pembayaran,
            'skl' => $skl,
            'raport' => $raport,
            'sertifikat' => $sertifikat,
            'id_user' => $request->id_user,

        ]);

        if($create){
            return response()->json([
                'message' => $create    
            ]);
        }

        return response()->json([
            'message' => 'failed'
        ]);
    }

    function getBerkas(Request $request)
    {

        $dataBerkas = Berkas::where('id_user', $request->route('id'))->first();
        return response()->json([
            'data' => $dataBerkas ? $dataBerkas : null
        ]);
    }

    function pengumumanView()
    {
        return view('users.pengumuman');
    }
    public function viewAkun()
    {
        return view('users.index');
    }

    public function dataUsersView()
    {
        return view('users.users-data');
    }

    public function getDataUsers(){

        $dataUsers = User::where('role', 'user')->get();
        return response()->json([
            'data' => $dataUsers
        ]);
    }

    function deleteUsers(Request $request)
    {

        $delete = User::where('id', $request->id)->delete();
        if ($delete) {
            return response()->json([
                'message' => 'success',
                'status'=> 200
            ]);
        }
        return response()->json([
            'message' => 'failed'
        ]);
    }

    function getDatapeserta(Request $request)
    {

        $dataBiodata = Biodata::where('id_user', $request->route('id'))->first();
        $dataWali = Wali::where('id_user', $request->route('id'))->first();
        $dataBerkas = Berkas::where('id_user', $request->route('id'))->first();
        $dataJurusan = Jurusan::where('id_user', $request->route('id'))->first();
        $dataOthers = Others::where('id_user', $request->route('id'))->first();
        $dataSekolah = Sekolah::where('id_user', $request->route('id'))->first();

        return response()->json([
            'dataBiodata' => $dataBiodata,
            'dataWali' => $dataWali,
            'dataBerkas' => $dataBerkas,
            'dataJurusan' => $dataJurusan,
            'dataOthers' => $dataOthers,
            'dataSekolah' => $dataSekolah
        ]);
       
    }

    function dataPesertaView(){
        return view('users.data-peserta');
    }
}
