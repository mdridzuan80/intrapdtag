<div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Acara</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Acara</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <form class="needs-validation" novalidate wire:submit.prevent="simpanAcara">
                        <div class="mb-3 has-validation">
                            <label for="tajuk" class="form-label">Tajuk Acara *</label>
                            <input type="text" class="form-control" id="tajuk" wire:model.live="tajuk" required>
                            @error('tajuk') <div class="invalid-feedback d-block">Sila masukkan tajuk acara</div> @enderror 
                        </div>
                        <div class="mb-3 has-validation">
                            <label for="slug" class="form-label">Slug *</label>
                            <input type="text" class="form-control" id="slug" wire:model="slug" required>
                            @error('slug') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan Acara *</label>
                            <textarea class="form-control" id="keterangan" rows="3" wire:model="keterangan"></textarea>
                            @error('keterangan') <div class="invalid-feedback d-block">Sila masukkan keterangan acara</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarikh" class="form-label">Tarikh Acara *</label>
                            <input type="date" class="form-control" id="tarikh" wire:model="tarikh" required>
                            @error('tarikh') <div class="invalid-feedback d-block">Sila masukkan tarikh acara</div> @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi Acara</label>
                            <input type="text" class="form-control" id="lokasi" wire:model="lokasi" required>
                            @error('lokasi') <div class="invalid-feedback d-block">Sila masukkan lokasi acara</div> @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="penganjur" class="form-label">Penganjur Acara *</label>
                            <input type="text" class="form-control" id="penganjur" wire:model="penganjur" required>
                            @error('penganjur') <div class="invalid-feedback d-block">Sila masukkan penganjur acara</div> @enderror 
                        </div>
                        <button type="submit" class="btn btn-primary" >Simpan Acara</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Nota:</h5>
                    <p class="card-text">Sila lengkapi semua maklumat yang bertanda (*) sebelum menyimpan acara.</p>
                </div>
            </div>
        </div>
    </div>
</div>