<div class="content-header mb-4">
    <h6 class="mb-0">{{ __('System Settings') }}</h6>
    <small>{{ __('Configure core application behavior.') }}</small>
</div>

<div class="row g-6">
    <div class="col-12">
        <form class="row g-6 common-form" action="{{ route('settings.update', $setting->key) }}" method="POST">
            @csrf
            @method('PUT')
            @php
                $values = json_decode($setting->value, true);
            @endphp

            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="app_name">{{ __('App Name') }}<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="app_name" id="app_name"
                    value="{{ old('app_name', $values['app_name'] ?? '') }}" required>
            </div>

            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="app_url">{{ __('App URL') }}<span class="text-danger">*</span></label>
                <input type="url" class="form-control" name="app_url" id="app_url"
                    value="{{ old('app_url', $values['app_url'] ?? '') }}" required>
            </div>

            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="app_locale">{{ __('App Locale') }}<span
                        class="text-danger">*</span></label>
                <select name="app_locale" id="app_locale" class="form-select" required>
                    <option value="en" {{ ($values['app_locale'] ?? '') === 'en' ? 'selected' : '' }}>English
                    </option>
                    <option value="bn" {{ ($values['app_locale'] ?? '') === 'bn' ? 'selected' : '' }}>Bangla
                    </option>
                    <!-- Add more locales if needed -->
                </select>
            </div>

            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="app_timezone">{{ __('Timezone') }}<span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" name="app_timezone" id="app_timezone"
                    value="{{ old('app_timezone', $values['app_timezone'] ?? '') }}" required>
            </div>

            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="date_format">{{ __('Date Format') }}<span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" name="date_format" id="date_format"
                    value="{{ old('date_format', $values['date_format'] ?? '') }}" required>
            </div>

            <div class="col-md-6 form-control-validation">
                <label class="form-label" for="maintenance_mode">{{ __('Maintenance Mode') }}</label>
                <select name="maintenance_mode" id="maintenance_mode" class="form-select">
                    <option value="0" {{ empty($values['maintenance_mode']) ? 'selected' : '' }}>
                        {{ __('Disabled') }}</option>
                    <option value="1" {{ !empty($values['maintenance_mode']) ? 'selected' : '' }}>
                        {{ __('Enabled') }}</option>
                </select>
            </div>

            <div class="col-md-12 form-control-validation">
                <label class="form-label" for="footer_text">{{ __('Footer Text') }}</label>
                <input type="text" class="form-control" name="footer_text" id="footer_text"
                    value="{{ old('footer_text', $values['footer_text'] ?? '') }}">
            </div>

            <div class="col-md-12 form-control-validation">
                <label class="form-label" for="copyright">{{ __('Copyright') }}</label>
                <input type="text" class="form-control" name="copyright" id="copyright"
                    value="{{ old('copyright', $values['copyright'] ?? '') }}">
            </div>

            <div class="col-12 d-flex justify-content-end gap-2">
                @if (check_permission('settings.index'))
                    <a href="{{ route('settings.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                @endif
                @if (check_permission('settings.edit'))
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                @endif
            </div>
        </form>
    </div>
</div>
