<div class="content-header mb-4">
    <h6 class="mb-0">{{ __('Business Settings') }}</h6>
    <small>{{ __('Update your company details here.') }}</small>
</div>
<div class="row g-6">
    <div class="col-12">
        <form class="row g-6 common-form" action="{{ route('settings.update', $setting->key) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @php
                $values = json_decode($setting->value, true);
            @endphp

            <div class="col-md-12 form-control-validation">
                <label class="form-label" for="company_name">{{ __('Company Name') }}<span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="{{ __('Enter Company Name') }}"
                    name="company_name" id="company_name"
                    value="{{ old('company_name', $values['company_name'] ?? '') }}" required />
            </div>

            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="email">{{ __('Email') }}<span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="{{ __('Enter email') }}" name="email"
                    id="email" value="{{ old('email', $values['email'] ?? '') }}" required />
            </div>

            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="phone">{{ __('Phone') }}<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="{{ __('Enter phone') }}" name="phone"
                    id="phone" value="{{ old('phone', $values['phone'] ?? '') }}" required />
            </div>

            <div class="col-md-12 form-control-validation">
                <label class="form-label" for="address">{{ __('Address') }}</label>
                <textarea class="form-control" placeholder="{{ __('Enter address') }}" name="address" id="address" rows="3">{{ old('address', $values['address'] ?? '') }}</textarea>
            </div>

            <div class="col-md-12 form-control-validation">
                <label class="form-label" for="company_logo">{{ __('Company Logo') }}</label>
                <input type="file" class="form-control" name="company_logo" id="company_logo" accept="image/*" />
                @if (!empty($values['company_logo']))
                    <img src="{{ asset($values['company_logo']) }}" alt="Company Logo" class="mt-2"
                        style="max-height: 80px;">
                @endif
            </div>

            <div class="col-md-12 form-control-validation">
                <label class="form-label" for="company_favicon">{{ __('Company Favicon') }}</label>
                <input type="file" class="form-control" name="company_favicon" id="company_favicon"
                    accept="image/x-icon,image/png" />
                @if (!empty($values['company_favicon']))
                    <img src="{{ asset($values['company_favicon']) }}" alt="Company Favicon" class="mt-2"
                        style="max-height: 32px;">
                @endif
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
