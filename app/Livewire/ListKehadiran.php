<?php

namespace App\Livewire;

use Livewire\Component;
use setasign\Fpdi\Fpdi;

class ListKehadiran extends Component
{
    public $kehadiran=[];
    public $selectAll = false;
    public $selected = [];

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = $this->kehadiran->pluck('id')->map(fn($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function changeStatus()
    {
        foreach ($this->selected as $id) {
            $kehadiran = $this->kehadiran->where('id', $id)->first();
            if ($kehadiran) {
                $kehadiran->cert_id = $kehadiran->cert_id ? null : \Illuminate\Support\Str::uuid();
                $kehadiran->save();
            }
        }
        $this->selected = [];
        session()->flash('status', 'Status kehadiran berjaya ditukar.');
        $this->mount($this->kehadiran->first()->acara); // Refresh data
    }

    public function deleteKehadiran($id)
    {
        $kehadiran = $this->kehadiran->where('id', $id)->first();
        if ($kehadiran) {
            $kehadiran->delete();
            session()->flash('status', 'Kehadiran berjaya dipadam.');
        } else {
            session()->flash('error', 'Kehadiran tidak dijumpai.');
        }
        $this->mount($this->kehadiran->first()->acara); // Refresh data
    }
    
    public function showCertificate($id)
    {
        $kehadiran = $this->kehadiran->whereIn('id', $id)->first();
        if ($kehadiran && $kehadiran->cert_id) {
            $pdf = new FPDI('P', 'mm', 'A4');
            
            // Reference the PDF you want to use (use relative path)
            $pdf->setSourceFile(public_path('assets/sijil.pdf'));

            // Import the first page from the PDF and add to dynamic PDF
            $tpl = $pdf->importPage(1);
            $pdf->AddPage();

            // Use the imported page as the template
            $pdf->useTemplate($tpl);

            // First box - the user's Name
            $pdf->SetFont('Arial', 'B', 10); // set font size
            $pdf->SetXY(100, 10); // set the position of the box
            $pdf->MultiCell(0, 5, strtoupper($kehadiran->cert_id), 0, 'R'); // add the text, align to Center of cell

            // First box - the user's Name
            $pdf->SetFont('Arial', 'B', 15); // set font size
            $pdf->SetXY(10, 104); // set the position of the box
            $pdf->MultiCell(0, 5, strtoupper($kehadiran->nama), 0, 'C'); // add the text, align to Center of cell

            // Tajuk Acara
            $pdf->SetFont('Arial', 'B', 15); // set font size
            $pdf->SetXY(10, 125); // set the position of the box
            $pdf->MultiCell(0, 5, strtoupper($kehadiran->acara->tajuk), 0, 'C'); // add the text, align to Center of cell

            // Tarikh Acara
            $pdf->SetFont('Arial', 'B', 15); // set font size
            $pdf->SetXY(10, 167); // set the position of the box
            $pdf->MultiCell(0, 5, strtoupper($kehadiran->acara->waktu->format('j F Y')), 0, 'C'); // add the text, align to Center of cell

            // Lokasi Acara
            $pdf->SetFont('Arial', 'B', 15); // set font size
            $pdf->SetXY(10, 190); // set the position of the box
            $pdf->MultiCell(0, 5, strtoupper($kehadiran->acara->lokasi), 0, 'C'); // add the text, align to Center of cell

            // Penganjur Acara
            $pdf->SetFont('Arial', 'B', 15); // set font size
            $pdf->SetXY(10, 210); // set the position of the box
            $pdf->MultiCell(0, 5, strtoupper($kehadiran->acara->penganjur), 0, 'C'); // add the text, align to Center of cell

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->Output();
            }, 'sijil-' . $kehadiran->cert_id . '.pdf');
        }

        session()->flash('error', 'Sijil tidak dijumpai untuk kehadiran yang dipilih.');
    }
    public function mount($acara)
    {
        $this->kehadiran = $acara->kehadiran()->get();
    }

    public function render()
    {
        return view('livewire.list-kehadiran');
    }
}
