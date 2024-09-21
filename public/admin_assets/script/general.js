var baseUrl = $('#base').val();

function delete_confirmation() {
    var c = confirm("Do you really want to delete this record?");
    if (c) {
        return true;
    } else {
        return false;
    }
}

(function ($, window, document, undefined) {
    $(document).ready(function () {
        $(".select2").select2();

        var tagify = new Tagify(document.querySelector(".myTagInput"), {
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        });

        $("input[type='file']").change(function () {
            readURL(this);
        });

        function readURL(input) {
            var elem = $(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    elem.next('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(elem.get(0).files[0]);
            }
        }

        $(".validNumber").on("keypress keyup blur", function (event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        // custom datatable
        $('#tTable').DataTable({
            "order": [],
        });

        // custom text editor
        $('.custom_text_editors').each(function () {
            CKEDITOR.replace($(this).prop('id'), {
                removeButtons: 'PasteFromWord'
            });
        });

        /*$(document).delegate("form", "submit", function (event) {
            var c = confirm("Do you really want to submit the form ?");
            if (c) {
                $("#loader").show();
                return true;
            } else {
                return false;
            }
        });*/

        $(document).delegate(".chkRowclick", "click", function (event) {
            var key = $(this).data('key');
            if (this.checked) {
                $('.chkRow' + key + '').each(function () {
                    this.checked = true;
                });
            } else {
                $('.chkRow' + key + '').each(function () {
                    this.checked = false;
                });
            }
        });

        var last_id = window.location.href.split("/").pop();
        var queryString = window.location.search;

        var mail_val = $('.mail_type_smtpClick').find(":selected").val();
        if (mail_val == 2) {
            $('.mail_type_smtpShow').removeClass('d-none');
        }
        $(document).delegate(".mail_type_smtpClick", "change", function (event) {
            var el = $(this);
            var value = el.find(":selected").val();
            if (value == 2) {
                $('.mail_type_smtpShow').removeClass('d-none');
            } else {
                $('.mail_type_smtpShow').addClass('d-none');
            }
        });





        initDataTable('.table-register', baseUrl + 'backend/register/getAjaxList', [], []);
        $(document).delegate(".user_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            // alert(record_id);

            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/register/btn_user_stat",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {
                }
            });
        });
        $(document).delegate(".change_user_status", "click", function (event) {
            var record_id = $(this).attr('data-id');
            var status = $(this).attr('data-status');

            if (record_id && status) {
                $.ajax({
                    type: "POST",
                    url: baseUrl + "backend/register/btn_user_status",
                    data: {
                        status: status,
                        record_id: record_id
                    },
                    success: function (result) {
                        location.reload();
                    }
                });
            }
        });
        $(document).delegate(".item_order", "click", function (event) {
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/register/order_show",
                data: {
                    id: id
                },
                success: function (result) {
                    console.log(result);
                    $('#edit_users_ajax').html(result);
                }
            });
        });
        $(document).delegate(".edit_user", "click", function (event) {
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/register/edit",
                data: {
                    id: id
                },
                success: function (result) {
                    console.log(result);
                    $('#edit_users_ajax').html(result);
                }
            });
        });
        $(document).delegate(".add_user_ajax", "click", function (event) {

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/register/register_detail",
                data: {
                },
                success: function (result) {
                    console.log(result);
                    $('#add_users_ajax').html(result);
                }
            });
        });
        $(document).delegate(".delete_user", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');

                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/register/delete',
                        data: {
                            record_id: record_id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });

        initDataTable('.table-user_role', baseUrl + 'backend/user_role/getAjaxListData', [3, 5, 6], [3, 5, 6]);
        $(document).delegate(".btn_user_role_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/user_role/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });

        $(document).delegate(".delete_user_role", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/user_role/delete_record',
                        data: {
                            record_id: record_id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });



        initDataTable('.table-languages', baseUrl + 'backend/languages/getAjaxListData', [3, 4], [3, 4]);
        $(document).delegate(".btn_language_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/languages/change_status", 
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {
                }
            });
        });
        $(document).delegate(".delete_language", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/languages/delete_record',
                        data: {
                            record_id: record_id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });

        // initDataTable table name devu pade
        initDataTable('.table-product', baseUrl + 'backend/product/getAjaxList', [], []);
        $(document).delegate(".btn_product_status", "change", function (event) {
            var status = 0;
            var id = $(this).val();
            if (this.checked) {
                status = 1;
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/product/change_status",
                data: {
                    status: status,
                    id: id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_product", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('data-id');

                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/product/product_delete',
                        data: {
                            id: id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });
        // ---------- Image Delete ----------------
        $('.delete_img').click(function () {
            var id = $(this).attr('data-img-id');

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/product/delete_image",
                data: {
                    id: id
                },
                success: function (data) {
                    location.reload();
                }
            });
        });

        initDataTable('.table-category', baseUrl + 'backend/category/getAjaxcategory', [], []);
        $(document).delegate(".btn_category_status", "change", function (event) {
            var status = 0;
            var id = $(this).val();
            if (this.checked) {
                status = 1;
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/category/change_status",
                data: {
                    status: status,
                    id: id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".category_ajax", "click", function (event) {
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/category/edit_category_ajax",
                data: {
                    id: id
                },
                success: function (result) {
                    console.log(result);
                    $('#add_category_ajax').html(result);
                }
            });
        });
        $(document).delegate(".edit_category_ajax", "click", function (event) {

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/category/category_detail",
                data: {
                },
                success: function (result) {
                    console.log(result);
                    $('#form_category_ajax').html(result);
                }
            });
        });
        $(document).delegate(".category_ajax_delete", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('data-id');

                $.ajax({
                    type: "POST",
                    url: baseUrl + "backend/category/category_delete",
                    data: {
                        id: id
                    },
                    success: function (response) {
                        console.log(response);
                        if (response) {
                            el.closest("tr").hide();
                        }
                    }
                });
            }
        });


        initDataTable('.table-banner', baseUrl + 'backend/banner/bannerimg', [], []);
        $(document).delegate(".btn_banner_status", "change", function (event) {
            var status = 0;
            var id = $(this).val();
            if (this.checked) {
                status = 1;
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/banner/change_status",
                data: {
                    status: status, 
                    id: id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_banner", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('data-id');

                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/banner/banner_delete',
                        data: {
                            id: id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });


        initDataTable('.table-blog', baseUrl + 'backend/blog/blogimg', [], []);
        $(document).delegate(".btn_blog_status", "change", function (event) {
            var status = 0;
            var id = $(this).val();
            // alert(id);
            if (this.checked) {
                status = 1;
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/blog/change_status",
                data: {
                    status: status,
                    id: id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_blog", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('data-id');

                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/blog/blog_delete',
                        data: {
                            id: id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });

        initDataTable('.table-portfolio', baseUrl + 'backend/portfolio/portfolioimg', [], []);
        $(document).delegate(".btn_portfolio_status", "change", function (event) {
            var status = 0;
            var id = $(this).val();
            if (this.checked) {
                status = 1;
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/portfolio/change_status",
                data: {
                    status: status,
                    id: id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_portfolio", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('data-id');

                if (id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/portfolio/portfolio_delete',
                        data: {
                            id: id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });

        initDataTable('.table-detail', baseUrl + 'backend/Orderdetails/getAjaxorder', [], []);
        $(document).delegate(".detail_ajax", "click", function (event) {
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/orderdetails/view_ajax",
                data: {
                    id: id
                },
                success: function (result) {
                    console.log(result);
                    $('#add_detail').html(result);
                }
            });
        });
        $(document).delegate(".details_ajax_delete", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('data-id');
                alert(id);

                $.ajax({
                    type: "POST",
                    url: baseUrl + "backend/orderdetails/delete",
                    data: {
                        id: id
                    },
                    success: function (response) {
                        if (response) {
                            el.closest("tr").hide();
                        }
                    }
                });
            }
        });


        initDataTable('.table-setting', baseUrl + 'backend/setting/getAjaxitem', [], []);

        








    });
})(jQuery, window, document);
