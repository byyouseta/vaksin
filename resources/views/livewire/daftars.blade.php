<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Pendaftar Vaksin
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

            {{-- <button wire:click="create()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#">Tambah Pendaftar</button>
            <br>
            <br>
            --}}
            @if($isModal)
                @include('livewire.create')
            @endif 

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No Handphone</th>
                        <th>Dosis 1</th>
                        <th>Dosis 2</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($daftars as $row)
                        <tr>
                            <td>{{ $row->nik }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->nohp }}</td>
                            <td>{{ $row->dosis1 }}</td>
                            <td>{{ $row->dosis2 }}</td>
                            
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

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="title">Daftar/Registrasi Vaksin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" placeholder="NIK" wire:model="nik">
                </div>
                @error('nik') <span class="text-red-500">{{ $message }}</span>@enderror
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" wire:model="nama">
                </div>
                @error('nama') <span class="text-red-500">{{ $message }}</span>@enderror
                <div class="form-group">
                    <label for="nohp">No Handhone Aktif (SMS/Whatsapp)</label>
                    <input type="text" class="form-control" id="nohp" placeholder="No Handphone" wire:model="nohp">
                </div>
                @error('nohp') <span class="text-red-500">{{ $message }}</span>@enderror                
            </form>
        </div>
        <div class="modal-footer">
            <button wire:click="closeModal()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click.prevent="store()" type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>

