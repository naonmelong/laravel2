<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;

class relasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menghapus semua sample data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();

        //membuat data dosen
        $dosen = Dosen::create([
            'nama' => 'SaraAzzahra',
            'nipd' => '100203747945'
        ]);
        $this->command->info('Data Dosen Berhasil Di Buat');

         //membuat data mahasiswa
         $sara= Mahasiswa::create([
            'nama' => 'RiznaNurSandi',
            'nim' => '876492673496',
            'id_dosen' => $dosen->id
        ]);

        $rizna= Mahasiswa::create([
            'nama' => 'Zahra',
            'nim' => '876492866386',
            'id_dosen' => $dosen->id
        ]);

        $aqila= Mahasiswa::create([
            'nama' => 'AqilaAufaRahma',
            'nim' => '876497498637',
            'id_dosen' => $dosen->id
        ]);
        $this->command->info('Data Mahasiswa Berhasil Di Buat');

        //membuat data wali 
        $arkan = Wali::create([
            'nama' => 'ArkanSaidRamadhan',
            'id_mahasiswa' => $sara->id
        ]);

        $dhanis = Wali::create([
            'nama' => 'DhanisAgungFerdiansyah',
            'id_mahasiswa' => $rizna->id
        ]);

        $ale = Wali::create([
            'nama' => 'Aleandra',
            'id_mahasiswa' => $aqila->id
        ]);
        $this->command->info('Data Wali Berhasil Di Buat');

        $sb = Hobi::create([
            'hobi' => 'senag bermain sepak bola'
        ]);

        $bv = Hobi::create([
            'hobi' => 'memainkan pertandingan bola voly'
        ]);
        $berenang = Hobi::create([
            'hobi' => 'Suka Berenang Di Kolam Ikan '
        ]);

        //menampilkan hobi ke mahasiswa

        $sara->hobi()->attach($berenang->id);
        $sara->hobi()->attach($bv->id);
        $rizna->hobi()->attach($sb->id);
        $aqila->hobi()->attach($berenang->id);
        $this->command->info('Data Mahasiswa Berhasil Di Buat');






    }
}
