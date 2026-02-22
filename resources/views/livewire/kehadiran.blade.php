<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header">
        <h3 class="text-center font-weight-light my-4">DAFTAR KEHADIRAN</h3>
        <div class="text-center">
            <h5>{{ $acara->tajuk }}</h5>
            <p>{{ $acara->waktu->format('d M Y') }}</p>
            <p>{{ $acara->lokasi }}</p>
    </div>
    <div class="card-body">
        <form class="needs-validation" novalidate wire:submit.prevent="submit">
            <div class="form-floating mb-3 has-validation">
                <input class="form-control" id="namapenuh" type="text" placeholder="Masukkan nama penuh anda" wire:model="nama" />
                <label for="namapenuh">Nama Penuh</label>
                @error('nama') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror 
            </div>
            <div class="form-floating mb-3 has-validation">
                <input class="form-control" id="nokp" type="text" placeholder="Masukkan nombor kad pengenalan anda" wire:model="nokp" maxlength="12"/>
                <label for="nokp">Nombor Kad Pengenalan</label>
                @error('nokp') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror 
            </div>
            <div class="form-floating mb-3 has-validation">
                <input class="form-control" id="notel" type="text" placeholder="Masukkan nombor telefon anda" wire:model="notel"/>
                <label for="notel">Nombor Telefon</label>
                @error('notel') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror 
            </div>
            <div class="form-floating mb-3 has-validation">
                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" wire:model="email"/>
                <label for="inputEmail">Email address</label>
                @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Daftar Kehadiran</button></div>
            </div>
        </form>
    </div>
</div>

