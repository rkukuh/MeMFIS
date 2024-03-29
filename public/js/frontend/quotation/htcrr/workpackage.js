$(".htcrr_materials_and_tools").on("click", function(){
    let table = $('.htcrr_tools_datatable').mDatatable();
    table.originalDataSet = [];
    table.reload();

    table = $('.htcrr_materials_datatable').mDatatable();
    table.originalDataSet = [];
    table.reload();
});

$('.action-buttons').on('click', '.add-job-request', function() {
    let total_mhrs  = $('#total_mhrs').html();
    let description = $('#description').val();
    let rate = $('#rate').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'put',
        url: '/quotation/htcrr/'+quotation_uuid,
        data: {
            _token: $('input[name=_token]').val(),
            manhour_total: total_mhrs,
            description: description,
            manhour_rate:rate,
        },
        success: function (data) {
            if (data.errors) {
                // if (data.errors.aircraft_id) {
                //     $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                // }
                // if (data.errors.title) {
                //     $('#title-error').html(data.errors.title[0]);
                // }

                // document.getElementById('applicability-airplane').value = applicability-airplane;
                // document.getElementById('title').value = title;

            } else {
                // $('#modal_customer').modal('hide');

                toastr.success('Job Request has been updated.', 'Success', {
                    timeOut: 5000
                });

                // window.location.href = '/workpackage/'+data.uuid+'/edit';
                // let table = $('.m_datatable').mDatatable();

                // table.originalDataSet = [];
                // table.reload();
            }
        }
    });

});


let HtCRRMatsToolsDatatables = {
    init: function() {

    $('.htcrr_tools_datatable').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    method: 'GET',
                    url: '/datatables/quotation/'+quotation_uuid+'/workPackage/tool/htcrr',
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
                field: 'tc',
                title: 'TaskCard',
                sortable: !1,
            },
            {
                field: 'pn',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'title',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_tool',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unitPrice',
                title: 'Unit Price',
                sortable: 'asc',
                filterable: !1,
                template: function (t){
                    return ForeignFormatter.format(t.unitPrice);
                }
            },
            {
                field: 'price_amount',
                title: 'Selling  Unit Price',
                sortable: 'asc',
                filterable: !1,
                template: function (t){
                    return ForeignFormatter.format(t.price_amount);
                }
            },
            {
                field: 'sub_total',
                title: 'Sub Total',
                sortable: 'asc',
                filterable: !1,
                template: function (t){
                    return ForeignFormatter.format(t.quantity*t.price_amount);
                }
            },
            {
                field: 'note',
                title: 'Marketing Notes',
                sortable: 'asc',
                filterable: !1,
                width:150,
            },
            {
                field: 'Actions',
                sortable: !1,
                overflow: 'visible',
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_item_price" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item-price" title="Edit" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                }
            }
        ]
    });

    $('.htcrr_materials_datatable').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    method: 'GET',
                    url: '/datatables/quotation/'+quotation_uuid+'/workPackage/item/htcrr',
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
                field: 'tc',
                title: 'TaskCard',
                sortable: !1,
            },
            {
                field: 'pn',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'title',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_material',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'unitPrice',
                title: 'Unit Price',
                sortable: 'asc',
                filterable: !1,
                template: function (t){
                    return ForeignFormatter.format(t.unitPrice);
                }
            },
            {
                field: 'price_amount',
                title: 'Selling  Unit Price',
                sortable: 'asc',
                filterable: !1,
                template: function (t){
                    return ForeignFormatter.format(t.price_amount);
                }
            },
            {
                field: 'sub_total',
                title: 'Sub Total',
                sortable: 'asc',
                filterable: !1,
                template: function (t){
                    return ForeignFormatter.format(t.quantity*t.price_amount);
                }
            },
            {
                field: 'note',
                title: 'Marketing Notes',
                sortable: 'asc',
                filterable: !1,
                width:150,
            },
            {
                field: 'Actions',
                sortable: !1,
                overflow: 'visible',
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_item_price" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item-price" title="Edit" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                }
            }
        ]
    });

    }
};

$('.modal-footer').on('click', '.add-item-price', function () {
    let quantity = $('input[name=qty]').val();
    let price_amount = $('input[name=price]').val();
    let unit_id =$('#unit_id').val();
    let note =$('#note').val();
    let triggerid = $('input[name=uuid]').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'put',
        url: '/quotation/qtn-htcrr-item/' + triggerid,
        data: {
            _token: $('input[name=_token]').val(),
            uuid: triggerid,
            quantity: quantity,
            unit_id: unit_id,
            price_amount: price_amount,
            note: note
        },
        success: function (data) {
            if (data.errors) {
                if (data.errors.quantity) {
                    $('#qty-limit-error').html(data.errors.quantity[0]);
                }
                // if (data.errors.symbol) {
                //     $('#symbol-error').html(data.errors.symbol[0]);

                // }
                // if (data.errors.type) {
                //     $('#type-error').html(data.errors.type[0]);

                // }

            } else {
                // save_changes_button();
                // unit_reset();
                $('#modal_item_price').modal('hide');

                toastr.success('Selling Price has been updated.', 'Success', {
                    timeOut: 5000
                });

                let table = $('.htcrr_tools_datatable').mDatatable();

                table.originalDataSet = [];
                table.reload();

                table = $('.htcrr_materials_datatable').mDatatable();

                table.originalDataSet = [];
                table.reload();

                $('.add-htcrr-item-price').addClass('add-item-price');
                $('.add-htcrr-item-price').removeClass('add-htcrr-item-price');

            }
        }
    });
});

$('.htcrr_materials_datatable').on('click','.edit-item-price', function edit () {
    let triggerid = $(this).data('uuid');
    $("#modal_item_price").val(triggerid);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'get',
        url: '/quotation/qtn-htcrr-item/' + triggerid + '/edit',
        success: function (data) {
            document.getElementById('uuid').value = data.uuid;
            document.getElementById('qty').value = data.quantity;
            document.getElementById('price').value = data.price_amount;
            document.getElementById('note').value = data.note;
            $.ajax({
                url: '/get-units/',
                type: 'GET',
                dataType: 'json',
                success: function (unit) {
                    $('select[name="unit_id"]').empty();

                    $.each(unit, function (key, value) {
                        if(key == data.unit_id){
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        }
                        else{
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }
                    });
                }
            });

            // $('.btn-success').addClass('update');
            // $('.btn-success').removeClass('add');
        },
        error: function (jqXhr, json, errorThrown) {
            // this are default for ajax errors
            let errorsHtml = '';
            let errors = jqXhr.responseJSON;

            $.each(errors.errors, function (index, value) {
                $('#kategori-error').html(value);
            });
        }
    });
});

$('.htcrr_tools_datatable').on('click','.edit-item-price', function edit () {
    let triggerid = $(this).data('uuid');
    $("#modal_item_price").val(triggerid);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'get',
        url: '/quotation/qtn-htcrr-item/' + triggerid + '/edit',
        success: function (data) {
            document.getElementById('uuid').value = data.uuid;
            document.getElementById('qty').value = data.quantity;
            document.getElementById('price').value = data.price_amount;
            document.getElementById('note').value = data.note;
            $.ajax({
                url: '/get-units/',
                type: 'GET',
                dataType: 'json',
                success: function (unit) {
                    $('select[name="unit_id"]').empty();

                    $.each(unit, function (key, value) {
                        if(key == data.unit_id){
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        }
                        else{
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }
                    });
                }
            });

            // $('.btn-success').addClass('update');
            // $('.btn-success').removeClass('add');
        },
        error: function (jqXhr, json, errorThrown) {
            // this are default for ajax errors
            let errorsHtml = '';
            let errors = jqXhr.responseJSON;

            $.each(errors.errors, function (index, value) {
                $('#kategori-error').html(value);
            });
        }
    });
});

jQuery(document).ready(function() {
    HtCRRMatsToolsDatatables.init();
});

