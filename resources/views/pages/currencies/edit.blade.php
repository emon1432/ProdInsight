<div class="modal fade" id="edit-currencies-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Currency') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="{{ __('Close') }}"></button>
            </div>
            <form class="row g-6 common-form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-control-validation mb-5">
                            <label class="form-label" for="name">{{ __('Name') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="{{ __('Enter name') }}" required />
                        </div>
                        <div class="col-md-6 form-control-validation mb-5">
                            <label class="form-label" for="code">{{ __('Code') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="{{ __('Enter code') }}" required />
                        </div>
                        <div class="col-md-6 form-control-validation mb-5">
                            <label class="form-label" for="symbol">{{ __('Symbol') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="symbol" id="symbol" class="form-control"
                                placeholder="{{ __('Enter symbol') }}" required />
                        </div>
                        <div class="col-md-12 form-control-validation mb-5">
                            <label class="form-label" for="conversion_rate">{{ __('Conversion Rate') }}
                                <span class="text-danger">* (1 USD = ?)</span>
                            </label>
                            <input type="number" step="0.0001" name="conversion_rate" id="conversion_rate"
                                class="form-control" placeholder="{{ __('Enter conversion rate') }}" required />
                        </div>
                        <div class="col-md-6 form-control-validation mb-5">
                            <label class="form-label" for="position">{{ __('Position') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" name="position" id="position" required>
                                <option value="Left">{{ __('Left') }}</option>
                                <option value="Right">{{ __('Right') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="status">{{ __('Status') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="Active">{{ __('Active') }}</option>
                                <option value="Inactive">{{ __('Inactive') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    @if (check_permission('currencies.edit'))
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
