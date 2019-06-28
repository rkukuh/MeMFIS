let JobRequest = {
    init: function() {

        let total = 0;

        $('.non_routine_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation/'+workPackage_uuid+'/tool/non-routine',
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
            columns: [{
                    field: 'code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'name',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit_price',
                    title: 'Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return '100000';
                    }
                },
                {
                    field: 'selling_price',
                    title: 'Selling  Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ('<input type="number">');

                    }
                },
                {
                    field: 'sub_total',
                    title: 'Sub Total',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        total = total+t.pivot.quantity*100000;

                        return t.pivot.quantity*100000;
                    }
                },
                {
                    field: 'note',
                    title: 'Marketing Notes',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ('<input type="text">');
                    }
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" title="Delete" data-uuid="' + t.uuid + '">' +
                //                 '<i class="la la-trash"></i>' +
                //             '</a>'
                //         );
                //     }
                // }
            ]
        });

        $('.routine_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation/'+workPackage_uuid+'/tool/routine',
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
            columns: [{
                    field: 'code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'name',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit_price',
                    title: 'Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return '100000';
                    }
                },
                {
                    field: 'selling_price',
                    title: 'Selling  Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ('<input type="number">');

                    }
                },
                {
                    field: 'sub_total',
                    title: 'Sub Total',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        total = total+t.pivot.quantity*100000;

                        return t.pivot.quantity*100000;
                    }
                },
                {
                    field: 'note',
                    title: 'Marketing Notes',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ('<input type="text">');
                    }
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" title="Delete" data-uuid="' + t.uuid + '">' +
                //                 '<i class="la la-trash"></i>' +
                //             '</a>'
                //         );
                //     }
                // }
            ]
        });

        $('.non_routine_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation/'+workPackage_uuid+'/item/non-routine',
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
            columns: [{
                    field: 'code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'name',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,

                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit_price',
                    title: 'Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return '100000';
                    }
                },
                {
                    field: 'selling_price',
                    title: 'Selling  Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ('<input type="number" style="width:100px;">');

                    }
                },
                {
                    field: 'sub_total',
                    title: 'Sub Total',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return t.pivot.quantity*100000;
                    }
                },
                {
                    field: 'note',
                    title: 'Marketing Notes',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ('<input type="text" style="width:100px;">');
                    }
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
                //                 '<i class="la la-trash"></i>' +
                //             '</a>'
                //         );
                //     }
                // }
            ]
        });

        $('.routine_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation/'+workPackage_uuid+'/item/routine',
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
            columns: [{
                    field: 'code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'name',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,

                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit_price',
                    title: 'Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return '100000';
                    }
                },
                {
                    field: 'selling_price',
                    title: 'Selling  Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ('<input type="number" style="width:100px;">');

                    }
                },
                {
                    field: 'sub_total',
                    title: 'Sub Total',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return t.pivot.quantity*100000;
                    }
                },
                {
                    field: 'note',
                    title: 'Marketing Notes',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ('<input type="text" style="width:100px;">');
                    }
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
                //                 '<i class="la la-trash"></i>' +
                //             '</a>'
                //         );
                //     }
                // }
            ]
        });

        $('.action-buttons').on('click', '.add-job-request', function() {

            let project_uuid  = $('#uuid').val();
            let total_mhrs  = $('#total_mhrs').html();
            let description = $('#description').val();
            let rate = $('#rate').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/quotation/'+quotation_uuid+'/workpackage/'+workPackage_uuid+'/',
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
    }
};

jQuery(document).ready(function() {
    JobRequest.init();
});
