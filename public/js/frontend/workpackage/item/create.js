let Workpackage = {
    init: function () {
        $('.tools_datatable').mDatatable({
            data: { 
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage',
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
                    field: 'id',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'quotation',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        $(document).ready(function () {
                            units = function () {
                                $.ajax({
                                    url: '/get-units/',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function (data) {
                                        $('select[name="unit_id"]').empty();

                                        $('select[name="unit_id"]').append(
                                            '<option value=""> Select a Unit</option>'
                                        );

                                        $.each(data, function (key, value) {
                                            if(key == 4){
                                                $('select[name="unit_id"]').append(
                                                    '<option value="' + key + '" selected>' + value + '</option>'
                                                );
                                            }else{
                                                $('select[name="unit_id"]').append(
                                                    '<option value="' + key + '" >' + value + '</option>'
                                                );
                                            }
                                        });
                                    }
                                });
                            };

                            units();
                        });
                        return '<select id="unit_id" name="unit_id" class="form-control m-input unit_id">'+
                            '<option value="">'+
                                'Select Unit'+
                            // '</option>'+
                            // '<option value="2">'+
                            //     'Select Unit2'+
                            // '</option>'+
                            // '<option value="3">'+
                            //     'Select Unit3'+
                            // '</option>'+

                        '</select>'

                    }
                },
                {
                    field: 'stat',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            t.id +
                            'title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
        $('.materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage',
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
                    field: 'id',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'quotation',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        $(document).ready(function () {
                            units = function () {
                                $.ajax({
                                    url: '/get-units/',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function (data) {
                                        $('select[name="unit_id"]').empty();

                                        $('select[name="unit_id"]').append(
                                            '<option value=""> Select a Unit</option>'
                                        );

                                        $.each(data, function (key, value) {
                                            if(key == 4){
                                                $('select[name="unit_id"]').append(
                                                    '<option value="' + key + '" selected>' + value + '</option>'
                                                );
                                            }else{
                                                $('select[name="unit_id"]').append(
                                                    '<option value="' + key + '" >' + value + '</option>'
                                                );
                                            }
                                        });
                                    }
                                });
                            };

                            units();
                        });
                        return '<select id="unit_id" name="unit_id" class="form-control m-input unit_id">'+
                            '<option value="">'+
                                'Select Unit'+
                            // '</option>'+
                            // '<option value="2">'+
                            //     'Select Unit2'+
                            // '</option>'+
                            // '<option value="3">'+
                            //     'Select Unit3'+
                            // '</option>'+

                        '</select>'

                    }
                },
                {
                    field: 'stat',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            t.id +
                            'title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    Workpackage.init();
});
