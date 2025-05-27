<div class="content-header mb-4">
    <h6 class="mb-0">{{ __(ucwords(str_replace('_', ' ', $setting->key))) }}</h6>
    <small>{{ __('Update existing settings.') }}</small>
</div>
<div class="row g-6">
    <div class="col-12">
        <form id="validation-form" class="row g-6" action="{{ route('settings.update', $setting->key) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @php
                $values = json_decode($setting->value, true);
            @endphp
            <div class="col-md-12 form-control-validation">
                <label class="form-label" for="company_name">{{ __('Company Name') }}<span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="{{ __('Enter company name') }}"
                    name="company_name" id="company_name"
                    value="{{ old('company_name', $values['company_name'] ?? '') }}" required />
            </div>
            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="email">{{ __('Email') }}<span
                        class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="{{ __('Enter email') }}"
                    name="email" id="email"
                    value="{{ old('email', $values['email'] ?? '') }}" required />
            </div>
            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="phone">{{ __('Phone') }}<span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="{{ __('Enter phone') }}"
                    name="phone" id="phone"
                    value="{{ old('phone', $values['phone'] ?? '') }}" required />
            </div>
            <div class="col-12 form-control-validation d-flex justify-content-end gap-2">
                @if (check_permission('settings.index'))
                    <a href="{{ route('settings.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                @endif
                @if (check_permission('settings.edit'))
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                @endif
            </div>
        </form>
    </div>
</div>
