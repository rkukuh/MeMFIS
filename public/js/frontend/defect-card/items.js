let DefectCard = {
    init: function () {

        $(".tools_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/discrepancy/'+uuid+'/tools',


                        map: function(raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== "undefined") {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        }
                    }
                },
                pageSize: 10,
                serverPaging: !0,
                serverFiltering: !1,
                serverSorting: !1
            },
            layout: {
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $("#generalSearch")
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
                    field: "code",
                    title: "Part No.",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "name",
                    title: "Material Name",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_off",
                    title: "SN Off",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_on",
                    title: "SN On",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.quantity",
                    title: "Quantity",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.unit",
                    title: "Unit",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.ipc_ref",
                    title: "IPC Ref",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.note",
                    title: "Remark",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool-edit" title="Edit" data-tool_uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
        $(".materials_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/discrepancy/'+uuid+'/materials',

                        map: function(raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== "undefined") {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        }
                    }
                },
                pageSize: 10,
                serverPaging: !0,
                serverFiltering: !1,
                serverSorting: !1
            },
            layout: {
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $("#generalSearch")
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
                    field: "code",
                    title: "Part No.",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "name",
                    title: "Material Name",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_off",
                    title: "SN Off",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_on",
                    title: "SN On",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.quantity",
                    title: "Quantity",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.unit",
                    title: "Unit",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.ipc_ref",
                    title: "IPC Ref",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.note",
                    title: "Remark",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool-edit" title="Edit" data-tool_uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.tools_datatable').on('click', '.tool-edit', function edit () {
            let item_uuid = $(this).data('tool_uuid');
            // alert(triggerid);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/discrepancy/' +uuid+'/item/' + item_uuid+'/edit',
                success: function (data) {
                    document.getElementById('uuid').value = data.uuid;
                    document.getElementById('quantity').value = data.pivot.quantity;
                    document.getElementById('ipc').value = data.pivot.ipc_ref;
                    document.getElementById('sn_on').value = data.pivot.sn_on;
                    document.getElementById('sn_off').value = data.pivot.sn_off;
                    document.getElementById('remark_tool').value = data.pivot.note;
                    $.ajax({
                        url: '/get-tools/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (unit) {
                            $('select[name="tool"]').empty();

                            $.each(unit, function (key, value) {
                                if(key == data.pivot.item_id){
                                    $('select[name="tool"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="tool"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    );
                                }
                            });
                        }
                    });
                    $.ajax({
                        url: '/get-units/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (unit) {
                            $('select[name="unit_tool"]').empty();

                            $.each(unit, function (key, value) {
                                if(key == data.pivot.unit_id){
                                    $('select[name="unit_tool"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="unit_tool"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    );
                                }
                            });
                        }
                    });

                    $('.btn-success').addClass('update-tool');
                    $('.btn-success').removeClass('add-tool');
                    $('.btn-success').removeClass('add');
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

        $('.modal-footer').on('click', '.update-tool', function () {
            let tool = $('#tool').val();
            let unit_tool = $('#unit_tool').val();
            let quantity = $('input[name=quantity]').val();
            let ipc = $('input[name=ipc]').val();
            let sn_on = $('input[name=sn_on]').val();
            let sn_off = $('input[name=sn_off]').val();
            let remark_tool = $('#remark_tool').val();
            let triggeruuid = $('input[name=uuid]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/discrepancy/' +uuid+'/item/' + triggeruuid+'/',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: tool,
                    quantity: quantity,
                    unit_id: unit_tool,
                    ipc_ref: ipc,
                    sn_on: sn_on,
                    sn_off: sn_off,
                    note: remark_tool,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }
                        if (data.errors.symbol) {
                            $('#symbol-error').html(data.errors.symbol[0]);

                        }
                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);

                        }

                    } else {
                        // save_changes_button();
                        // unit_reset();
                        $('.btn-success').addClass('add-tool');
                        $('.btn-success').removeClass('update-tool');

                        $('#modal_tool').modal('hide');

                        toastr.success('Unit has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.tools_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $('.materials_datatable').on('click', '.material-edit', function edit () {
            let item_uuid = $(this).data('material_uuid');
            // alert(triggerid);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/discrepancy/' +uuid+'/item/' + item_uuid+'/edit',
                success: function (data) {
                    document.getElementById('material_uuid').value = data.uuid;
                    document.getElementById('quantity_material').value = data.pivot.quantity;
                    document.getElementById('ipc_material').value = data.pivot.ipc_ref;
                    document.getElementById('sn_on_material').value = data.pivot.sn_on;
                    document.getElementById('sn_off_material').value = data.pivot.sn_off;
                    document.getElementById('remark_material').value = data.pivot.note;
                    $.ajax({
                        url: '/get-materials/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (unit) {
                            $('select[name="material"]').empty();

                            $.each(unit, function (key, value) {
                                if(key == data.pivot.item_id){
                                    $('select[name="material"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="material"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    );
                                }
                            });
                        }
                    });
                    $.ajax({
                        url: '/get-units/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (unit) {
                            $('select[name="unit_material"]').empty();

                            $.each(unit, function (key, value) {
                                if(key == data.pivot.unit_id){
                                    $('select[name="unit_material"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="unit_material"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    );
                                }
                            });
                        }
                    });

                    $('.btn-success').addClass('update-material');
                    $('.btn-success').removeClass('add-item');
                    $('.btn-success').removeClass('add');
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
        $('.modal-footer').on('click', '.update-material', function () {
            let material = $('#material').val();
            let unit_material = $('#unit_material').val();
            let quantity = $('input[name=quantity_material]').val();
            let ipc = $('input[name=ipc_material]').val();
            let sn_on = $('input[name=sn_on_material]').val();
            let sn_off = $('input[name=sn_off_material]').val();
            let remark_material = $('#remark_material').val();
            let triggeruuid = $('input[name=material_uuid]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/discrepancy/' +uuid+'/item/' + triggeruuid+'/',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: material,
                    quantity: quantity,
                    unit_id: unit_material,
                    ipc_ref: ipc,
                    sn_on: sn_on,
                    sn_off: sn_off,
                    note: remark_material,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }
                        if (data.errors.symbol) {
                            $('#symbol-error').html(data.errors.symbol[0]);

                        }
                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);

                        }

                    } else {
                        // save_changes_button();
                        // unit_reset();
                        $('.btn-success').addClass('add-item');
                        $('.btn-success').removeClass('update-material');

                        $('#modal_material').modal('hide');

                        toastr.success('Unit has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.materials_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
  DefectCard.init();
});
