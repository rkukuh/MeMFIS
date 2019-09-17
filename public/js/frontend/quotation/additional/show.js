let AdditionalTaskQtnShow = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation/'+quotation_uuid+'/defectcard/item',
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
                    field: 'taskcard.number',
                    title: 'TaskCard',
                    sortable: !1,
                },
                {
                    field: 'item.code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'item.name',
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
                    field: 'unit.name',
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
                    field: 'subtotal',
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

        $('.tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation/'+quotation_uuid+'/defectcard/tool',
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
                    field: 'taskcard.number',
                    title: 'TaskCard',
                    sortable: !1,
                },
                {
                    field: 'item.code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'item.name',
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
                    field: 'unit.name',
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
                    field: 'subtotal',
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
        $('.defect_card_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/defectcard/'+project_uuid+'/selected',

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
                serverSorting: !1
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
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'code',
                    title: 'Defect Card No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'JC Ref.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.jobcardable.number',
                    title: 'TC No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'defectcard_skill',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'created_by',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
        });
        $('.nav-tabs').on('click', '.items', function () {

            let table = $('.materials_datatable').mDatatable();
            table.originalDataSet = [];
            table.reload();

            let table2 = $('.tools_datatable').mDatatable();
            table2.originalDataSet = [];
            table2.reload();

        });

    }
};

jQuery(document).ready(function () {
    AdditionalTaskQtnShow.init();
});
