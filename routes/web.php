<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
use App\Mahasiswa;
use App\Dosen;
use App\Hobi;

//Route One to One
Route::get('relasi-1', function ()
{
    //Memilih data mahasiswa yang memiliki nim '876492673496'
    $mhs = Mahasiswa::where('nim','=','876492673496')->first();

    //Menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->wali->nama;
});

Route::get('relasi-2', function ()
{
    //Memilih data mahasiswa yang memiliki nim '876492866386'
    $mhs = Mahasiswa::where('nim','=','876492866386')->first();

    //Menampilkan data dosen dari mahasiswa yang dipilih
    return $mhs->dosen->nama;
});

//One to Many
Route::get('relasi-3', function ()
{
    //Mencari dosen dengan yang bernama SaraAzzahra
    $dosen = Dosen::where('nama','=','SaraAzzahra')->first();

    //Menampilkan seluruh data mahasiswa didikannya
    foreach ($dosen->mahasiswa as $temp)
            echo '<li> Nama : ' . $temp->nama .
                 '<strong>' . $temp->nim . '</strong>
                  </li>';
});

Route::get('relasi-4', function ()
{
    //Mencari mahasiswa yang bernama aqila
    $aqila = Mahasiswa::where('nama','=','AqilaAufaRahma')->first();

    //Menampilkan seluruh hobi dari aqila
    foreach ($aqila->hobi as $temp)
            echo '<li>' . $temp->hobi . '</li>';
});

Route::get('relasi-5', function ()
{
    //Mencari mahasiswa yang bernama aqila
    $sb = Hobi::where('hobi','=','senag bermain sepak bola')->first();

    //Menampilkan semua mahasiswa yang mempunyai hobi mancing lele
    foreach ($sb->mahasiswa as $temp)
            echo '<li> Nama : ' . $temp->nama . '<strong>' .
                    $temp->nim . '</strong></li>';
});

Route::get('relasi-join', function ()
{
    //Join laravel
    //$sql = Mahasiswa::with('wali')->get();
    $sql = DB::table('mahasiswas')
    ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')
    ->get();
    dd($sql);
});

Route::get('eloquent', function ()
{
    //Mencari mahasiswa yang bernama aqila
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    return view ('eloquent',compact('mahasiswa'));
});

Route::get('eloquent2',function(){
    $mahasiswa = Mahasiswa::where('nama','=','AqilaAufaRahma')->get();
    return view('eloquent2',compact('mahasiswa'));
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('beranda', function () 
{
    return view('beranda');
});
Route::get('tentang', function () 
{
    return view('tentang');
});
Route::get('kontak', function () 
{
    return view('kontak');
});
//CRUD
Route::resource('dosen', 'DosenController') ;