@extends('layouts.app')
@section('title', __('Edit Raw Material'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ __('Edit Raw Material') }} - {{ $rawMaterial->name }}</h5>
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
                    <form class="row g-6 common-form" action="{{ route('raw-materials.update', $rawMaterial->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <h6>{{ __('Raw Material Purchase Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-12 form-control-validation">
                            <label class="form-label" for="name">{{ __('Name') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="{{ __('Enter name') }}" value="{{ old('name', $rawMaterial->name) }}"
                                required />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="code">{{ __('Code') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="{{ __('Enter code') }}" value="{{ old('code', $rawMaterial->code) }}"
                                required />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="barcode">{{ __('Barcode') }}</label>
                            <input type="text" name="barcode" id="barcode" class="form-control"
                                placeholder="{{ __('Enter barcode') }}"
                                value="{{ old('barcode', $rawMaterial->barcode) }}" />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="raw_material_category_id">{{ __('Category') }}<span
                                    class="text-danger">*</span></label>
                            <select name="raw_material_category_id" id="raw_material_category_id" class="form-select"
                                required>
                                <option value="">{{ __('Select category') }}</option>
                                @foreach ($rawMaterialCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('raw_material_category_id', $rawMaterial->raw_material_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="purchase_unit_id">{{ __('Purchase Unit') }}<span
                                    class="text-danger">*</span></label>
                            <select name="purchase_unit_id" id="purchase_unit_id" class="form-select" required>
                                <option value="">{{ __('Select purchase unit') }}</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}"
                                        {{ old('purchase_unit_id', $rawMaterial->purchase_unit_id) == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="purchase_price">{{ __('Purchase Price per Unit') }}<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="purchase_price" id="purchase_price" class="form-control"
                                    placeholder="{{ __('Enter purchase price') }}" step="any" min="0"
                                    value="{{ old('purchase_price', $rawMaterial->purchase_price) }}" required />
                                <span class="input-group-text cursor-pointer">
                                    {{ active_currency()->symbol }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label
                                class="form-label fw-bold fs-6 d-block">{{ __('Is Consumption Unit Different from Purchase Unit?') }}<span
                                    class="text-danger">*</span></label>
                            @php
                                $isDifferentConsumption = old(
                                    'different_consumption',
                                    $rawMaterial->purchase_unit_id != $rawMaterial->consumption_unit_id ? 1 : 0,
                                );
                            @endphp
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="different_consumption"
                                    id="consumption_yes" value="1"
                                    {{ $isDifferentConsumption == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="consumption_yes">{{ __('Yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="different_consumption"
                                    id="consumption_no" value="0" {{ $isDifferentConsumption == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="consumption_no">{{ __('No') }}</label>
                            </div>
                        </div>
                        <div class="col-12" id="consumption-section"
                            style="{{ $isDifferentConsumption == 1 ? 'display: block;' : 'display: none;' }}">
                            <h6>{{ __('Raw Material Consumption Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div id="consumption-fields" style="{{ $isDifferentConsumption == 1 ? '' : 'display: none;' }}"
                            class="row">
                            <div class="col-md-4 form-control-validation">
                                <label class="form-label" for="consumption_unit_id">{{ __('Consumption Unit') }}<span
                                        class="text-danger">*</span></label>
                                <select name="consumption_unit_id" id="consumption_unit_id" class="form-select">
                                    <option value="">{{ __('Select consumption unit') }}</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ old('consumption_unit_id', $rawMaterial->consumption_unit_id) == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-control-validation">
                                <label class="form-label" for="conversion_rate">{{ __('Conversion Rate') }}<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="conversion_rate" id="conversion_rate" class="form-control"
                                    placeholder="{{ __('Enter conversion rate') }}" step="any" min="0"
                                    value="{{ old('conversion_rate', $rawMaterial->conversion_rate) }}" />
                                <small
                                    class="text-muted">{{ __('How many consumption units in 1 purchase unit') }}</small>
                            </div>
                            <div class="col-md-4 form-control-validation">
                                <label class="form-label" for="consumption_price">{{ __('Consumption Price') }}<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="consumption_price" id="consumption_price"
                                        class="form-control" placeholder="{{ __('Enter consumption price') }}"
                                        step="any" min="0" readonly
                                        value="{{ old('consumption_price', $rawMaterial->consumption_price) }}" />
                                    <span class="input-group-text cursor-pointer">
                                        {{ active_currency()->symbol }}
                                    </span>
                                </div>
                                <small
                                    class="text-muted">{{ __('Auto-calculated based on purchase price and conversion rate') }}</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <h6>{{ __('Other Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="stock">{{ __('Current Stock') }}<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="stock" id="stock" class="form-control"
                                    placeholder="{{ __('Enter current stock') }}" step="any" min="0"
                                    value="{{ old('stock', $rawMaterial->stock) }}" required />
                                <span class="input-group-text cursor-pointer unitName">
                                    {{ $rawMaterial->purchaseUnit->name ?? '' }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="alert_stock">{{ __('Alert Stock') }}</label>
                            <div class="input-group">
                                <input type="number" name="alert_stock" id="alert_stock" class="form-control"
                                    placeholder="{{ __('Enter alert stock') }}" step="any" min="0"
                                    value="{{ old('alert_stock', $rawMaterial->alert_stock) }}" />
                                <span class="input-group-text cursor-pointer unitName">
                                    {{ $rawMaterial->purchaseUnit->name ?? '' }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="status">{{ __('Status') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" name="status" required>
                                <option value="Active"
                                    {{ old('status', $rawMaterial->status) == 'Active' ? 'selected' : '' }}>
                                    {{ __('Active') }}
                                </option>
                                <option value="Inactive"
                                    {{ old('status', $rawMaterial->status) == 'Inactive' ? 'selected' : '' }}>
                                    {{ __('Inactive') }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-5 form-control-validation align-self-center">
                            <label class="form-label" for="image">{{ __('Image') }}</label>
                            <input type="file" name="image" id="image" class="form-control"
                                placeholder="{{ __('Upload image') }}" accept="image/*"
                                onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])" />
                            <small class="text-muted">{{ __('Leave empty to keep current image') }}</small>
                        </div>
                        <div class="col-md-1 form-control-validation">
                            <label class="form-label" for="image_preview">{{ __('Image Preview') }}</label>
                            <div class="image-preview">
                                <img id="image_preview" src="{{ imageShow($rawMaterial->image) }}"
                                    alt="{{ $rawMaterial->name }}" width="80" height="80"
                                    class="img-thumbnail" />
                            </div>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                placeholder="{{ __('Enter description') }}">{{ old('description', $rawMaterial->description) }}</textarea>
                        </div>
                        <div class="col-12 form-control-validation">
                            @if (check_permission('raw-materials.update'))
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-base ti tabler-device-floppy icon-xs me-2"></i>
                                    {{ __('Update') }}
                                </button>
                            @endif
                            @if (check_permission('raw-materials.index'))
                                <a href="{{ route('raw-materials.index') }}" class="btn btn-secondary">
                                    <i class="icon-base ti tabler-x icon-xs me-2"></i>
                                    {{ __('Cancel') }}
                                </a>
                            @endif
                            @if (check_permission('raw-materials.edit'))
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

                if (selectedUnit && selectedUnit !== '{{ __('Select purchase unit') }}' && selectedUnit !==
                    '{{ __('Select consumption unit') }}') {
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
            if (confirm('{{ __('Are you sure you want to reset the form? All changes will be lost.') }}')) {
                location.reload();
            }
        }
    </script>
@endpush
