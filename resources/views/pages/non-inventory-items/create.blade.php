<div class="modal fade" id="add-non-inventory-items-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add Non Inventory Item') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="{{ __('Close') }}"></button>
            </div>
            <form class="row g-6 common-form" action="{{ route('non-inventory-items.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 form-control-validation mb-5">
                        <label class="form-label" for="name">{{ __('Name') }}
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Enter name') }}"
                            required />
                    </div>
                    <div class="col-md-12 form-control-validation mb-5">
                        <label class="form-label" for="code">{{ __('Code') }}
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="code" class="form-control" placeholder="{{ __('Enter code') }}"
                            required value="{{ next_code_generator(App\Models\NonInventoryItem::class, 'code', 'NI-') }}" />
                    </div>
                    <div class="col-md-12 form-control-validation mb-5">
                        <label class="form-label" for="description">{{ __('Description') }}</label>
                        <textarea name="description" class="form-control" placeholder="{{ __('Enter description') }}" rows="3"></textarea>
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
                    <x-form-action-button :resource="'non-inventory-items'" :action="'create'" :type="'modal'" />
                </div>
            </form>
        </div>
    </div>
</div>
