function additional_materials_get_datatable(uuids){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        dataType : "json",
        url: '/datatables/project/additional/materials',
        data: {
            _token: $('input[name=_token]').val(),
            uuids: uuids,
        },
        success: function(response) {
                let table = $('.materials_datatable').mDatatable();
                table.destroy();
                $('.materials_datatable').mDatatable({
                data: {
                    type: "local",
                    source: response,
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
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
            });


        }
    });

}


function additional_tools_get_datatable(uuids){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType : "json",
        type: 'post',
        url: '/datatables/project/additional/tools',
        data: {
            _token: $('input[name=_token]').val(),
            uuids: uuids,
        },
        success: function(response2) {
            let table = $('.tools_datatable').mDatatable();
            table.destroy();
            table = $('.tools_datatable').mDatatable({
                data: {
                    type: "local",
                    source: response2,
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
            ]
            });
        }
    });
}

