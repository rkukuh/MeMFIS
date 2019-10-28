let InventoryInCreate = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/inventory-in/'+ inventoryin_uuid +'/items',
                        map: function (raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        }
                    }
                },
                pageSize: 10,
                serverPaging: !0,
                serverSorting: !0
            },
            layout: {
                theme: 'default',
                class: '',
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: '#',
                    title: 'No',
                    width:'40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {   
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: 'code',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/item/'+t.uuid+'">' + t.code + "</a>"
                    }
                },
                {
                    field: 'pivot.serial_number',
                    title: 'Serial Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.pivot.serial_number
                    }
                },
                {
                    field: 'description',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.description
                    }
                },
                {
                    field: 'pivot.expired_at',
                    title: 'Expired Date',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.pivot.expired_at
                    }
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.pivot.quantity
                    }
                },
                {
                    field: 'unit_name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.unit_name
                    }
                },
                {
                    field: "pivot.description",
                    title: "Remark",
                    template: function (t) {
                        return t.pivot.description
                    }
                },
                {
                    field: 'Actions',
                    width: 110,
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_item" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Edit" data-item=' + 
                            t.uuid + ' data-date='+ t.pivot.expired_at +' data-quantity=' + t.pivot.quantity + ' data-unit=' + t.unit_id + ' data-remark=' + t.pivot.description +' data-serial='+ t.pivot.serial_number +'>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }

            ]
        });

        $(".modal-footer").on("click", ".add-item", function () {
            let serial_numbers = [];
            $("input[name^=serial_number]").each(function () {
                serial_numbers.push(this.value);
            });
            serial_numbers = serial_numbers.filter(function (el) {

                return el != null && el != "";

            });

            let item = $("#item").val();
            let quantity = $("input[name=qty]").val();
            let exp_date = $("#exp_date").val();
            let unit = $("#unit_id").val();
            let remark = $("#item_remark").val();
            if ($("#is_serial_number").is(":checked")) {
                if (serial_numbers.length < quantity) {
                    $('input[name^="serial_number"]').each(function (i) {
                        if (this.value == "" || this.value == null) {
                            $(this).css('border', '2px solid red');
                        } else {
                            $(this).css('border', '1px solid grey');
                        }
                    });

                    return;
                }
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/inventory-in/" + inventoryin_uuid + "/item/" + item,
                type: "POST",
                data: {
                    item_id: item,
                    quantity: quantity,
                    exp_date: exp_date,
                    unit_id: unit,
                    serial_no: serial_numbers,
                    remark: remark,
                },
                success: function (response) {
                    $('#modal_item').modal('hide');

                    $('#modal_item').on('hidden.bs.modal', function (e) {
                        $(this)
                            .find("input,textarea")
                            .val('')
                            .end()
                            .find("select")
                            .select2('val', 'All')
                            .end();
                    });

                    toastr.success("Item has been added.", "Success", {
                        timeOut: 5000
                    });

                    let table = $(".item_datatable").mDatatable();

                    table.originalDataSet = [];
                    table.reload();
                }
            });
        });

        $('.item_datatable').on('click', '.edit-item', function () {
            let item_uuid = $(this).data('item');
            let unit_id = $(this).data('unit');

            $.ajax({
                url: '/get-items-uuid/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('select[name="item"]').empty();

                    $.each(data, function (key, value) {
                        if (key == item_uuid) {
                            $('select[name="item"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="item"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });
            $("#item").attr('disabled', true);

            $.ajax({
                url: '/get-item-unit-uuid/' + $(this).data('item'),
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('select[name="unit_id"]').empty();

                    $.each(data, function (key, value) {
                        if (key == unit_id) {
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });

            document.getElementById('qty').value = $(this).data('quantity');
            document.getElementById('uuid').value = $(this).data('uuid');
            document.getElementById('item_remark').value = $(this).data('remark');
            document.getElementById('exp_date').value = $(this).data('date');

            $('.btn-success').addClass('update-item');
            $('.btn-success').removeClass('add-item');
        });

        $(".modal-footer").on("click", ".update-item", function () {
            let item = $("#item").val();
            let quantity = $("input[name=qty]").val();
            let exp_date = $("#exp_date").val();
            let unit = $("#unit_id").val();
            let remark = $("#item_remark").val();
            let serial_no = $("#serial_no").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/inventory-in/" + inventoryin_uuid + "/item/" + item,
                type: "PUT",
                data: {
                    item_id: item,
                    quantity: quantity,
                    exp_date: exp_date,
                    unit_id: unit,
                    serial_no: serial_no,
                    remark: remark,
                },
                success: function (response) {
                    $('#modal_item').modal('hide');

                    $('#modal_item').on('hidden.bs.modal', function (e) {
                        $(this)
                            .find("input,textarea")
                            .val('')
                            .end()
                            .find("select")
                            .select2('val', 'All')
                            .end();
                    });

                    toastr.success("Item has been added.", "Success", {
                        timeOut: 5000
                    });

                    let table = $(".item_datatable").mDatatable();

                    table.originalDataSet = [];
                    table.reload();

                    $('.btn-success').addClass('add-item');
                    $('.btn-success').removeClass('update-item');
                }
            });
        });

        $('.item_datatable').on('click', '.delete', function () {

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            })
                .then(result => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content'
                                )
                            },
                            type: 'DELETE',
                            url: '/inventory-in/' + inventoryin_uuid + '/item/' + $(this).data('uuid'),
                            success: function (data) {
                                toastr.success('Item has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                                );

                                let table = $('.item_datatable').mDatatable();

                                table.originalDataSet = [];
                                table.reload();
                            },
                            error: function (jqXhr, json, errorThrown) {
                                let errors = jqXhr.responseJSON;

                                $.each(errors.errors, function (index, value) {
                                    $('#delete-error').html(value);
                                });
                            }
                        });
                    }
                });
        });

        $('.footer').on('click', '.update-inventory-in', function () {
            let ref_no = $('input[name=ref-no]').val();
            let description = $('#remark').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/inventory-in/' + inventoryin_uuid,
                type: 'PUT',
                data: {
                    ref_no: ref_no,
                    storage_id: storage_id,
                    inventoried_at: date,
                    description: description,
                    section: section_code,
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors)
                    } else {
                        toastr.success('InventoryIn has been updated.', 'Success', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    InventoryInCreate.init();
});

$("#is_serial_number").on("change", function () {
    if ($(this).is(":checked")) {
        $('.serial_numbers').removeClass("hidden");
        $('#unit_id').prop('disabled', true);
    } else {
        $('.serial_numbers').addClass("hidden");
        $('.serial_number_inputs').html('');
        $('#unit_id').prop('disabled', false);
    }
});
$("#is_serial_number_edit").on("change", function () {
    if ($(this).is(":checked")) {
        // $('.serial_numbers').removeClass("hidden");
        $('#unit_id').prop('disabled', true);
    } else {
        // $('.serial_numbers').addClass("hidden");
        // $('.serial_number_inputs').html('');
        $('#unit_id').prop('disabled', false);
    }
});

$("#item").on("change", function () {
    let item_uuid = $("#item").val();

    $.ajax({
        url: '/get-item-unit-uuid/' + item_uuid,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('select[name="unit_id"]').empty();

            $('select[name="unit_id"]').append(
                '<option value=""> Select a Unit</option>'
            );

            $.each(data, function (key, value) {
                $('select[name="unit_id"]').append(
                    '<option value="' + key + '">' + value + '</option>'
                );
            });
        }
    });
});

$("#qty").on("change", function () {
    let qty = $("#qty").val();
    $('.clone').remove();
    
    for (let number = 0; number < qty; number++) {
        let clone = $(".blueprint").clone();
        clone.removeClass("blueprint hidden");
        clone.addClass("clone");
        $(".serial_number_inputs").after(clone);
        clone.slideDown("slow", function () { });
    }
});
