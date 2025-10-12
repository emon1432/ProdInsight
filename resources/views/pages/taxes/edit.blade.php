<div class="modal fade" id="edit-taxes-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Tax') }}</h5>
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
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="{{ __('Enter tax name, e.g. VAT') }}" required />
                        </div>
                        <div class="col-md-12 form-control-validation mb-5">
                            <label class="form-label" for="rate">{{ __('Rate') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="rate" class="form-control" id="rate" step="0.01"
                                min="0" placeholder="{{ __('Enter rate value') }}" required />
                        </div>
                        <div class="col-md-6 form-control-validation mb-5">
                            <label class="form-label" for="calculation_method">{{ __('Calculation Method') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="calculation_method" name="calculation_method" required>
                                <option value="Percentage">{{ __('Percentage') }}</option>
                                <option value="Fixed">{{ __('Fixed') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation mb-5">
                            <label class="form-label" for="type">{{ __('Type') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="Exclusive">{{ __('Exclusive') }}</option>
                                <option value="Inclusive">{{ __('Inclusive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation mb-5">
                            <label class="form-label" for="scope">{{ __('Scope') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="scope" name="scope" required>
                                <option value="Product">{{ __('Product') }}</option>
                                <option value="Sales">{{ __('Sales') }}</option>
                                <option value="Purchase">{{ __('Purchase') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation mb-5">
                            <label class="form-label" for="status">{{ __('Status') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Active">{{ __('Active') }}</option>
                                <option value="Inactive">{{ __('Inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-control-validation mb-5">
                            <label class="form-label" for="description">{{ __('Description') }}</label>
                            <textarea name="description" class="form-control" id="description" placeholder="{{ __('Enter description') }}"
                                rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-form-action-button :resource="'taxes'" :action="'edit'" :type="'modal'" />
                </div>
            </form>
        </div>
    </div>
</div>
