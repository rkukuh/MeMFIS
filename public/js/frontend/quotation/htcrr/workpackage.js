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

$('#m_accordion_1').on('click', '#m_accordion_6_item_6_head', function () {

    let table = $('.htcrr_tools_datatable').mDatatable();
    table.originalDataSet = [];
    table.reload();

});

$('#m_accordion_1').on('click', '#m_accordion_7_item_7_head', function () {

    let table = $('.htcrr_materials_datatable').mDatatable();
    table.originalDataSet = [];
    table.reload();

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

                        // console.log(dataSet);
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

                        // console.log(dataSet);
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

jQuery(document).ready(function() {
    HtCRRMatsToolsDatatables.init();
});