
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-100">
    <div class="flex items-end justify-center min-h-screen pt-2 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        
        <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                    <div class="form-group">
                        <label for="formNIK">NIK:</label>
                        <input type="text" class="form-control" id="formNIK" wire:model="nik" placeholder="NIK">
                        <span class="text-danger">{{ $errors->first('nik') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="formNama">Nama:</label>
                        <input type="text" class="form-control" id="formNama" wire:model="nama" placeholder="Nama Lengkap">
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    </div>
                    
                    <div class="form-group">
                        <label for="formNohp">No Handphone:</label>
                        <input type="text" class="form-control" id="formNohp" wire:model="nohp" placeholder='No Handphone Aktif'>
                        <span class="text-danger">{{ $errors->first('nohp') }}</span>
                    </div>

                    <button wire:click.prevent="store()" type="button" class="btn btn-primary">
                        Simpan
                    </button>
                    <button wire:click="closeModal()" type="button" class="btn btn-secondary">
                        Batal
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>