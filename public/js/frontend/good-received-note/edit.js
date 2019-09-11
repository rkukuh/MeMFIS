let goods_received_note = {
    init: function () {
        $('.purchase_order_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/goods-received/item/'+grn_uuid,
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
                serverFiltering: !0,
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
                    field: 'pivot.unit_id',
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
                            '<button data-toggle="modal" data-target="#modal_grn" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Item" data-item='+t.code+' data-quantity='+t.pivot.quantity+' data-unit='+t.pivot.unit_id+' data-expred='+t.code+' data-description='+t.description+' data-uuid=' +
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
                url: '/goods-received/'+grn_uuid,
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
            let item_uuid = $("#material").val();
            let exp_date = $("#exp_date_2").val();
            let qty = $("#quantity").val();
            let unit_id = $("#unit_material").val();
            let note = $("#description").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '/goods-received/'+grn_uuid+'/item/',
                type: "POST",
                data: {
                    item_uuid: item_uuid,
                    exp_date: exp_date,
                    quantity: qty,
                    unit_id: unit_id,
                    note: note,
                },
                success: function(response) {
                    if (response.errors) {
                        console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

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
        $('.purchase_order_datatable').on('click', '.edit-item', function () {
            let description = "";
            document.getElementById('item').innerText = $(this).data('item');
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
                        console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

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
                        url: '/goods-received/' + grn_uuid + '/item/'+$(this).data('uuid'),
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
