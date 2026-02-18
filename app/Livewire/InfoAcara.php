<?php

namespace App\Livewire;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InfoAcara extends Component
{
    public $acara;
    public $acara_id;
    public string $qrCodeSvg = '';

    public function generateQrCode()
    {
        // Generate the QR code as an SVG string
        $this->qrCodeSvg = QrCode::size(200)->generate(route('acara.kehadiran.daftar', $this->acara->slug));
    }

    public function mount($id) // Argument name MUST match the route parameter name
    {
        $this->acara_id = $id;
        // You can also use Route Model Binding here:
        // $this->post = Post::findOrFail($id);
    }

    public function render()
    {
        $this->acara = \App\Models\Acara::find($this->acara_id);
        $this->generateQrCode(); 
        
        return view('livewire.info-acara',[
            'acara' => $this->acara,
            'qrCodeSvg' => $this->qrCodeSvg,
        ]);
    }
}
