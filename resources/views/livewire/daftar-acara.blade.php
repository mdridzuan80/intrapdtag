<div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Acara</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Acara</li>
        </ol>
        <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="tajuk" class="form-label">Tajuk Acara</label>
                            <input type="text" class="form-control" id="tajuk" wire:model="tajuk">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan Acara</label>
                            <textarea class="form-control" id="keterangan" rows="3" wire:model="keterangan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tarikh" class="form-label">Tarikh Acara</label>
                            <input type="date" class="form-control" id="tarikh" wire:model="tarikh">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi Acara</label>
                            <input type="text" class="form-control" id="lokasi" wire:model="lokasi">
                        </div>
                        <div class="mb-3">
                            <label for="penganjur" class="form-label">Penganjur Acara</label>
                            <input type="text" class="form-control" id="penganjur" wire:model="penganjur">
                        </div>
                        <button type="button" class="btn btn-primary" wire:click="simpanAcara">Simpan Acara</button>
                    </form>
                </div>
            </div>
        </div>
    </div>