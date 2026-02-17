<?php

namespace App\Livewire;

use Livewire\Component;

class ListAcara extends Component
{
    
    public function deleteAcara($id)
    {
        $acara = \App\Models\Acara::find($id);
        if ($acara) {
            $acara->slug = $acara->slug . '-deleted-' . time();
            $acara->save(); // Simpan perubahan slug sebelum hapus  
            $acara->delete();
            session()->flash('status', 'Acara berjaya dipadam.');
        } else {
            session()->flash('error', 'Acara tidak dijumpai.');
        }
        $this->redirectRoute('acara.list');
    }

    public function render()
    {
        $acara = \App\Models\Acara::all();
        return view('livewire.list-acara', ['acara' => $acara]);
    }
}
