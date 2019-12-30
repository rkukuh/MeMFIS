let TaskCard = {
    init: function () {
        $('.tool_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-si/'+taskcard_uuid+'/tools',
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
            perpage: 5,
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
                    field: 'name',
                    title: 'Tool',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.note',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool-delete" title="Delete" ' +
                            'data-item_uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-si/'+taskcard_uuid+'/materials',
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
            perpage: 5,
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
                    field: 'name',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit',
                    title: 'Unit name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.note',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material-delete" title="Delete" ' +
                            'data-item_uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.threshold_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/'+taskcard_uuid+'/thresholds',
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
                perpage: 5,
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
                    field: 'amount',
                    title: 'Amount',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type_id',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-threshold" title="Delete" ' +
                            'data-threshold_uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.repeat_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/'+taskcard_uuid+'/repeats',
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
                perpage: 5,
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
                    field: 'amount',
                    title: 'Amount',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type_id',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill repeat-delete" title="Delete" ' +
                            'data-repeat_uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });


        $('.add-threshold').on('click', function () {
            let amount = $('input[name=threshold_amount]').val();
            let threshold_type = $('#threshold_type').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine/'+taskcard_uuid+'/threshold',
                data: {
                    _token: $('input[name=_token]').val(),
                    amount: amount,
                    type_id: threshold_type,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.item_id) {
                        //     $('#tool-error').html(data.errors.item_id[0]);
                        // }

                        // if (data.errors.quantity) {
                        //     $('#quantity-error').html(data.errors.quantity[0]);
                        // }
                        // document.getElementById('tool').value = tool;
                        // document.getElementById('quantity').value = quantity;
                    } else {

                        toastr.success('Threshold has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.threshold_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        $('#modal_threshold').modal('hide');

                    }
                }
            });
        });

        $('.add-repeat').on('click', function () {
            let amount = $('input[name=repeat_amount]').val();
            let repeat_type = $('#repeat_type').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine/'+taskcard_uuid+'/repeat',
                data: {
                    _token: $('input[name=_token]').val(),
                    amount: amount,
                    type_id: repeat_type,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.item_id) {
                        //     $('#tool-error').html(data.errors.item_id[0]);
                        // }

                        // if (data.errors.quantity) {
                        //     $('#quantity-error').html(data.errors.quantity[0]);
                        // }
                        // document.getElementById('tool').value = tool;
                        // document.getElementById('quantity').value = quantity;
                    } else {

                        toastr.success('Repeat has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.repeat_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        $('#modal_repeat').modal('hide');

                    }
                }
            });
        });

        $('.add-item').on('click', function () {
            let quantity = $('input[name=quantity_item]').val();
            let material = $('#material').val();
            let unit_material = $('#unit_material').val();
            let remark_material = $('#remark_material').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-si/'+taskcard_uuid+'/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: material,
                    quantity: quantity,
                    unit_id: unit_material,
                    note: remark_material,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.item_id) {
                            $('#material-error').html(data.errors.item_id[0]);
                        }

                        if (data.errors.quantity) {
                            $('#quantity_item-error').html(data.errors.quantity[0]);
                        }
                        document.getElementById('material').value = material;
                        document.getElementById('quantity').value = quantity;

                    } else {
                        if (data.title == "Danger") {
                            toastr.error("Item already exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {

                        toastr.success('Material has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.item_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                        $('#modal_item').modal('hide');
                        // document.getElementById('uom_quantity').value = '';

                        // $('#item_unit_id').select2('val', 'All');
                        $('#modal_item').on('hidden.bs.modal', function (e) {
                            $(this)
                            .find("input,textarea")
                                .val('')
                                .end()
                            .find("input[type=checkbox], input[type=radio]")
                                .prop("checked", "")
                                .end()
                            .find("select")
                                .select2('val','All')
                                .end();
                        })
                        }
                    }
                }
            });
        });
        $('.add-tool').on('click', function () {
            let quantity = $('input[name=quantity]').val();
            let tool = $('#tool').val();
            let unit_tool = $('#unit_tool').val();
            let remark_tool = $('#remark_tool').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-si/'+taskcard_uuid+'/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: tool,
                    quantity: quantity,
                    unit_id: unit_tool,
                    note: remark_tool,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.item_id) {
                            $('#tool-error').html(data.errors.item_id[0]);
                        }

                        if (data.errors.quantity) {
                            $('#quantity-error').html(data.errors.quantity[0]);
                        }
                        document.getElementById('tool').value = tool;
                        document.getElementById('quantity').value = quantity;
                    } else {
                        if (data.title == "Danger") {
                            toastr.error("Tool already exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {

                        toastr.success('Tool has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.tool_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        $('#modal_tool').modal('hide');
                        // document.getElementById('uom_quantity').value = '';

                        // $('#item_unit_id').select2('val', 'All');

                        $('#modal_tool').on('hidden.bs.modal', function (e) {
                            $(this)
                            .find("input,textarea")
                                .val('')
                                .end()
                            .find("input[type=checkbox], input[type=radio]")
                                .prop("checked", "")
                                .end()
                            .find("select")
                                .select2('val','All')
                                .end();
                        })
                        }
                    }
                }
            });
        });


        $('.tool_datatable').on('click', '.tool-delete', function () {
            let item_uuid = $(this).data('item_uuid');
            // let taskcard_uuid = $(this).data('taskcard_uuid');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/taskcard-si/' + taskcard_uuid + '/' + item_uuid+'/item/',
                        success: function (data) {
                            toastr.success('Takscard Tool has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.tool_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errorsHtml = '';
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                }
            });
        });
        $('.threshold_datatable').on('click', '.delete-threshold', function () {
            let threshold_uuid = $(this).data('threshold_uuid');
            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/taskcard-routine/' + taskcard_uuid + '/' + threshold_uuid+'/threshold/',
                        success: function (data) {
                            toastr.success('Takscard Tool has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.threshold_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errorsHtml = '';
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                }
            });
        });
        $('.repeat_datatable').on('click', '.repeat-delete', function () {
            let repeat_uuid = $(this).data('repeat_uuid');
            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/taskcard-routine/' + taskcard_uuid + '/' + repeat_uuid+'/repeat/',
                        success: function (data) {
                            toastr.success('Takscard Tool has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.repeat_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errorsHtml = '';
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                }
            });
        });

        $('.item_datatable').on('click', '.material-delete', function () {
            let item_uuid = $(this).data('item_uuid');
            // let taskcard_uuid = $(this).data('taskcard_uuid');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/taskcard-si/' + taskcard_uuid + '/' + item_uuid+'/item/',
                        success: function (data) {
                            toastr.success('Takscard Material has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.item_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errorsHtml = '';
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                }
            });
        });


        $(document).ready(function () {

            $('.btn-success').removeClass('add');

        });

        $('.footer').on('click', '.reset', function () {
            taskcard_reset();
        });

        $('.footer').on('click', '.edit-taskcard', function () {
            // taskcard_reset();
            let threshold_type = [];
            $('select[name^="threshold_type"]').each(function(i) {
                threshold_type[i] = $(this).val();
            });
            threshold_type = threshold_type.filter(Boolean);

            let repeat_type = [];
            $('select[name^="repeat_type"]').each(function(i) {
                repeat_type[i] = $(this).val();
            });
            repeat_type = repeat_type.filter(Boolean);

            let threshold_amount = [];
            $('input[name^="threshold_amount"]').each(function(i) {
                threshold_amount[i] = $(this).val();
            });
            threshold_amount = threshold_amount.filter(Boolean);

            let repeat_amount = [];
            $('input[name^="repeat_amount"]').each(function(i) {
                repeat_amount[i] = $(this).val();
            });
            repeat_amount = repeat_amount.filter(Boolean);
            let internal_number = { internal_number: $('input[name=company_number]').val() };
            let internal_numberJSON = JSON.stringify(internal_number);

            var data = new FormData();
            data.append( "title", $('input[name=title]').val());
            data.append( "number", $('input[name=number]').val());
            data.append( "applicability_airplane", JSON.stringify($('#applicability_airplane').val()));
            data.append( "estimation_manhour", $('input[name=manhour]').val());
            data.append( "engineer_quantity", $('input[name=engineer_quantity]').val());
            data.append( "helper_quantity", $('input[name=helper_quantity]').val());
            data.append( "description", $('#instruction').val());
            data.append( "document_library", JSON.stringify($('#document-library').val()));
            data.append( "additionals",  internal_numberJSON);

            data.append('_method', 'PUT');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/preliminary/' + taskcard_uuid + '/',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.errors) {
                        if (response.errors.title) {
                            $('#title-error').html(response.errors.title[0]);
                        }

                        if (response.errors.number) {
                            $('#number-error').html(response.errors.number[0]);
                        }

                        if (response.errors.applicability_airplane) {
                            $('#applicability-airplane-error').html(response.errors.applicability_airplane[0]);
                        }

                        if (response.errors.manhour) {
                            $('#manhour-error').html(response.errors.manhour[0]);
                        }

                        if (response.errors.description) {
                            $('#instruction-error').html(response.errors.description[0]);
                        }


                        document.getElementById('title').value = data.getAll('title');
                        document.getElementById('number').value = data.getAll('number');
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        $('#applicability_airplane').select2('val', 'All');
                        document.getElementById('work_area').value = work_area;
                        $('#work_area').select2('val', 'All');
                        document.getElementById('manhour').value = data.getAll('manhour');
                        document.getElementById('helper_quantity').value = data.getAll('helper_quantity');
                        document.getElementById('engineer_quantity').value = data.getAll('engineer_quantity');
                        document.getElementById('instruction').value = data.getAll('instruction');

                    } else {
                        //    taskcard_reset();


                        toastr.success('Taskcard has been updated.', 'Success', {
                            timeOut: 5000
                        });

                    }
                }
            });
        });

        // Category

    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
