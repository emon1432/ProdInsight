@extends('layouts.app')
@section('title', __('Edit Category'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ __('Edit Category') }}</h5>
                    @if (check_permission('categories.index'))
                        <a class="btn add-new btn-primary" href="{{ route('categories.index') }}">
                            <span class="d-flex align-items-center gap-2 text-white">
                                <i class="icon-base ti tabler-arrow-back-up icon-xs"></i>
                                {{ __('Back to Categories') }}
                            </span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <form class="row g-6 common-form" action="{{ route('categories.update', $category->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="col-12">
                            <h6>{{ __('Category Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="name">{{ __('Name') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="{{ __('Enter category name') }}" required
                                value="{{ old('name', $category->name) }}" />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="parent_id">{{ __('Parent Category') }}</label>
                            <select name="parent_id" id="parent_id" class="form-select">
                                <option value="">{{ __('Select parent category') }}</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $category->parent_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="code">{{ __('Code') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="{{ __('Enter code') }}" required value="{{ $category->code }}" />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="status">{{ __('Status') }}<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="status" required>
                                <option value="Active" {{ $category->status == 'Active' ? 'selected' : '' }}>
                                    {{ __('Active') }}</option>
                                <option value="Inactive" {{ $category->status == 'Inactive' ? 'selected' : '' }}>
                                    {{ __('Inactive') }}</option>
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
                                <img id="image_preview" src="{{ imageShow($category->image) }}" class="img-fluid rounded"
                                    alt="{{ $category->name }}" />
                            </div>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                placeholder="{{ __('Enter description') }}">{{ old('description', $category->description) }}</textarea>
                        </div>
                        <div class="col-12">
                            <h6>{{ __('SEO Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="meta_title">{{ __('Meta Title') }}</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control"
                                placeholder="{{ __('Enter meta title') }}"
                                value="{{ old('meta_title', $category->meta_title) }}" />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="meta_keywords">{{ __('Meta Keywords') }}</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control tagify"
                                placeholder="{{ __('Enter meta keywords (comma separated)') }}"
                                value="{{ old('meta_keywords', $category->meta_keywords) }}" />
                        </div>
                        <div class="col-md-12 form-control-validation">
                            <label class="form-label" for="meta_description">{{ __('Meta Description') }}</label>
                            <textarea name="meta_description" id="meta_description" class="form-control" rows="2"
                                placeholder="{{ __('Enter meta description') }}">{{ old('meta_description', $category->meta_description) }}</textarea>
                        </div>
                        <div class="col-12 form-control-validation">
                            <x-form-action-button :resource="'categories'" :action="'edit'" :type="'page'" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
