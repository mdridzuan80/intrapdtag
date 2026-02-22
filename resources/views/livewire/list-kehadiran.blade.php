<div class="card mb-4">
    <div class="card-header">
        <i class="fa-solid fa-people-group"></i>
        Senarai Kehadiran
    </div>
    <div class="card-body">
        @if ($kehadiran->isEmpty())
            <p class="text-center">Tiada kehadiran yang didaftarkan untuk acara ini.</p>
        @else
            <div class="table-responsive">
                <button class="btn btn-danger mb-3" wire:click="changeStatus" {{ empty($selected) ? 'disabled' : '' }}>
                    <span>Tukar Status Hadir</span>
                </button>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                <div class="datatable-container">
                    <table id="datatablesSimple" class="datatable-table">
                        <thead>
                            <tr>
                                <th data-sortable="true" >
                                    <input type="checkbox" id="selectAll" wire:model.live="selectAll">
                                </th>
                                <th data-sortable="true" >
                                    <a href="#" >Status</a>
                                </th>
                                <th data-sortable="true" >
                                    <a href="#" >Nama</a>
                                </th>
                                <th data-sortable="true" >
                                    <a href="#" >No KP</a>
                                </th>
                                <th data-sortable="true" >
                                    <a href="#" >Telefon</a>
                                </th>
                                <th data-sortable="true" >
                                    <a href="#" >Emel</a>
                                </th>
                                <th data-sortable="true" >
                                    <a href="#" >Tarikh Daftar</a>
                                </th>
                                <th >
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kehadiran as $item)
                                <tr data-index="{{ $item->id }}">
                                    <td><input type="checkbox" class="select-row" data-id="{{ $item->id }}" wire:model.live="selected" value="{{ $item->id }}"></td>
                                <td>
                                    @if ($item->cert_id)
                                    <img src="{{ asset('assets/img/hadir.png') }}" alt="Hadir" class="img-fluid" width="16" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hadir">
                                    @else
                                    <img src="{{ asset('assets/img/x-hadir.png') }}" alt="Tidak Hadir" class="img-fluid" width="16" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tidak Hadir">
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nokp }}</td>
                                <td>{{ $item->notel }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/Y g:i A') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenu{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionMenu{{ $item->id }}">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" wire:click="deleteKehadiran({{ $item->id }})" href="#">Delete</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            @if ($item->cert_id)
                                            <li><a class="dropdown-item" href="#" wire:click="showCertificate({{ $item->id }})">Muat Turun Sijil</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>