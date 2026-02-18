<?php

namespace App\Livewire;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class InfoAcara extends Component
{
    public $acara;
    public $acara_id;
    public string $qrCodeSvg = '';
    public string $url = '';

    public function downloadPdf()
    {
        $logPath = public_path('assets/img/logo-pdtag.svg');

        $svgContent = File::get($logPath);
        $base64Svg = base64_encode($svgContent);

        $pdf = Pdf::loadView('pdf.cetakqr', [
            'acara' => $this->acara,
            'qrcodeimg' => base64_encode(QrCode::format('png')->size(300)->generate($this->url)),
            'url' => $this->url,
            'logo' => $base64Svg,
        ]);

        // Stream or download the generated PDF
        // return $pdf->stream('invoice.pdf'); // To view in browser
        return response()->streamDownload(function () use ($pdf) {
        echo $pdf->stream();
        }, 'acara_qr_' . $this->acara_id . '.pdf');
        //return $pdf->stream('acara_qr_' . $this->acara_id . '.pdf')->header('Content-Type','application/pdf');
        //return $pdf->download('acara_qr_' . $this->acara_id . '.pdf'); // To force download
    }

    public function generateQrCode()
    {
        // Generate the QR code as an SVG string
        $this->qrCodeSvg = QrCode::size(200)->generate($this->url);
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
        $this->url = route('acara.kehadiran.daftar', $this->acara->slug);
        $this->generateQrCode(); 

        return view('livewire.info-acara',[
            'acara' => $this->acara,
            'qrCodeSvg' => $this->qrCodeSvg,
        ]);
    }
}
