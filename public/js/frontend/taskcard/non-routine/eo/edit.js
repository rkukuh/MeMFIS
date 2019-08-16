
let TaskCard = {
    init: function () {
        let taskcard_uuid = $('#uuid_taskcard').val();
        $('.instruction_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-eo/' + taskcard_uuid + '/eo-instructions',
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
                    field: 'workarea_name',
                    title: 'Work Area',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'skill',
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

        $('.threshold_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/' + taskcard_uuid + '/thresholds',
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
                        url: '/datatables/taskcard-routine/' + taskcard_uuid + '/repeats',
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
            let taskcard_uuid = $('#uuid_taskcard').val();
            let amount = $('input[name=threshold_amount]').val();
            let threshold_type = $('#threshold_type').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine/' + taskcard_uuid + '/threshold',
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
            let taskcard_uuid = $('#uuid_taskcard').val();
            let amount = $('input[name=repeat_amount]').val();
            let repeat_type = $('#repeat_type').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-routine/' + taskcard_uuid + '/repeat',
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

        // $('.threshold_datatable').mDatatable({
        //     data: {
        //         type: 'remote',
        //         source: {
        //             read: {
        //                 method: 'GET',
        //                 url: '/datatables/taskcard-routine/'+taskcard_uuid+'/thresholds',
        //                 map: function (raw) {
        //                     let dataSet = raw;

        //                     if (typeof raw.data !== 'undefined') {
        //                         dataSet = raw.data;
        //                     }

        //                     return dataSet;
        //                 }
        //             }
        //         },
        //         pageSize: 10,
        //         perpage: 5,
        //         serverPaging: !0,
        //         serverFiltering: !0,
        //         serverSorting: !0
        //     },
        //     layout: {
        //         theme: 'default',
        //         class: '',
        //         scroll: false,
        //         footer: !1
        //     },
        //     sortable: !0,
        //     filterable: !1,
        //     pagination: !0,
        //     search: {
        //         input: $('#generalSearch')
        //     },
        //     toolbar: {
        //         items: {
        //             pagination: {
        //                 pageSizeSelect: [5, 10, 20, 30, 50, 100]
        //             }
        //         }
        //     },
        //     columns: [
        //         {
        //             field: 'amount',
        //             title: 'Amount',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'type_id',
        //             title: 'Type',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'actions',
        //             sortable: !1,
        //             overflow: 'visible',
        //             template: function (t, e, i) {
        //                 return (
        //                     '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-threshold" title="Delete" ' +
        //                     'data-threshold_uuid="' + t.uuid + '">' +
        //                     '<i class="la la-trash"></i>' +
        //                     '</a>'
        //                 );
        //             }
        //         }
        //     ]
        // });

        // $('.repeat_datatable').mDatatable({
        //     data: {
        //         type: 'remote',
        //         source: {
        //             read: {
        //                 method: 'GET',
        //                 url: '/datatables/taskcard-routine/'+taskcard_uuid+'/repeats',
        //                 map: function (raw) {
        //                     let dataSet = raw;

        //                     if (typeof raw.data !== 'undefined') {
        //                         dataSet = raw.data;
        //                     }

        //                     return dataSet;
        //                 }
        //             }
        //         },
        //         pageSize: 10,
        //         perpage: 5,
        //         serverPaging: !0,
        //         serverFiltering: !0,
        //         serverSorting: !0
        //     },
        //     layout: {
        //         theme: 'default',
        //         class: '',
        //         scroll: false,
        //         footer: !1
        //     },
        //     sortable: !0,
        //     filterable: !1,
        //     pagination: !0,
        //     search: {
        //         input: $('#generalSearch')
        //     },
        //     toolbar: {
        //         items: {
        //             pagination: {
        //                 pageSizeSelect: [5, 10, 20, 30, 50, 100]
        //             }
        //         }
        //     },
        //     columns: [
        //         {
        //             field: 'amount',
        //             title: 'Amount',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'type_id',
        //             title: 'Type',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'actions',
        //             sortable: !1,
        //             overflow: 'visible',
        //             template: function (t, e, i) {
        //                 return (
        //                     '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill repeat-delete" title="Delete" ' +
        //                     'data-repeat_uuid="' + t.uuid + '">' +
        //                     '<i class="la la-trash"></i>' +
        //                     '</a>'
        //                 );
        //             }
        //         }
        //     ]
        // });

        // $('.add-threshold').on('click', function () {
        //     let amount = $('input[name=threshold_amount]').val();
        //     let threshold_type = $('#threshold_type').val();

        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type: 'post',
        //         url: '/taskcard-routine/'+taskcard_uuid+'/threshold',
        //         data: {
        //             _token: $('input[name=_token]').val(),
        //             amount: amount,
        //             type_id: threshold_type,
        //         },
        //         success: function (data) {
        //             if (data.errors) {
        //                 // if (data.errors.item_id) {
        //                 //     $('#tool-error').html(data.errors.item_id[0]);
        //                 // }

        //                 // if (data.errors.quantity) {
        //                 //     $('#quantity-error').html(data.errors.quantity[0]);
        //                 // }
        //                 // document.getElementById('tool').value = tool;
        //                 // document.getElementById('quantity').value = quantity;
        //             } else {

        //                 toastr.success('Threshold has been created.', 'Success', {
        //                     timeOut: 5000
        //                 });

        //                 let table = $('.threshold_datatable').mDatatable();

        //                 table.originalDataSet = [];
        //                 table.reload();

        //                 $('#modal_threshold').modal('hide');

        //             }
        //         }
        //     });
        // });

        // $('.add-repeat').on('click', function () {
        //     let amount = $('input[name=repeat_amount]').val();
        //     let repeat_type = $('#repeat_type').val();

        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type: 'post',
        //         url: '/taskcard-routine/'+taskcard_uuid+'/repeat',
        //         data: {
        //             _token: $('input[name=_token]').val(),
        //             amount: amount,
        //             type_id: repeat_type,
        //         },
        //         success: function (data) {
        //             if (data.errors) {
        //                 // if (data.errors.item_id) {
        //                 //     $('#tool-error').html(data.errors.item_id[0]);
        //                 // }

        //                 // if (data.errors.quantity) {
        //                 //     $('#quantity-error').html(data.errors.quantity[0]);
        //                 // }
        //                 // document.getElementById('tool').value = tool;
        //                 // document.getElementById('quantity').value = quantity;
        //             } else {

        //                 toastr.success('Repeat has been created.', 'Success', {
        //                     timeOut: 5000
        //                 });

        //                 let table = $('.repeat_datatable').mDatatable();

        //                 table.originalDataSet = [];
        //                 table.reload();

        //                 $('#modal_repeat').modal('hide');

        //             }
        //         }
        //     });
        // });

        let material_datatables_init = true;
        let triggeruuid = "";
        let material = $('.instruction_datatable').on('click', '.material', function () {
            if (material_datatables_init == true) {
                material_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                EO_item(triggeruuid);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
            else {
                let table = $('#m_datatable_item').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                EO_item(triggeruuid);
                $('#m_datatable_item').DataTable().ajax.reload();
            }
        });

        let tool_datatables_init = true;
        let triggeruuid2 = "";
        let tool = $('.instruction_datatable').on('click', '.tool', function () {
            if (tool_datatables_init == true) {
                tool_datatables_init = false;
                triggeruuid2 = $(this).data('uuid');
                EO_tool(triggeruuid2);
                $('#m_datatable_tool').DataTable().ajax.reload();
            }
            else {
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
            let remark_item = $('#remark_item').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-eo/eo-instruction/' + triggeruuid + '/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: material,
                    quantity: quantity,
                    unit_id: unit_material,
                    note: remark_item,
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
                        material_modal_reset();
                    }
                }
            });
        });
        $('.instruction_datatable').on('click', '.edit', function () {
            instruction_reset();
            save_changes_button();
            let taskcard_uuid = $('#uuid_taskcard').val();

            let triggeruuid3 = $(this).data('instruction_uuid');
            // alert(triggeruuid3);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/taskcard-eo/' + taskcard_uuid + '/eo-instruction/' + triggeruuid3 + '/edit/',
                success: function (data) {
                    document.getElementById('manhour').value = data.estimation_manhour;
                    document.getElementById('performa').value = data.performance_factor;
                    document.getElementById('helper_quantity').value = data.helper_quantity;
                    document.getElementById('engineer_quantity').value = data.engineer_quantity;
                    document.getElementById('sequence').value = data.sequence;
                    document.getElementById('uuid').value = data.uuid;
                    if (data.is_rii == 1) {
                        $("#is_rii").prop("checked", true);
                    }
                    else if (data.is_rii == 0) {
                        $("#is_rii").prop("checked", false);
                    }

                    $.ajax({
                        url: '/get-work-areas/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data2) {
                            $('select[name="work_area"]').empty();
                            $.each(data2, function (key, value) {
                                if (key == data.work_area) {
                                    $('select[name="work_area"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else {
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
                                if (key2 == data.skill_id) {
                                    $('select[name="otr_certification"]').append(
                                        '<option value="' + key2 + '" selected>' + value2 + '</option>'
                                    );
                                }
                                else {
                                    $('select[name="otr_certification"]').append(
                                        '<option value="' + key2 + '">' + value2 + '</option>'
                                    );
                                }
                            });
                        }
                    });
                }
            });

        });
        $('.modal-footer').on('click', '.edit-instruction', function () {
            let taskcard_uuid = $('#uuid_taskcard').val();
            let eo_uuid = $('input[name=uuid]').val();
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
                type: 'put',
                url: '/taskcard-eo/' + taskcard_uuid + '/eo-instruction/' + eo_uuid + '/',
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
                        instruction_reset();
                    }
                }
            });

        });

        $('.modal-footer-instruction').on('click', '.add-instruction', function () {
            let taskcard_uuid = $('#uuid_taskcard').val();
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
                url: '/taskcard-eo/' + taskcard_uuid + '/eo-instruction',
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
                        instruction_reset();
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
                url: '/taskcard-eo/eo-instruction/' + triggeruuid2 + '/item',
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
        $('.threshold_datatable').on('click', '.delete-threshold', function () {
            let taskcard_uuid = $('#uuid_taskcard').val();
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
                        url: '/taskcard-routine/' + taskcard_uuid + '/' + threshold_uuid + '/threshold/',
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
            let taskcard_uuid = $('#uuid_taskcard').val();
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
                        url: '/taskcard-routine/' + taskcard_uuid + '/' + repeat_uuid + '/repeat/',
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
        let remove = $('.instruction_datatable').on('click', '.delete', function () {
            let taskcard_uuid = $('#uuid_taskcard').val();
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
                            url: '/taskcard-eo/' + taskcard_uuid + '/eo-instruction/' + triggeruuid + '/',
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

jQuery(document).ready(function () {
    TaskCard.init();
});

$(document).ready(function () {

    $('#prior_to_date').on('click', function () {
        $('#date').removeAttr("disabled");
        $('#hour').prop("disabled", true);
        $('#cycle').prop("disabled", true);
    });
    $('#prior_to_hours').on('click', function () {
        $('#hour').removeAttr("disabled");
        $('#date').prop("disabled", true);
        $('#cycle').prop("disabled", true);
    });
    $('#prior_to_cycle').on('click', function () {
        $('#cycle').removeAttr("disabled");
        $('#date').prop("disabled", true);
        $('#hour').prop("disabled", true);
    });

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
});



$('.footer').on('click', '.add-taskcard', function () {
    let applicability_airplane = [];
    let i = 0;
    $("#applicability_airplane").val().forEach(function (entry) {
        applicability_airplane[i] = entry;
        i++;
    });

    let threshold_type = [];
    $('select[name^="threshold_type"]').each(function (i) {
        threshold_type[i] = $(this).val();
    });
    threshold_type = threshold_type.filter(Boolean);

    let repeat_type = [];
    $('select[name^="repeat_type"]').each(function (i) {
        repeat_type[i] = $(this).val();
    });
    repeat_type = repeat_type.filter(Boolean);

    let threshold_amount = [];
    $('input[name^="threshold_amount"]').each(function (i) {
        threshold_amount[i] = $(this).val();
    });
    threshold_amount = threshold_amount.filter(Boolean);

    let repeat_amount = [];
    $('input[name^="repeat_amount"]').each(function (i) {
        repeat_amount[i] = $(this).val();
    });
    repeat_amount = repeat_amount.filter(Boolean);
    let internal_number = { internal_number: $('input[name=company_number]').val() };
    let internal_numberJSON = JSON.stringify(internal_number);

    let data = new FormData();
    data.append("title", $('input[name=title]').val());
    data.append("number", $('input[name=number]').val());
    data.append("type_id", $('#taskcard_non_routine_type').val());
    data.append("applicability_airplane", JSON.stringify($('#applicability_airplane').val()));
    data.append("revision", $('input[name=revision]').val());
    data.append("threshold_amount", JSON.stringify(threshold_amount));
    data.append("reference", $('input[name=reference]').val());
    data.append("description", $('#description').val());
    data.append("scheduled_priority_id", $('#scheduled_priority_id').val());
    data.append("scheduled_priority_type", $('input[name=prior_to]:checked').val());
    if ($('input[name=prior_to]:checked').val() == 'date') {
        data.append("scheduled_priority_text", $('#date').val());
    }
    else if ($('input[name=prior_to]:checked').val() == 'hour') {
        data.append("scheduled_priority_text", $('#hour').val());
    }
    else if ($('input[name=prior_to]:checked').val() == 'cycle') {
        data.append("scheduled_priority_text", $('#cycle').val());
    }
    data.append("recurrence_id", $('#recurrence_id').val());
    data.append("recurrence_amount", $('input[name=recurrence]').val());
    data.append("recurrence_type", $('#recurrence-select').val());
    data.append("manual_affected_id", $('#manual_affected_id').val());
    data.append("manual_affected", $('#note').val());
    data.append("threshold_type", JSON.stringify(threshold_type));
    data.append("repeat_type", JSON.stringify(repeat_type));
    data.append("threshold_amount", JSON.stringify(threshold_amount));
    data.append("repeat_amount", JSON.stringify(repeat_amount));
    data.append("category_id", $('#category').val());
    data.append("additionals",  internal_numberJSON);
    data.append("document_library", JSON.stringify($('#document-library').val()));
    data.append("fileInput", document.getElementById('taskcard').files[0]);
    data.append('_method', 'PUT');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/taskcard-eo/' + taskcard_uuid + '/',
        processData: false,
        contentType: false,
        cache: false,
        data: data,
        success: function (data) {
            if (data.errors) {
                if (data.errors.title) {
                    $('#title-error').html(data.errors.title[0]);
                }

                if (data.errors.number) {
                    $('#number-error').html(data.errors.number[0]);
                }

                if (data.errors.taskcard) {
                    $('#taskcard-error').html(data.errors.taskcard[0]);
                }

                if (data.errors.otr_certification) {
                    $('#otr-certification-error').html(data.errors.otr_certification[0]);
                }

                if (data.errors.threshold_type) {
                    $('#threshold-type-error').html(data.errors.threshold_type[0]);
                }

                if (data.errors.threshold_amount) {
                    $('#threshold-amount-error').html(data.errors.threshold_amount[0]);
                }

                if (data.errors.repeat_type) {
                    $('#repeat-type-error').html(data.errors.repeat_type[0]);
                }

                if (data.errors.repeat_amount) {
                    $('#repeat-amount-error').html(data.errors.repeat_amount[0]);
                }

                if (data.errors.zone) {
                    $('#zone-error').html(data.errors.zone[0]);
                }

                if (data.errors.access) {
                    $('#access-error').html(data.errors.access[0]);
                }

                if (data.errors.applicability_airplane) {
                    $('#applicability-airplane-error').html(data.errors.applicability_airplane[0]);
                }

                if (data.errors.applicability_engine) {
                    $('#applicability-engine-error').html(data.errors.applicability_engine[0]);
                }

                if (data.errors.work_area) {
                    $('#work-area-error').html(data.errors.work_area[0]);
                }

                if (data.errors.revision) {
                    $('#revision-error').html(data.errors.revision[0]);
                }

                if (data.errors.taskcard_non_routine_type) {
                    $('#taskcard_non_routine_type-error').html(data.errors.taskcard_non_routine_type[0]);
                }

                if (data.errors.category) {
                    $('#category-error').html(data.errors.category[0]);
                }

                if (data.errors.scheduled_priority_id) {
                    $('#scheduled_priority_id-error').html(data.errors.scheduled_priority_id[0]);
                }

                if (data.errors.recurrence_id) {
                    $('#recurrence_id-error').html(data.errors.recurrence_id[0]);
                }

                if (data.errors.manual_affected_id) {
                    $('#manual_affected_id-error').html(data.errors.manual_affected_id[0]);
                }

                document.getElementById('title').value = title;
                document.getElementById('number').value = number;
                document.getElementById('threshold_amount').value = threshold_amount;
                document.getElementById('repeat_amount').value = repeat_amount;
                document.getElementById('source').value = source;
                document.getElementById('effectifity').value = effectifity;
                document.getElementById('zone').value = zone;
                document.getElementById('access').value = access;
                document.getElementById('applicability_airplane').value = applicability_airplane;
                document.getElementById('revision').value = revision;
                document.getElementById('taskcard_non_routine_type').value = taskcard_non_routine_type;
                document.getElementById('category').value = category;
                document.getElementById('scheduled_priority_id').value = scheduled_priority_id;
                document.getElementById('recurrence_id').value = recurrence_id;
                document.getElementById('manual_affected_id').value = manual_affected_id;

            } else {
                //    taskcard_reset();


                toastr.success('Taskcard has been created.', 'Success', {
                    timeOut: 5000
                });

                // window.location.href = '/taskcard-eo/'+data.uuid+'/edit';
            }
        }
    });
});

