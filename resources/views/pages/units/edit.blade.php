<div class="modal fade" id="edit-units-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Unit') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="{{ __('Close') }}"></button>
            </div>
            <form class="row g-6 common-form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col-md-12 form-control-validation mb-5">
                        <label class="form-label" for="name">{{ __('Name') }}
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="{{ __('Enter unit name, e.g. Kilogram') }}" required />
                    </div>
                    <div class="col-md-12 form-control-validation mb-5">
                        <label class="form-label" for="symbol">{{ __('Symbol') }}
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="symbol" id="symbol" class="form-control"
                            placeholder="{{ __('Enter unit symbol, e.g. kg') }}" required />
                    </div>
                    <div class="col-md-12 form-control-validation mb-5">
                        <label class="form-label" for="description">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control" placeholder="{{ __('Enter description') }}"
                            rows="3"></textarea>
                    </div>
                    <div class="col-md-12 form-control-validation">
                        <label class="form-label" for="status">{{ __('Status') }}
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select" name="status" id="status" required>
                            <option value="Active">{{ __('Active') }}</option>
                            <option value="Inactive">{{ __('Inactive') }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-form-action-button :resource="'units'" :action="'edit'" :type="'modal'" />
                </div>
            </form>
        </div>
    </div>
</div>
