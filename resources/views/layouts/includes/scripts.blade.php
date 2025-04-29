<script>
    @foreach (session('toasts', collect())->toArray() as $toast)
        var options = {
            title: '{{ $toast['title'] }}',
            message: '{{ $toast['message'] }}',
            messageColor: '{{ $toast['messageColor'] }}',
            messageSize: '{{ $toast['messageSize'] }}',
            titleLineHeight: '{{ $toast['titleLineHeight'] }}',
            messageLineHeight: '{{ $toast['messageLineHeight'] }}',
            position: '{{ $toast['position'] }}',
            titleSize: '{{ $toast['titleSize'] }}',
            titleColor: '{{ $toast['titleColor'] }}',
            closeOnClick: '{{ $toast['closeOnClick'] }}',

        };

        var type = '{{ $toast['type'] }}';

        show(type, options);
    @endforeach
    function show(type, options) {
        if (type === 'info') {
            iziToast.info(options);
        } else if (type === 'success') {
            iziToast.success(options);
        } else if (type === 'warning') {
            iziToast.warning(options);
        } else if (type === 'error') {
            iziToast.error(options);
        } else {
            iziToast.show(options);
        }

    }

    {{ session()->forget('toasts') }}

    $(document).ready(function() {
        const currentPath = window.location.pathname;
        let t = document.querySelector(".common-datatable");
        $('.menu-inner .menu-link').each(function() {
            const link = $(this);
            const href = link.attr('href');

            if (!href || href === 'javascript:void(0);') return;

            const linkPath = new URL(href, window.location.origin).pathname;

            // Exact match or wildcard match
            const isExactMatch = currentPath === linkPath;
            const isWildcardMatch = currentPath.startsWith(linkPath + '/');

            if (isExactMatch || isWildcardMatch) {
                const menuItem = link.closest('.menu-item');
                menuItem.addClass('active');

                // Add 'active open' to all parent .menu-item
                link.parents('.menu-sub').each(function() {
                    $(this).closest('.menu-item').addClass('active open');
                });
            }
        });

        if (t) {
            let a = new DataTable(t, {
                processing: true,
                layout: {
                    topStart: {
                        rowClass: "row m-1 my-0 justify-content-center",
                        features: [{
                            buttons: [{
                                extend: "collection",
                                className: "btn btn-label-secondary dropdown-toggle",
                                text: '<span class="d-flex align-items-center gap-2"><i class="icon-base ti tabler-upload icon-xs"></i> <span class="d-none d-sm-inline-block">Export</span></span>',
                                buttons: [{
                                    extend: "print",
                                    text: '<span class="d-flex align-items-center"><i class="icon-base ti tabler-printer me-1"></i>Print</span>',
                                    className: "dropdown-item",

                                }, {
                                    extend: "csv",
                                    text: '<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-text me-1"></i>Csv</span>',
                                    className: "dropdown-item",

                                }, {
                                    extend: "excel",
                                    text: '<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-spreadsheet me-1"></i>Excel</span>',
                                    className: "dropdown-item",

                                }, {
                                    extend: "pdf",
                                    text: '<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-description me-1"></i>Pdf</span>',
                                    className: "dropdown-item",

                                }, {
                                    extend: "copy",
                                    text: '<i class="icon-base ti tabler-copy me-1"></i>Copy',
                                    className: "dropdown-item",

                                }]
                            }]
                        }]
                    },
                    topEnd: {
                        rowClass: "row m-1 my-0 justify-content-center",

                        features: [{
                            search: {
                                placeholder: "Search",
                                text: "_INPUT_"
                            }
                        }]
                    },
                    bottomStart: {
                        rowClass: "row mx-3 justify-content-between",
                        features: ["info"]
                    },
                    bottomEnd: "paging"
                },
                responsive: {
                    details: {
                        display: DataTable.Responsive.display.modal({
                            header: function(e) {
                                return "Details"
                            }
                        }),
                        type: "column",
                        renderer: function(e, t, a) {
                            var n, r, o, a = a.map(function(e) {
                                return "" !== e.title ? `<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                                            <td>${e.title}:</td>
                                            <td>${e.data}</td>
                                            </tr>` : ""
                            }).join("");
                            return !!a && ((n = document.createElement("div")).classList.add(
                                    "table-responsive"),
                                r = document.createElement("table"),
                                n.appendChild(r),
                                r.classList.add("table"),
                                (o = document.createElement("tbody")).innerHTML = a,
                                r.appendChild(o),
                                n)
                        }
                    }
                }
            });
        }

        setTimeout(() => {
            [{
                selector: ".dt-buttons .btn",
                classToRemove: "btn-secondary"
            }, {
                selector: ".dt-search .form-control",
                classToRemove: "form-control-sm"
            }, {
                selector: ".dt-length .form-select",
                classToRemove: "form-select-sm",
                classToAdd: "ms-0"
            }, {
                selector: ".dt-length",
                classToAdd: "mb-md-6 mb-0"
            }, {
                selector: ".dt-layout-start",
                classToRemove: "justify-content-between",
                classToAdd: "d-flex gap-md-4 justify-content-md-between justify-content-center gap-2 flex-wrap w-auto pe-0"
            }, {
                selector: ".dt-layout-end",
                classToRemove: "justify-content-between",
                classToAdd: "d-flex gap-md-4 justify-content-md-between justify-content-center gap-2 flex-wrap w-auto ps-0"
            }, {
                selector: ".dt-buttons",
                classToRemove: "mb-4",
                classToAdd: "d-flex gap-4 mb-md-0 mb-0"
            }, {
                selector: ".dt-layout-table",
                classToRemove: "row mt-2"
            }, {
                selector: ".dt-layout-full",
                classToRemove: "col-md col-12",
                classToAdd: "table-responsive"
            }].forEach(({
                selector: e,
                classToRemove: a,
                classToAdd: n
            }) => {
                document.querySelectorAll(e).forEach(t => {
                    a && a.split(" ").forEach(e => t.classList.remove(e)),
                        n && n.split(" ").forEach(e => t.classList.add(e))
                })
            })
        });

        const form = document.querySelector("#validation-form");
        if (!form) return;

        // Build validation rules based on `required` and `type`
        const fields = {};
        form.querySelectorAll("[name]").forEach((input) => {
            const name = input.name;
            const type = input.getAttribute("type");
            const fieldConfig = {
                validators: {}
            };

            if (input.required) {
                fieldConfig.validators.notEmpty = {
                    message: "This field is required",
                };
            }

            // Add type-specific validators
            if (type === "email") {
                fieldConfig.validators.emailAddress = {
                    message: "Please include an '@' in the email address. 'email' is missing an '@'.",
                };
            }

            if (type === "url") {
                fieldConfig.validators.uri = {
                    message: "Please enter a valid URL",
                };
            }

            if (type === "number") {
                fieldConfig.validators.numeric = {
                    message: "Please enter a valid number",
                };
            }

            if (type === "tel") {
                fieldConfig.validators.regexp = {
                    regexp: /^[0-9+\-\s()]*$/,
                    message: "Please enter a valid phone number",
                };
            }

            if (Object.keys(fieldConfig.validators).length > 0) {
                fields[name] = fieldConfig;
            }
        });

        // Initialize FormValidation
        const fv = FormValidation.formValidation(form, {
            fields,
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: "",
                    rowSelector: ".form-control-validation",
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                autoFocus: new FormValidation.plugins.AutoFocus(),
            },
            init: (instance) => {
                instance.on("plugins.message.placed", function(e) {
                    const parent = e.element.parentElement;
                    if (parent.classList.contains("input-group")) {
                        parent.insertAdjacentElement("afterend", e.messageElement);
                    } else if (parent.parentElement.classList.contains("custom-option")) {
                        e.element.closest(".row").insertAdjacentElement("afterend", e
                            .messageElement);
                    }
                });
            },
        });

        // Handle form submit after validation
        fv.on("core.form.valid", function() {
            const submitBtn = $(form).find('button[type=submit]');
            const formData = new FormData(form);

            submitBtn.prop("disabled", true).text("Submitting...");

            $.ajax({
                url: form.action,
                method: form.method,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    iziToast.success({
                        message: response.message || "Form submitted successfully",
                        position: "topRight"
                    });
                },
                error: function(xhr) {
                    iziToast.error({
                        message: xhr.responseJSON?.message ||
                            "Something went wrong",
                        position: "topRight"
                    });
                },
                complete: function() {
                    submitBtn.prop("disabled", false).text("Submit");
                }
            });
        });

        // Always prevent default submission
        $('#validation-form').on('submit', function(e) {
            e.preventDefault();
        });

    });
</script>
