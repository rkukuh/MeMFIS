let TaskCard = {
    init: function () {
        $('.tool_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/'+taskcard_uuid+'/tools',
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
            columns: [{
                field: 'code',
                title: 'PN',
                sortable: 'asc',
                filterable: !1,
                },
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

        $('.tool_datatable').on('click', '.tool-delete', function () {
            let item_uuid = $(this).data('item_uuid');
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
                        url: '/taskcard-routine/' + taskcard_uuid + '/' + item_uuid+'/item/',
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
                        url: '/taskcard-routine/' + taskcard_uuid + '/' + item_uuid+'/item/',
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

        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/'+taskcard_uuid+'/materials',
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
                    field: 'code',
                    title: 'PN',
                    sortable: 'asc',
                    filterable: !1,
                },
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

        $('.add-item').on('click', function () {
            let quantity = $('#quantity_material').val();
            let material = $('#material').val();
            let unit_material = $('#unit_material').val();
            let remark_material = $('#remark_material').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine/'+taskcard_uuid+'/item',
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
                        document.getElementById('quantity_item').value = quantity;

                    } else {

                        toastr.success('Material has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.item_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                        $('#modal_item').modal('hide');

                    }
                }
            });
        });
        $('.add-tool').on('click', function () {
            let quantity = $('#quantity_tool').val();
            let tool = $('#tool').val();
            let unit_tool = $('#unit_tool').val();
            let remark_tool = $('#remark_tool').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine/'+taskcard_uuid+'/item',
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
                        document.getElementById('quantity_tool').value = quantity;
                    } else {

                        toastr.success('Tool has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.tool_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        $('#modal_tool').modal('hide');

                    }
                }
            });
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

        $(document).ready(function () {
            $('.reset-item').removeClass('reset');
        });

        $('.footer').on('click', '.reset', function () {
            window.location.href = '/taskcard/1/edit';
        });

        $('.reset-item').on('click', function () {
            document.getElementById('quantity').value = '';

            $('#item').select2('val', 'All');
            $('#item_unit_id').select2('val', 'All');

            $('#item-error').html('');
            $('#quantity-error').html('');
            $('#unit-error').html('');

        });


        $(document).ready(function () {

            $('.btn-success').removeClass('add');
        });

        $('.footer').on('click', '.reset', function () {
            taskcard_reset();
        });


        $('.footer').on('click', '.edit-taskcard', function () {
            let status = true;
            let access = [];
            let i = 0;
            $("#access").val().forEach(function(entry) {
                access[i] = entry;
                i++;
            });

            let applicability_airplane = [];
            i = 0;
            $("#applicability_airplane").val().forEach(function(entry) {
                applicability_airplane[i] = entry;
                i++;
            });
            let zone = [];
            i = 0;
            $("#zone").val().forEach(function(entry) {
                zone[i] = entry;
                i++;
            });

            let relationship = [];
            i = 0;
            $("#relationship").val().forEach(function(entry) {
                relationship[i] = entry;
                i++;
            });

            let threshold_type = [];
            $('select[name^="threshold_type"]').each(function(i) {
                // if($(this).val() == 'Select'){
                    // $(this).siblings(".select2-container").css('border', '5px solid red');
                    // status = false;
                // }else{
                    // $(this).siblings(".select2-container").css('border', '2px grey');
                    threshold_type[i] = $(this).val();
                // }
            });
            threshold_type = threshold_type.filter(Boolean);

            let repeat_type = [];
            $('select[name^="repeat_type"]').each(function(i) {
                // if($(this).val() == 'Select'){
                    // $(this).siblings(".select2-container").css('border', '5px solid red');
                    // status = false;
                // }else{
                    // $(this).siblings(".select2-container").css('border', '2px grey');
                    repeat_type[i] = $(this).val();
                // }
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

            let sections = [];
            i = 0;
            $("#section").val().forEach(function(entry) {
                sections[i] = entry;
                i++;
            });
            console.log(sections);

            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }

            if(status == false){
                return $status;
            }
            let internal_number = { internal_number: $('input[name=company_number]').val() };
            let internal_numberJSON = JSON.stringify(internal_number);

            let data = new FormData();
            data.append("title", $('input[id=title]').val());
            data.append("number", $('input[id=number]').val());
            data.append("type_id", $('#taskcard_routine_type').val());
            data.append("applicability_airplane", JSON.stringify(applicability_airplane));
            data.append("task_id", $('#task_type_id').val());
            data.append("skill_id", $('#otr_certification').val());
            data.append("estimation_manhour", $('#manhour').val());
            data.append("performance_factor", $('input[name=performa]').val());
            data.append("helper_quantity", $('input[name=helper_quantity]').val());
            data.append("engineer_quantity", $('input[name=engineer_quantity]').val());
            data.append("work_area", $('#work_area').val());
            data.append("access", JSON.stringify(access));
            data.append("zone", JSON.stringify(zone));
            data.append("source", $('input[name=source]').val());
            data.append("relationship", JSON.stringify(relationship));
            data.append("version", JSON.stringify($('#version').val()));
            data.append("document_library", JSON.stringify($('#document-library').val()));
            data.append("effectivity", $('input[name=effectivity]').val());
            data.append("description", $('#description').val());
            data.append("document", $('#document').val());
            data.append("threshold_type", JSON.stringify(threshold_type));
            data.append("repeat_type", JSON.stringify(repeat_type));
            data.append("threshold_amount", JSON.stringify(threshold_amount));
            data.append("repeat_amount", JSON.stringify(repeat_amount));
            data.append("is_rii", is_rii);
            data.append("additionals",  internal_numberJSON);
            data.append("ata", $('input[name=ata]').val());
            data.append("reference", $('#service_bulletin').val());
            data.append("stringer", JSON.stringify($('#stringer').val()));
            data.append("station", $('#station').val());
            data.append("section", JSON.stringify(sections));
            data.append("fileInput", document.getElementById('taskcard').files[0]);
            data.append('_method', 'PUT');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine/' + taskcard_uuid ,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    if (response.errors) {
                        if (response.errors.title) {
                            $('#title-error').html(response.errors.title[0]);
                        }

                        if (response.errors.number) {
                            $('#number-error').html(response.errors.number[0]);
                        }

                        if (response.errors.type_id) {
                            $('#taskcard_routine_type-error').html(response.errors.type_id[0]);
                        }

                        if (response.errors.skill_id) {
                            $('#otr-certification-error').html(response.errors.skill_id[0]);
                        }

                        if (response.errors.applicability_airplane) {
                            $('#applicability-airplane-error').html(response.errors.applicability_airplane[0]);
                        }

                        if (response.errors.task_id) {
                            $('#task_type_id-error').html(response.errors.task_id[0]);
                        }

                        if (response.errors.manhour) {
                            $('#manhour-error').html(response.errors.manhour[0]);
                        }

                        if (response.errors.performance_factor) {
                            $('#performa-error').html(response.errors.performance_factor[0]);
                        }

                        // document.getElementById('title').value = "";
                        // document.getElementById('number').value = "";
                        // document.getElementById('taskcard_routine_type').value = taskcard_routine_type;
                        // document.getElementById('applicability_airplane').value = applicability_airplane;
                        // $('#applicability_airplane').select2('val', 'All');
                        // document.getElementById('task_type_id').value = task_type_id;
                        // document.getElementById('otr_certification').value = otr_certification;
                        // document.getElementById('manhour').value = manhour;
                        // document.getElementById('performa').value = performa;
                        // document.getElementById('helper_quantity').value = helper_quantity;
                        // document.getElementById('work_area').value = work_area;
                        // $('#work_area').select2('val', 'All');
                        // document.getElementById('access').value = access;
                        // $('#access').select2('val', 'All');
                        // document.getElementById('zone').value = zone;
                        // $('#zone').select2('val', 'All');
                        // document.getElementById('source').value = source;
                        // document.getElementById('relationship').value = relationship;
                        // $('#relationship').select2('val', 'All');
                        // document.getElementById('version').value = version;
                        // $('#version').select2('val', 'All');
                        // document.getElementById('effectivity').value = effectivity;
                        // document.getElementById('description').value = description;

                    } else {
                        toastr.success('Taskcard has been updated.', 'Success', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });

    }
};
$(document).ready(function () {
    let taskcard_routine_type = $('select[name="taskcard_routine_type"] option:selected').html();
    if (taskcard_routine_type.trim() == "CPCP") {
        $("#station_div").removeClass("hidden");
        $("#stringer_div").removeClass("hidden");
        $("#service_bulletin_div").removeClass("hidden");
        $("#section_div").removeClass("hidden");
    }

    $('select[name="taskcard_routine_type"]').on('change', function () {
        if (this.options[this.selectedIndex].text == "CPCP") {
        $("#station_div").removeClass("hidden");
        $("#stringer_div").removeClass("hidden");
        $("#service_bulletin_div").removeClass("hidden");
        $("#section_div").removeClass("hidden");
        document.getElementById('threshold').innerHTML = 'Implementation Age';
        } else {
            $("#station_div").addClass("hidden");
            $("#stringer_div").addClass("hidden");
            $("#service_bulletin_div").addClass("hidden");
            $("#section_div").addClass("hidden");
            document.getElementById('threshold').innerHTML = 'Threshold';

        }
    });
});
jQuery(document).ready(function () {
    TaskCard.init();
});
