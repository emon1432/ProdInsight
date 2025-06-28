@extends('layouts.app')
@section('title', __('Create New Raw Material'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ __('Create New Raw Material') }}</h5>
                    @if (check_permission('raw-materials.index'))
                        <a class="btn add-new btn-primary" href="{{ route('raw-materials.index') }}">
                            <span class="d-flex align-items-center gap-2 text-white">
                                <i class="icon-base ti tabler-arrow-back-up icon-xs"></i>
                                {{ __('Back to Raw Materials') }}
                            </span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <form class="row g-6 common-form" action="{{ route('raw-materials.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <h6>{{ __('Raw Material Purchase Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-12 form-control-validation">
                            <label class="form-label" for="name">{{ __('Name') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="{{ __('Enter name') }}" required />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="code">{{ __('Code') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="{{ __('Enter code') }}" required value="{{ $nextRawMaterialCode }}" />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="barcode">{{ __('Barcode') }}</label>
                            <input type="text" name="barcode" id="barcode" class="form-control"
                                placeholder="{{ __('Enter barcode') }}" />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="raw_material_category_id">{{ __('Category') }}<span
                                    class="text-danger">*</span></label>
                            <select name="raw_material_category_id" id="raw_material_category_id" class="form-select"
                                required>
                                <option value="">{{ __('Select category') }}</option>
                                @foreach ($rawMaterialCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="purchase_unit_id">{{ __('Purchase Unit') }}<span
                                    class="text-danger">*</span></label>
                            <select name="purchase_unit_id" id="purchase_unit_id" class="form-select" required>
                                <option value="">{{ __('Select purchase unit') }}</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="purchase_price">{{ __('Purchase Price per Unit') }}<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="purchase_price" id="purchase_price" class="form-control"
                                    placeholder="{{ __('Enter purchase price') }}" step="any" min="0"
                                    required />
                                <span class="input-group-text cursor-pointer">
                                    {{ active_currency()->symbol }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label
                                class="form-label fw-bold fs-6 d-block">{{ __('Is Consumption Unit Different from Purchase Unit?') }}<span
                                    class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="different_consumption"
                                    id="consumption_yes" value="1">
                                <label class="form-check-label" for="consumption_yes">{{ __('Yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="different_consumption"
                                    id="consumption_no" value="0" checked>
                                <label class="form-check-label" for="consumption_no">{{ __('No') }}</label>
                            </div>
                        </div>
                        <div class="col-12" id="consumption-section" style="display: none;">
                            <h6>{{ __('Raw Material Consumption Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div id="consumption-fields" style="display: none;" class="row">
                            <div class="col-md-4 form-control-validation">
                                <label class="form-label" for="consumption_unit_id">{{ __('Consumption Unit') }}<span
                                        class="text-danger">*</span></label>
                                <select name="consumption_unit_id" id="consumption_unit_id" class="form-select">
                                    <option value="">{{ __('Select consumption unit') }}</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-control-validation">
                                <label class="form-label" for="conversion_rate">{{ __('Conversion Rate') }}<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="conversion_rate" id="conversion_rate" class="form-control"
                                    placeholder="{{ __('Enter conversion rate') }}" step="any" min="0" />
                                <small class="text-muted">{{ __('How many consumption units in 1 purchase unit') }}</small>
                            </div>
                            <div class="col-md-4 form-control-validation">
                                <label class="form-label" for="consumption_price">{{ __('Consumption Price') }}<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="consumption_price" id="consumption_price"
                                        class="form-control" placeholder="{{ __('Enter consumption price') }}"
                                        step="any" min="0" readonly />
                                    <span class="input-group-text cursor-pointer">
                                        {{ active_currency()->symbol }}
                                    </span>
                                </div>
                                <small class="text-muted">{{ __('Auto-calculated based on purchase price and conversion rate') }}</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <h6>{{ __('Others Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="stock">{{ __('Current Stock') }}<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="stock" id="stock" class="form-control"
                                    placeholder="{{ __('Enter current stock') }}" step="any" min="0"
                                    required />
                                <span class="input-group-text cursor-pointer unitName">
                                    {{ __('Unit') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="alert_stock">{{ __('Alert Stock') }}</label>
                            <div class="input-group">
                                <input type="number" name="alert_stock" id="alert_stock" class="form-control"
                                    placeholder="{{ __('Enter alert stock') }}" step="any" min="0" />
                                <span class="input-group-text cursor-pointer unitName">
                                    {{ __('Unit') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="status">{{ __('Status') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" name="status" required>
                                <option value="Active">{{ __('Active') }}</option>
                                <option value="Inactive">{{ __('Inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-5 form-control-validation align-self-center">
                            <label class="form-label" for="image">{{ __('Image') }}</label>
                            <input type="file" name="image" id="image" class="form-control"
                                placeholder="{{ __('Upload image') }}" accept="image/*"
                                onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])" />
                        </div>
                        <div class="col-md-1 form-control-validation">
                            <label class="form-label" for="image_preview">{{ __('Image Preview') }}</label>
                            <div class="image-preview">
                                <img id="image_preview" src="{{ asset('uploads/default.jpg') }}"
                                    class="img-fluid rounded" alt="{{ __('Image Preview') }}" />
                            </div>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                placeholder="{{ __('Enter description') }}"></textarea>
                        </div>
                        <div class="col-12 form-control-validation">
                            @if (check_permission('raw-materials.create'))
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-base ti tabler-device-floppy icon-xs me-2"></i>
                                    {{ __('Save') }}
                                </button>
                            @endif
                            @if (check_permission('raw-materials.index'))
                                <a href="{{ route('raw-materials.index') }}" class="btn btn-secondary">
                                    <i class="icon-base ti tabler-x icon-xs me-2"></i>
                                    {{ __('Cancel') }}
                                </a>
                            @endif
                            @if (check_permission('raw-materials.create'))
                                <button type="button" class="btn btn-danger" onclick="resetForm()">
                                    <i class="icon-base ti tabler-refresh icon-xs me-2"></i>
                                    {{ __('Reset') }}
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Cache DOM elements for better performance
            const $consumptionRadios = $('input[name="different_consumption"]');
            const $consumptionSection = $('#consumption-section');
            const $consumptionFields = $('#consumption-fields');
            const $consumptionUnitSelect = $('#consumption_unit_id');
            const $conversionRateInput = $('#conversion_rate');
            const $consumptionPriceInput = $('#consumption_price');
            const $purchasePriceInput = $('#purchase_price');
            const $purchaseUnitSelect = $('#purchase_unit_id');
            const $unitNameSpans = $('.unitName');

            // Initialize form state
            toggleConsumptionFields();
            updateUnitNames();

            function toggleConsumptionFields() {
                const isDifferent = $('input[name="different_consumption"]:checked').val() === '1';

                if (isDifferent) {
                    $consumptionSection.slideDown(300);
                    $consumptionFields.slideDown(300);
                    $consumptionUnitSelect.prop('required', true);
                    $conversionRateInput.prop('required', true);
                    $consumptionPriceInput.prop('required', true);
                } else {
                    $consumptionSection.slideUp(300);
                    $consumptionFields.slideUp(300);
                    $consumptionUnitSelect.prop('required', false);
                    $conversionRateInput.prop('required', false);
                    $consumptionPriceInput.prop('required', false);

                    // Auto-fill consumption fields with purchase values
                    $consumptionUnitSelect.val($purchaseUnitSelect.val());
                    $conversionRateInput.val('1');
                    $consumptionPriceInput.val($purchasePriceInput.val());
                }
                updateUnitNames();
            }

            function calculateConsumptionPrice() {
                const conversionRate = parseFloat($conversionRateInput.val()) || 0;
                const purchasePrice = parseFloat($purchasePriceInput.val()) || 0;

                if (conversionRate > 0 && purchasePrice > 0) {
                    const consumptionPrice = (purchasePrice / conversionRate).toFixed(2);
                    $consumptionPriceInput.val(consumptionPrice);
                } else {
                    $consumptionPriceInput.val('');
                }
            }

            function updateUnitNames() {
                const isDifferent = $('input[name="different_consumption"]:checked').val() === '1';
                let selectedUnit;

                if (isDifferent) {
                    selectedUnit = $consumptionUnitSelect.find('option:selected').text();
                } else {
                    selectedUnit = $purchaseUnitSelect.find('option:selected').text();
                }

                if (selectedUnit && selectedUnit !== '{{ __("Select purchase unit") }}' && selectedUnit !== '{{ __("Select consumption unit") }}') {
                    $unitNameSpans.text(selectedUnit);
                }
            }

            // Event listeners
            $consumptionRadios.on('change', toggleConsumptionFields);

            $conversionRateInput.on('input', function() {
                calculateConsumptionPrice();
            });

            $purchasePriceInput.on('input', function() {
                if ($('input[name="different_consumption"]:checked').val() === '1') {
                    calculateConsumptionPrice();
                } else {
                    $consumptionPriceInput.val($(this).val());
                }
            });

            $purchaseUnitSelect.on('change', function() {
                if ($('input[name="different_consumption"]:checked').val() === '0') {
                    $consumptionUnitSelect.val($(this).val());
                }
                updateUnitNames();
            });

            $consumptionUnitSelect.on('change', updateUnitNames);

            // Form validation enhancement
            $('form').on('submit', function(e) {
                const isDifferent = $('input[name="different_consumption"]:checked').val() === '1';

                if (isDifferent) {
                    if (!$consumptionUnitSelect.val()) {
                        e.preventDefault();
                        iziToast.error({
                            message: "{{ __('Please select consumption unit') }}",
                            position: "topRight"
                        });
                        return false;
                    }

                    if (!$conversionRateInput.val() || parseFloat($conversionRateInput.val()) <= 0) {
                        e.preventDefault();
                        iziToast.error({
                            message: "{{ __('Please enter valid conversion rate') }}",
                            position: "topRight"
                        });
                        return false;
                    }
                }
            });
        });

        function resetForm() {
            if (confirm('{{ __("Are you sure you want to reset the form? All changes will be lost.") }}')) {
                document.querySelector('form').reset();
                // Reset image preview
                document.getElementById('image_preview').src = '{{ asset("uploads/default.jpg") }}';
                // Reset unit names
                $('.unitName').text('{{ __("Unit") }}');
                // Reset consumption fields visibility
                $('#consumption-section').hide();
                $('#consumption-fields').hide();
                // Remove required attributes
                $('#consumption_unit_id, #conversion_rate, #consumption_price').prop('required', false);
                // Clear consumption fields
                $('#consumption_unit_id, #conversion_rate, #consumption_price').val('');
            }
        }
    </script>
@endpush
