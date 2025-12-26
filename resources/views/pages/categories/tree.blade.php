@extends('layouts.app')
@section('title', __('Categories Tree View'))
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/jstree/jstree.css" />
@endpush
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Categories Tree View') }}</h5>
            @if (check_permission('categories.index'))
                <a class="btn btn-secondary" href="{{ route('categories.index') }}">
                    <span class="d-flex align-items-center gap-2 text-white">
                        <i class="icon-base ti tabler-list icon-xs"></i>
                        {{ __('Categories List View') }}
                    </span>
                </a>
            @endif
        </div>
        <div class="card-body">
            <div id="category-tree"></div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets') }}/vendor/libs/jstree/jstree.js"></script>
    <script>
        $(document).ready(function() {
            var url = window.location.href;
            var theme =
                "dark" === $("html").attr("data-bs-theme") ? "default-dark" : "default",
                tree_div = $("#category-tree");
            tree_div.length &&
                tree_div.jstree({
                    core: {
                        themes: {
                            name: theme
                        },
                        data: {
                            url: url,
                            dataType: "json",
                            data: function(t) {
                                return {
                                    id: t.id
                                };
                            },
                        },
                    },
                    plugins: ["types", "state"],
                    types: {
                        default: {
                            icon: "icon-base ti tabler-folder"
                        },
                        folder: {
                            icon: "icon-base ti tabler-folder"
                        },
                        leaf: {
                            icon: "icon-base ti tabler-file"
                        }
                    }
                });
        });
    </script>
@endpush
