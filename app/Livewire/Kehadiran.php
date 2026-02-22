<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Kehadiran as KehadiranModel;

class Kehadiran extends Component
{
    public $acara;
    public $nama;
    public $nokp;
    public $notel;
    public $email;

    public function mount($acara)
    {
        $this->acara = $acara;
    }

    public function submit()
    {
        $rules = [
            'nama' => 'required',
            'nokp' => 'required|min:12',
            'notel' => 'required',
            'email' => 'required|email',
        ];

        $customMessages = [
            'nama.required' => 'Sila masukkan nama anda.',
            'nokp.required' => 'Sila masukkan nombor kad pengenalan anda.',
            'nokp.min' => 'Nombor kad pengenalan mestilah 12 digit.',
            'notel.required' => 'Sila masukkan nombor telefon anda.',
            'email.required' => 'Sila masukkan email anda.',
            'email.email' => 'Format email tidak sah.',
        ];

        $validator = Validator::make($this->all(), $rules, $customMessages);
        $validated = $validator->validated();

        $hadir = $this->acara->kehadiran()->create([
            'uuid' => (string) \Illuminate\Support\Str::orderedUuid(),
            'nama' => $this->nama,
            'nokp' => $this->nokp,
            'notel' => $this->notel,
            'email' => $this->email,
        ]);

        return redirect()->route('acara.kehadiran.status', ['id' => $hadir->uuid]);
    }

    public function render()
    {
        return view('livewire.kehadiran');
    }
}
