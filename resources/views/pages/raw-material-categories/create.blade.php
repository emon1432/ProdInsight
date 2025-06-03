<div class="modal fade" id="add-raw-material-categories-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add Raw Material Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="{{ __('Close') }}"></button>
            </div>
            <form class="row g-6 common-form" action="{{ route('raw-material-categories.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 form-control-validation mb-5">
                        <label class="form-label" for="name">{{ __('Name') }}
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" class="form-control"
                            placeholder="{{ __('Enter name') }}" required />
                    </div>
                    <div class="col-md-12 form-control-validation mb-5">
                        <label class="form-label" for="description">{{ __('Description') }}</label>
                        <textarea name="description" class="form-control" placeholder="{{ __('Enter description') }}"
                            rows="3"></textarea>
                    </div>
                    <div class="col-md-12 form-control-validation">
                        <label class="form-label" for="status">{{ __('Status') }}
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select" name="status" required>
                            <option value="Active">{{ __('Active') }}</option>
                            <option value="Inactive">{{ __('Inactive') }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    @if (check_permission('raw-material-categories.create'))
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
