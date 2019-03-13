let TaskCard = {
    init: function () {
        $('.instruction_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-eo/'+taskcard_uuid+'/eo-instructions',
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
            columns: [
                {
                    field: 'work_area',
                    title: 'Work Area',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'engineer_quantity',
                    title: 'Engineer Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'helper_quantity',
                    title: 'Helper Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'is_rii',
                    title: 'Rii?',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        var e = {
                            1: {
                                title: "Yes",
                                class: "m-badge--brand"
                            },
                            0: {
                                title: "No",
                                class: " m-badge--warning"
                            }
                        };

                        return '<span class="m-badge ' + e[t.is_rii].class + ' m-badge--wide">' + e[t.is_rii].title + "</span>"
                    }

                },
                {
                    field: 'performance_factor',
                    title: 'Performance Factor',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'sequence',
                    title: 'Sequence',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '1',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_material" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                        );
                    }

                },
                {
                    field: '2',
                    title: 'Tool',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_instruction" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-instruction_uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.add-instruction').on('click', function () {
            let work_area = $('#work_area').val();
            let manhour = $('input[name=manhour]').val();
            let performa = $('input[name=performa]').val();
            let helper_quantity = $('input[name=helper_quantity]').val();
            let engineer_quantity = $('input[name=engineer_quantity]').val();
            let sequence = $('input[name=sequence]').val();
            let otr_certification = $('#otr_certification').val();
            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-eo/'+taskcard_uuid+'/eo-instruction',
                data: {
                    _token: $('input[name=_token]').val(),
                    work_area: work_area,
                    estimation_manhour: manhour,
                    performance_factor: performa,
                    helper_quantity: helper_quantity,
                    engineer_quantity: engineer_quantity,
                    sequence: sequence,
                    skill_id: otr_certification,
                    is_rii: is_rii,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.item_id) {
                        //     $('#material-error').html(data.errors.item_id[0]);
                        // }

                        // if (data.errors.quantity) {
                        //     $('#quantity_item-error').html(data.errors.quantity[0]);
                        // }

                        if (data.errors.work_area) {
                            $('#work_area-error').html(data.errors.work_area[0]);
                        }

                        if (data.errors.performance_factor) {
                            $('#performa-error').html(data.errors.performance_factor[0]);
                        }

                        if (data.errors.estimation_manhour) {
                            $('#manhour-error').html(data.errors.estimation_manhour[0]);
                        }

                        if (data.errors.helper_quantity) {
                            $('#helper_quantity-error').html(data.errors.helper_quantity[0]);
                        }

                        if (data.errors.engineer_quantity) {
                            $('#engineer_quantity-error').html(data.errors.engineer_quantity[0]);
                        }

                        if (data.errors.sequence) {
                            $('#sequence-error').html(data.errors.sequence[0]);
                        }

                        if (data.errors.skill_id) {
                            $('#otr_certification-error').html(data.errors.skill_id[0]);
                        }

                        document.getElementById('work_area').value = work_area;
                        document.getElementById('engineer_quantity').value = engineer_quantity;
                        document.getElementById('manhour').value = manhour;
                        document.getElementById('performa').value = performa;
                        document.getElementById('helper_quantity').value = helper_quantity;
                        document.getElementById('skill_id').value = otr_certification;
                        document.getElementById('sequence').value = sequence;
                        // document.getElementById('material').value = material;
                        // document.getElementById('quantity').value = quantity;

                    } else {

                        toastr.success('Instruction has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.instruction_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                        $('#modal_instruction').modal('hide');
                    }
                }
            });
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

        let material_datatables_init = true;
        let triggeruuid ="";
        let material = $('.instruction_datatable').on('click', '.material', function () {
            if(material_datatables_init == true){
                material_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                EO_item(triggeruuid);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_item').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                EO_item(triggeruuid);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
        });

        let tool_datatables_init = true;
        let triggeruuid2 ="";
        let tool = $('.instruction_datatable').on('click', '.tool', function () {
            if(tool_datatables_init == true){
                tool_datatables_init = false;
                triggeruuid2 = $(this).data('uuid');
                EO_tool(triggeruuid2);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_tool').DataTable();
                table.destroy();
                triggeruuid2 = $(this).data('uuid');
                EO_tool(triggeruuid2);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
        });

        $('.add-item').on('click', function () {
            let quantity = $('input[name=quantity_item]').val();
            let material = $('#material').val();
            let unit_material = $('#unit_material').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-eo/eo-instruction/'+triggeruuid+'/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: material,
                    quantity: quantity,
                    unit_id: unit_material,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.item_id) {
                        //     $('#material-error').html(data.errors.item_id[0]);
                        // }

                        // if (data.errors.quantity) {
                        //     $('#quantity_item-error').html(data.errors.quantity[0]);
                        // }
                        // document.getElementById('material').value = material;
                        // document.getElementById('quantity').value = quantity;

                    } else {

                        toastr.success('Material has been created.', 'Success', {
                            timeOut: 5000
                        });

                        $('#m_datatable_item').DataTable().ajax.reload();

                        $('#add_modal_material').modal('hide');

                    }
                }
            });
        });

        let edit = $('.instruction_datatable').on('click', '.edit', function () {
            $('#work_area').select2('val', 'All');
            $('#otr_certification').select2('val', 'All');
            document.getElementById('manhour').value = '';
            document.getElementById('performa').value = '';
            document.getElementById('helper_quantity').value = '';
            document.getElementById('engineer_quantity').value = '';
            document.getElementById('sequence').value = '';
            $('#work_area-error').html('');
            $('#otr-certification-error').html('');
            $('#manhour-error').html('');
            $('#performa-error').html('');
            $('#helper_quantity-error').html('');
            $('#engineer_quantity-error').html('');
            $('#sequence-error').html('');
            $('input[type=checkbox]').prop('checked', false);


            let triggeruuid3 = $(this).data('instruction_uuid');
            // alert(triggeruuid3);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/taskcard-eo/'+taskcard_uuid+'/eo-instruction/'+triggeruuid3+'/edit/',
                success: function (data) {
                    document.getElementById('manhour').value = data.estimation_manhour;
                    document.getElementById('performa').value = data.performance_factor;
                    document.getElementById('helper_quantity').value = data.helper_quantity;
                    document.getElementById('engineer_quantity').value = data.engineer_quantity;
                    document.getElementById('sequence').value = data.sequence;
                    $.ajax({
                        url: '/get-work-areas/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data2) {
                            $('select[name="work_area"]').empty();
                            $.each(data2, function (key, value) {
                                if(key == data.work_area){
                                    $('select[name="work_area"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="work_area"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    );
                                }
                            });
                        }
                    });
                    $.ajax({
                        url: '/get-otr-certifications/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data3) {
                            $('select[name="otr_certification"]').empty();
                            $.each(data3, function (key2, value2) {
                                if(key2 == data.skill_id){
                                    $('select[name="otr_certification"]').append(
                                        '<option value="' + key2 + '" selected>' + value2 + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="otr_certification"]').append(
                                        '<option value="' + key2 + '">' + value2 + '</option>'
                                    );
                                }
                            });
                        }
                    });


                    // alert(data.uuid);
                    // document.getElementById('uuid').value = data.uuid;
                    // document.getElementById('name').value = data.name;
                    // document.getElementById('symbol').value = data.symbol;
                }
            });

        });

        $('.add-tool').on('click', function () {
            let quantity = $('input[name=quantity]').val();
            let tool = $('#tool').val();
            let unit_tool = $('#unit_tool').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-eo/eo-instruction/'+triggeruuid2+'/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: tool,
                    quantity: quantity,
                    unit_id: unit_tool,
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

                        toastr.success('Tool has been created.', 'Success', {
                            timeOut: 5000
                        });

                        $('#m_datatable_tool').DataTable().ajax.reload();

                        $('#add_modal_tool').modal('hide');
                        // document.getElementById('uom_quantity').value = '';

                        // $('#item_unit_id').select2('val', 'All');


                    }
                }
            });
        });
        let remove = $('.instruction_datatable').on('click', '.delete', function () {
            let triggeruuid = $(this).data('uuid');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/taskcard-eo/'+taskcard_uuid+'/eo-instruction/'+ triggeruuid + '/',
                        success: function (data) {
                            toastr.success('Instruction has been deleted.', 'Deleted', {
                                timeOut: 5000
                            }
                        );

                            let table = $('.instruction_datatable').mDatatable();

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

    }
};
$(document).ready(function () {

    $('select[name="recurrence_id"]').on('change', function () {
        if (this.options[this.selectedIndex].text == "Repetitive") {
        $("#recurrence_div").removeClass("hidden");
        $('#recurrence').removeAttr("disabled");
        $('#recurrence-select').removeAttr("disabled");
        } else {
            $("#recurrence_div").addClass("hidden");
            $('#recurrence').prop("disabled", true);
            $('#recurrence-select').prop("disabled", true);
        }
    });

    $('select[name="scheduled_priority_id"]').on('change', function () {
        if (this.options[this.selectedIndex].text == "Prior to") {
        $("#prior_to").removeClass("hidden");
        $('#prior_to_date').removeAttr("disabled");
        $('#prior_to_hours').removeAttr("disabled");
        $('#prior_to_cycle').removeAttr("disabled");
        } else {
            $("#prior_to").addClass("hidden");
            $('#prior_to_date').prop('checked', false);
            $('#prior_to_date').prop("disabled", true);
            $('#prior_to_hours').prop('checked', false);
            $('#prior_to_hours').prop("disabled", true);
            $('#prior_to_cycle').prop('checked', false);
            $('#prior_to_cycle').prop("disabled", true);
            $('#date').prop("disabled", true);
            $('#hour').prop("disabled", true);
            $('#cycle').prop("disabled", true);
        }
    });

    $('select[name="manual_affected_id"]').on('change', function () {
        if (this.options[this.selectedIndex].text == "Other") {
        $("#note_div").removeClass("hidden");
        $('#note').removeAttr("disabled");
        } else {
            $('#note').prop("disabled", true);
            $("#note_div").addClass("hidden");
        }
    });

    var scheduled_priority_id = $('select[name="scheduled_priority_id"]').val();
    var recurrence_id = $('select[name="recurrence_id"]').val();
    var manual_affected_id = $('select[name="manual_affected_id"]').val();

    if(manual_affected_id == 66){
        $("#note_div").removeClass("hidden");
        $('#note').removeAttr("disabled");
    }
    if(recurrence_id == 69){
        $("#note_div").removeClass("hidden");
        $('#note').removeAttr("disabled");
    }
    if(scheduled_priority_id == 77){
        $("#note_div").removeClass("hidden");
        $('#note').removeAttr("disabled");
    }

    // console.log(manual_affected_id);
    // console.log(recurrence_id);
    // console.log(scheduled_priority_id);



});

jQuery(document).ready(function () {
    TaskCard.init();
});
