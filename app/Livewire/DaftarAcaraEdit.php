<?php

namespace App\Livewire;

use App\Models\Acara;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class DaftarAcaraEdit extends Component
{   
    public Acara $acara;
    public $tajuk;
    public $keterangan;
    public $tarikh;
    public $tempoh;
    public $lokasi;
    public $penganjur;
    public $slug;
    public $acara_id;

    public function simpanAcara()
    {
        $rules = [ 
                    'tajuk' => 'required',
                    'keterangan' => 'required',
                    'tarikh' => 'required|date',
                    'tempoh' => 'required|integer|min:1',
                    'lokasi' => 'required',
                    'penganjur' => 'required',
        ];

        $customMessages = [
            'tajuk.required' => 'Sila masukkan tajuk acara.',
            'keterangan.required' => 'Sila masukkan keterangan acara.',
            'tarikh.required' => 'Sila masukkan tarikh acara.',
            'tarikh.date' => 'Tarikh tidak sah.',
            'tempoh.required' => 'Sila masukkan tempoh acara.',
            'tempoh.integer' => 'Tempoh mesti berupa angka.',
            'tempoh.min' => 'Tempoh mesti minimal 1 minit.',
            'lokasi.required' => 'Sila masukkan lokasi acara.',
            'penganjur.required' => 'Sila masukkan penganjur acara.'
        ];

        //dd($this->all());

        $validator = Validator::make($this->all(), $rules, $customMessages);

        $validated = $validator->validated();
        
        Arr::set($validated, 'waktu', $this->tarikh);

        $this->acara->update($validated);

        session()->flash('status', 'Acara berjaya dikemaskini.');
    }

    public function mount($id) // Argument name MUST match the route parameter name
    {
        $this->acara_id = $id;
        $this->acara = Acara::findOrFail($id);

        $this->tajuk = $this->acara->tajuk;
        $this->keterangan = $this->acara->keterangan;
        $this->tarikh = $this->acara->waktu->format('Y-m-d');
        $this->tempoh = $this->acara->tempoh;
        $this->lokasi = $this->acara->lokasi;
        $this->penganjur = $this->acara->penganjur;
        $this->slug = $this->acara->slug;
    }

    public function render()
    {
        return view('livewire.daftar-acara-edit');
    }
}
