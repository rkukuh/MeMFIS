$('#m_accordion_2_item_1_head').on('click', function () {
    let table = $('.ad-sb_datatable').mDatatable();
    console.log("reload");

    table.originalDataSet = [];
    table.reload();
});

$('#m_accordion_2_item_2_head').on('click', function () {
    let table = $('.cmr-awl_datatable').mDatatable();
    console.log("reload");

    table.originalDataSet = [];
    table.reload();
});

$('#m_accordion_2_item_3_head').on('click', function () {
    let table = $('.si_datatable').mDatatable();
    console.log("reload");

    table.originalDataSet = [];
    table.reload();
});

$('#m_accordion_2_item_4_head').on('click', function () {
    let table = $('.ht_crr_datatable').mDatatable();
    console.log("reload");

    table.originalDataSet = [];
    table.reload();
});

let NonRoutineWorkpackage = {
    init: function () {
        $('.ad-sb_datatable').mDatatable({
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
                    title: 'Taskcard Number',
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
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Mhrs (Included Performance Factor)',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'statu',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'Tool',
                    sortable: 'asc',
                    filterable: !1,
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                //             t.id +
                //             '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                //         );
                //     }
                // }
            ]
        });

        $('.cmr-awl_datatable').mDatatable({
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
                    title: 'Taskcard Number',
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
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Mhrs (Included Performance Factor)',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'statu',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'Tool',
                    sortable: 'asc',
                    filterable: !1,
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                //             t.id +
                //             '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                //         );
                //     }
                // }
            ]
        });

        $('.si_datatable').mDatatable({
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
                    title: 'Taskcard Number',
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
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Mhrs (Included Performance Factor)',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'statu',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'Tool',
                    sortable: 'asc',
                    filterable: !1,
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                //             t.id +
                //             '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                //         );
                //     }
                // }
            ]
        });

        $('.workshop_task_datatable').mDatatable({
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
                    title: 'Workshop Task No',
                    sortable: !1,
                },
                {
                    field: 'quotation',
                    title: 'Job request',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer',
                    title: 'Workshop Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Manhours',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'statu',
                    title: 'Qty Helper',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'RII ?',
                    sortable: 'asc',
                    filterable: !1,
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                //             t.id +
                //             '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                //         );
                //     }
                // }
            ]
        });
    }
};

jQuery(document).ready(function () {
    NonRoutineWorkpackage.init();
});
