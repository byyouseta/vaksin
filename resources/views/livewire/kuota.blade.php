<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Kuota Vaksin
    </h2>
</x-slot>
<div class="container">
    <div class="raw">
        <div class="raw-12">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            @endif

            <button wire:click="create()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#">Tambah Kuota</button>
            <br>
            <br>
            
            @if($isModal)
                @include('livewire.buat')
            @endif 

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>QTY</th>
                        <th>Sisa</th>
                        <th>Aktif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kuotas as $row)
                        <tr>
                            <td>{{ $row->tanggal }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>{{ $row->sisa }}</td>
                            <td>
                                @if ($row->aktif == 1)
                                    Aktif
                                @else
                                    Tidak Aktif
                                @endif
                            </td>                       
                            <td>
                                <button wire:click="edit({{ $row->id }})" class="btn btn-warning btn-sm">Edit</button>
                                <button wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class='text-center' colspan="4">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
