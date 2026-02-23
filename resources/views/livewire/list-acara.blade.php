<div class="container-fluid px-4">
    <h1 class="mt-4">Senarai Acara</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Senarai Acara</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                     @if ($acara->isEmpty())
                        <div class="alert alert-info" role="alert">
                            Tiada acara untuk dipaparkan. Sila tambah acara baru <a href="{{ route('acara.create') }}" wire:navigate>di sini</a>.
                        </div>
                    @else
                        <div class="datatable-container">
                            <table id="datatablesSimple" class="datatable-table">
                                <thead>
                                    <tr>
                                        <th >
                                            <a href="#" >Tajuk</a>
                                        </th>
                                        <th class="d-none d-lg-table-cell">
                                            <a href="#" >Keterangan</a>
                                        </th>
                                        <th class="d-none d-md-table-cell">
                                            <a href="#" >Waktu</a>
                                        </th>
                                        <th class="d-none d-md-table-cell">
                                            <a href="#" >Lokasi</a>
                                        </th>
                                        <th class="d-none d-md-table-cell">
                                            <a href="#" >Penganjur</a>
                                        </th>
                                        <th >
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acara as $item)
                                        <tr data-index="{{ $item->id }}">
                                        <td>{{ $item->tajuk }}</td>
                                        <td class="d-none d-lg-table-cell">{{ $item->keterangan }}</td>
                                        <td class="d-none d-md-table-cell">{{ $item->waktu }}</td>
                                        <td class="d-none d-md-table-cell">{{ $item->lokasi }}</td>
                                        <td class="d-none d-md-table-cell">{{ $item->penganjur }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenu{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionMenu{{ $item->id }}">
                                                    <li><a class="dropdown-item" href="{{ route("acara.show", $item->id) }}" wire:navigate>Info</a></li>
                                                    <li><a class="dropdown-item" href="{{ route("acara.edit", $item->id) }}" wire:navigate>Edit</a></li>
                                                    <li><a class="dropdown-item" wire:click="deleteAcara({{ $item->id }})" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                        <div class="datatable-bottom">
                            <div class="datatable-info">Showing 1 to 10 of 57 entries</div>
    {{--                         <nav class="datatable-pagination"><ul class="datatable-pagination-list"><li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><a data-page="1" class="datatable-pagination-list-item-link">‹</a></li><li class="datatable-pagination-list-item datatable-active"><a data-page="1" class="datatable-pagination-list-item-link">1</a></li><li class="datatable-pagination-list-item"><a data-page="2" class="datatable-pagination-list-item-link">2</a></li><li class="datatable-pagination-list-item"><a data-page="3" class="datatable-pagination-list-item-link">3</a></li><li class="datatable-pagination-list-item"><a data-page="4" class="datatable-pagination-list-item-link">4</a></li><li class="datatable-pagination-list-item"><a data-page="5" class="datatable-pagination-list-item-link">5</a></li><li class="datatable-pagination-list-item"><a data-page="6" class="datatable-pagination-list-item-link">6</a></li><li class="datatable-pagination-list-item"><a data-page="2" class="datatable-pagination-list-item-link">›</a></li></ul></nav>
    --}}               </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Nota:</h5>
                    <p class="card-text">Memaparkan semua acara yang telah dihantar.</p>
                    <p class="card-text">Setiap acara boleh dikemaskini atau dipadamkan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
