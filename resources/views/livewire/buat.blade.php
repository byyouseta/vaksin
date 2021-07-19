
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
                        <label for="formTanggal">Tanggal:</label>
                        <div class="input-group date">
                            <input type="text" id="datepicker" class="form-control pull-right" wire:model="tanggal" placeholder="Tanggal">
                        </div>
                        <span class="text-danger">{{ $errors->first('nik') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="formQty">QTY:</label>
                        <input type="text" class="form-control" id="formQty" wire:model="qty" placeholder="QTY">
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    </div>                    
                    <div class="mb-3">
                        <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                        <select class="custom-select" wire:model="aktif" >
                            <option value="">Pilih</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        
                        <span class="text-danger">{{ $errors->first('aktif') }}</span>
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