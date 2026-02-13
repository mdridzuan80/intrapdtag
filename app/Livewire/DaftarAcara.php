<?php

namespace App\Livewire;

use Livewire\Component;

class DaftarAcara extends Component
{
    public $tajuk;
    public $keterangan;
    public $tarikh;
    public $lokasi;
    public $penganjur;

    public function render()
    {
        return view('livewire.daftar-acara');
    }

    public function simpanAcara()
    {
        dd('Simpan Acara dipanggil');
    }
}
