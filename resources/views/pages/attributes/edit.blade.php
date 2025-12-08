@extends('layouts.app')
@section('title', __('Edit Attribute'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ __('Edit Attribute') }}</h5>
                    @if (check_permission('attributes.index'))
                        <a class="btn add-new btn-primary" href="{{ route('attributes.index') }}">
                            <span class="d-flex align-items-center gap-2 text-white">
                                <i class="icon-base ti tabler-arrow-back-up icon-xs"></i>
                                {{ __('Back to Attributes') }}
                            </span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <form class="row g-6 common-form" action="{{ route('attributes.update', $attribute->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <h6>{{ __('Attribute Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-12 form-control-validation">
                            <label class="form-label" for="name">{{ __('Name') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $attribute->name }}" placeholder="{{ __('Enter attribute name') }}" required />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="code">{{ __('Code') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="{{ __('Enter code') }}" required value="{{ $attribute->code }}" />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="status">{{ __('Status') }}<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="status" required>
                                <option value="Active" {{ $attribute->status == 'Active' ? 'selected' : '' }}>
                                    {{ __('Active') }}</option>
                                <option value="Inactive" {{ $attribute->status == 'Inactive' ? 'selected' : '' }}>
                                    {{ __('Inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <h6>{{ __('Attribute Values') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-12 form-control-validation">
                            <label class="form-label" for="values">{{ __('New Values') }}</label>
                            <input type="text" name="values" id="values" class="form-control tagify"
                                placeholder="{{ __('Enter Values (comma separated)') }}" />
                        </div>
                        <div class="col-md-12 form-control-validation">
                            <label class="form-label" for="existing_values">{{ __('Existing Values') }} ({{ __('You can edit or remove existing values') }})</label>
                            <div id="deleted-values"></div>
                            <div class="row">
                                @foreach ($attribute->values as $value)
                                    <div class="col-md-4 mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Attribute Value"
                                                value="{{ $value->name }}" name="existing_values[{{ $value->id }}]" />
                                            <button class="btn btn-outline-danger waves-effect" type="button"
                                                onclick="removeExistingValue(this, '{{ $value->id }}')">
                                                <i class="icon-base ti tabler-trash icon-xs"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 form-control-validation">
                            <x-form-action-button :resource="'attributes'" :action="'create'" :type="'page'" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function removeExistingValue(btn, id) {
            document.querySelector('#deleted-values').innerHTML +=
                `<input type="hidden" name="deleted_values[]" value="${id}">`;

            btn.closest('.col-md-4').remove();
        }
    </script>
@endpush
