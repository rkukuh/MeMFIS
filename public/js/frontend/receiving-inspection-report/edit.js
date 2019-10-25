let goods_received_note = {
    init: function () {
        $('.purchase_order_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/receiving-inspection-report/item/'+grn_uuid,
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
                serverFiltering: !1,
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
                    title: 'P/N',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'name',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Qty PR',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Qty PO',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'unit_name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'pivot.note',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'pivot.expired_at',
                    title: 'Expired Date',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_grn" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Item" data-item='+t.code+' data-quantity='+t.pivot.quantity+' data-unit='+t.pivot.unit_id+' data-expred='+t.pivot.expired_at+' data-note='+t.pivot.note+' data-description='+t.description+' data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.footer').on('click', '.update-goods-received', function () {
            let received_at = $('input[name=date]').val();
            let received_by = $('#received-by').val();
            let ref_po = $('input[name=ref-po]').val();
            let do_no = $('input[name=deliv-number]').val();
            let do_date = $('input[name=do-date]').val();
            let warehouse = $('input[name=warehouse]').val();
            let description = $('#description').val();
            let vehicle_no = $('input[name=vehicle-no]').val();
            let container_no = $('input[name=container-no]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/receiving-inspection-report/'+grn_uuid,
                type: 'PUT',
                data: {
                    received_at:received_at,
                    received_by:received_by,
                    vehicle_no:vehicle_no,
                    container_no:container_no,
                    purchase_order_id:ref_po,
                    do_no:do_no,
                    do_date:do_date,
                    storage_id:warehouse,
                    description:description,
                },
                success: function (response) {
                    if (response.errors) {
                        // console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {
                        //    taskcard_reset();


                        toastr.success('GRN has been created.', 'Success', {
                            timeOut: 5000
                        });

                    }
                }
            });
        });

        $('.modal-footer').on('click', '.add-item', function () {
            let serial_numbers = [];
            $("input[name^=serial_number]").each(function() {
                serial_numbers.push(this.value);
            });
            serial_numbers = serial_numbers.filter(function (el) {

                return el != null && el != "";

            });

            let item_uuid = $("#material").val();
            let exp_date = $("#exp_date_2").val();
            let qty = $("#quantity").val();
            let unit_id = $("#unit_material").val();
            let note = $("#remark").val();
            if($("#is_serial_number").is(":checked")) {
                if(serial_numbers.length < qty){
                    $('input[name^="serial_number"]').each(function(i) {
                        if(this.value == "" || this.value == null){
                            $(this).css('border', '2px solid red');
                        }else{
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
                url: '/receiving-inspection-report/'+grn_uuid+'/item/'+item_uuid,
                type: "POST",
                data: {
                    exp_date: exp_date,
                    quantity: qty,
                    unit_id: unit_id,
                    note: note,
                    serial_numbers: serial_numbers,
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.quantity) {
                            $('#quantity-error').html(response.errors.quantity[0]);
                        }
                        // console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        if (response.title == "Danger") {
                            toastr.error("Item already exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_grn_add').modal('hide');

                            toastr.success(
                                "GRN's Item has been updated.",
                                "Success",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(".purchase_order_datatable").mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });
        $('.purchase_order_datatable').on('click', '.edit-item', function () {
            let description = "";
            document.getElementById('item-label').innerText = $(this).data('item');
            if($(this).data('description') != null){
                description = $(this).data('description');
            }else{
                description = "-";
            }
            document.getElementById('item-description').innerText = description;
            let unit_id = $(this).data('unit');

            $('select[name="unit_material"]').empty();

            $.ajax({
                url: '/get-units',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let index = 1;

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
            document.getElementById('exp_date').value = $(this).data('expred');
            document.getElementById('note').value = $(this).data('note');

            document.getElementById('uuid').value = $(this).data('uuid');
        });
        $(".modal-footer").on("click", ".update-item", function() {

            let uuid = $("input[name=uuid]").val();
            let exp_date = $("#exp_date").val();
            let qty = $("#qty").val();
            let unit_id = $("#unit_id").val();
            let note = $("#note").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '/goods-received/'+grn_uuid+'/item/'+uuid,
                type: "PUT",
                data: {
                    exp_date: exp_date,
                    quantity: qty,
                    unit_id: unit_id,
                    note: note,
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.quantity) {
                            $('#qty-error').html(response.errors.quantity[0]);
                        }
                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        //    taskcard_reset();
                        $('#modal_grn').modal('hide');

                        toastr.success(
                            "GRN has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".purchase_order_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                    }
                }
            });
        });
        $('.purchase_order_datatable').on('click', '.delete', function () {

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
                        url: '/receiving-inspection-report/' + grn_uuid + '/item/'+$(this).data('uuid'),
                        success: function (data) {
                            toastr.success('Material has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.purchase_order_datatable').mDatatable();

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

    }
};

jQuery(document).ready(function () {
    goods_received_note.init();
});

$("#is_serial_number").on("change", function () {
    if($(this).is(":checked")) {
        $('.serial_numbers').removeClass("hidden");
        $('#unit_material').prop('disabled', true);
    } else {
        $('.serial_numbers').addClass("hidden");
        $('.serial_number_inputs').html('');
        $('#unit_material').prop('disabled', false);
    }
});
$("#is_serial_number_edit").on("change", function () {
    if($(this).is(":checked")) {
        // $('.serial_numbers').removeClass("hidden");
        $('#unit_id').prop('disabled', true);
    } else {
        // $('.serial_numbers').addClass("hidden");
        // $('.serial_number_inputs').html('');
        $('#unit_id').prop('disabled', false);
    }
});

$("#material").on("change", function () {

    let item_uuid = $("#material").val();
    $.ajax({
        url: '/label/get-good-received/'+grn_uuid+'/item/'+ item_uuid ,
        type: 'GET',
        dataType: 'json',
        success: function (qty_item) {
            document.getElementById('item_reciveded').innerText = qty_item;
        }
    });
    $("#quantity").prop("min", 1);
    $.ajax({
        url: '/get-item-po-details/'+po_uuid+'/'+item_uuid,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $("#quantity").val(parseInt(data.pivot.quantity));
            $("#quantity").prop("max", data.pivot.quantity);
            $('.clone').remove();
            for (let number = 0; number < data.pivot.quantity; number++) {
                let clone = $(".blueprint").clone();
                clone.removeClass("blueprint hidden");
                clone.addClass("clone");
                $(".serial_number_inputs").after(clone);
                clone.slideDown("slow",function(){});
            }
        }
    });
});

$("#quantity").on("change", function () {
    let qty = $("#quantity").val();
    let max = $("#quantity").attr("max");
    $('.clone').remove();
    if($("#quantity").val() < max){
        for (let number = 0; number < qty; number++) {
            let clone = $(".blueprint").clone();
            clone.removeClass("blueprint hidden");
            clone.addClass("clone");
            $(".serial_number_inputs").after(clone);
            clone.slideDown("slow",function(){});
        }
    }else{
        for (let number = 0; number < max; number++) {
            let clone = $(".blueprint").clone();
            clone.removeClass("blueprint hidden");
            clone.addClass("clone");
            $(".serial_number_inputs").after(clone);
            clone.slideDown("slow",function(){});
        }
        }
});
