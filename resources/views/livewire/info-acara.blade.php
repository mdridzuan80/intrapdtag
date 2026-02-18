<div class="container-fluid px-4">
    <h1 class="mt-4">Maklumat Acara</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Maklumat Acara</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $acara->tajuk }}</h5>
                    <p class="card-text">{{ $acara->keterangan }}</p>
                    <p class="card-text"><strong>Waktu:</strong> {{ $acara->waktu }}</p>
                    <p class="card-text"><strong>Lokasi:</strong> {{ $acara->lokasi }}</p>
                    <p class="card-text"><strong>Penganjur:</strong> {{ $acara->penganjur }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Kod QR Daftar Kehadiran:</h5>
                    @if ($qrCodeSvg)
                        {{-- Use {!! !!} to render the raw SVG output --}}
                        {!! $qrCodeSvg !!}
                        <p class="card-text">URL: <a href="{{ route('acara.kehadiran.daftar', $this->acara->slug) }}" target="_blank">{{ route('acara.kehadiran.daftar', $this->acara->slug) }}</a></p>
                        <div>
                            <button type="button" class="btn btn-primary" wire:click="downloadPdf" wire:loading.attr="disabled">
                                <span wire:loading.remove>Muat turun PDF</span>
                                <span wire:loading>Memuat turun pdf...</span>
                            </button>
                        </div>

                    @endif
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Nota:</h5>
                    <p class="card-text">Memaparkan maklumat lengkap bagi acara yang dipilih.</p>
                    <p class="card-text">Di sini, anda boleh mencetak maklumat acara ini.</p>
                </div>
            </div>
        </div>
    </div>
</div>
