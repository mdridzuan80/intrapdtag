<?php

namespace App\Livewire;

use App\Models\Acara;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class DaftarAcara extends Component
{
    public $tajuk;
    public $keterangan;
    public $tarikh;
    public $lokasi;
    public $penganjur;
    public $slug;

    public function updatedTajuk($value)
    {
        $this->slug = Str::slug($value);
    }

    public function simpanAcara()
    {
        $rules = [ 
                    'tajuk' => 'required',
                    'keterangan' => 'required',
                    'tarikh' => 'required|date',
                    'lokasi' => 'required',
                    'penganjur' => 'required',
                    'slug' => 'required|unique:acara,slug',
        ];

        $customMessages = [
            'tajuk.required' => 'Sila masukkan tajuk acara.',
            'keterangan.required' => 'Sila masukkan keterangan acara.',
            'tarikh.required' => 'Sila masukkan tarikh acara.',
            'tarikh.date' => 'Tarikh tidak sah.',
            'lokasi.required' => 'Sila masukkan lokasi acara.',
            'penganjur.required' => 'Sila masukkan penganjur acara.',
            'slug.required' => 'Sila masukkan slug acara.',
            'slug.unique' => 'Slug ini telah digunakan.',
        ];

        //dd($this->all());

        $validator = Validator::make($this->all(), $rules, $customMessages);

        $validated = $validator->validated();
        
        Arr::set($validated, 'waktu', $this->tarikh);

        Acara::create($validated);

        session()->flash('status', 'Acara berjaya didaftarkan.');
        $this->redirectRoute('acara.list');
    }

    public function render()
    {
        return view('livewire.daftar-acara');
    }
}
