<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">{{ $state == 'edit' ? 'Edit' : 'Add' }} Todos</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <label>Title</label>
                    <div class="form-group">
                        <input type="text" wire:model="title" @class(['form-control', 'is-invalid' => $errors->has('title')])>
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                        <textarea wire:model="description" rows="3" @class(['form-control', 'is-invalid' => $errors->has('description')])></textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-secondary">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" wire:click="save">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ $state == 'edit' ? 'Save' : 'Add' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
