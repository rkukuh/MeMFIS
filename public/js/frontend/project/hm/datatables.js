let Datatables = {
    init: function () {
        $("#basic_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-routine/basic/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-basic" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })
        $("#sip_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-routine/sip/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-sip" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })
        $("#cpcp_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-routine/cpcp/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-cpcp" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })
        $("#adsb_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-eo/adsb/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-adsb" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })
        $("#cmrawl_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-eo/cmrawl/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-cmrawl" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })
        $("#si_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/taskcard-si/si/modal",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-si" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })

        $('<a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm refresh" style="margin-left: 60%; color: white;"><span><i class="la la-refresh"></i><span>Reload</span></span> </button>').appendTo('div.dataTables_filter');
        $('.paging_simple_numbers').addClass('pull-left');
        $('.dataTables_length').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_info').addClass('margin-info');
        $('.paging_simple_numbers').addClass('padding-datatable');

        $('.dataTables_filter').on('click', '.refresh', function () {
            $('#basic_datatable').DataTable().ajax.reload();
            $('#sip_datatable').DataTable().ajax.reload();
            $('#cpcp_datatable').DataTable().ajax.reload();
            $('#adsb_datatable').DataTable().ajax.reload();
            $('#cmrawl_datatable').DataTable().ajax.reload();
            $('#si_datatable').DataTable().ajax.reload();
        });

        let material_datatables_init = true;
        let tool_datatables_init = true;
        let predecessor_datatables_init = true;
        let successor_datatables_init = true;

        $('#basic_datatable').on('click', '.select-basic', function () {
            let taskcard_uuid = $(this).data('uuid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/'+project_uuid+'/workpackage/'+workPackage_uuid+'/taskcard/'+taskcard_uuid, 
                data: {
                    _token: $('input[name=_token]').val(),
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        if (data.title == "Danger") {
                            toastr.error('Task card alrady exists!', 'Error',  {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_basic').modal('hide');

                            toastr.success('Task Card has been added.', 'Success',  {
                                timeOut: 5000
                            });

                            let table = $('.basic_datatable').mDatatable();
                            anyChanges = true;

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $('#sip_datatable').on('click', '.select-sip', function () {
            let taskcard_uuid = $(this).data('uuid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/'+project_uuid+'/workpackage/'+workPackage_uuid+'/taskcard/'+taskcard_uuid,
                data: {
                    _token: $('input[name=_token]').val(),
                    taskcard: $(this).data('uuid'),
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        if (data.title == "Danger") {
                            toastr.error('Task card alrady exists!', 'Error',  {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_sip').modal('hide');

                            toastr.success('Task Card has been added.', 'Success',  {
                                timeOut: 5000
                            });

                            let table = $('.sip_datatable').mDatatable();
                            anyChanges = true;

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $('#cpcp_datatable').on('click', '.select-cpcp', function () {
            let taskcard_uuid = $(this).data('uuid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/'+project_uuid+'/workpackage/'+workPackage_uuid+'/taskcard/'+taskcard_uuid,
                data: {
                    _token: $('input[name=_token]').val(),
                    taskcard: $(this).data('uuid'),
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        if (data.title == "Danger") {
                            toastr.error('Task card alrady exists!', 'Error',  {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_cpcp').modal('hide');

                            toastr.success('Task Card has been added.', 'Success',  {
                                timeOut: 5000
                            });

                            let table = $('.cpcp_datatable').mDatatable();
                            anyChanges = true;

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $('#adsb_datatable').on('click', '.select-adsb', function () {
            let taskcard_uuid = $(this).data('uuid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/'+project_uuid+'/workpackage/'+workPackage_uuid+'/taskcard/'+taskcard_uuid,
                data: {
                    _token: $('input[name=_token]').val(),
                    taskcard: $(this).data('uuid'),
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        if (data.title == "Danger") {
                            toastr.error('Task card alrady exists!', 'Error',  {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_ad_sb').modal('hide');

                            toastr.success('Task Card has been added.', 'Success',  {
                                timeOut: 5000
                            });

                            let table = $('.ad-sb_datatable').mDatatable();
                            anyChanges = true;

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $('#si_datatable').on('click', '.select-si', function () {
            let taskcard_uuid = $(this).data('uuid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/'+project_uuid+'/workpackage/'+workPackage_uuid+'/taskcard/'+taskcard_uuid,
                data: {
                    _token: $('input[name=_token]').val(),
                    taskcard: $(this).data('uuid'),
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        if (data.title == "Danger") {
                            toastr.error('Task card alrady exists!', 'Error',  {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_si').modal('hide');

                            toastr.success('Task Card has been added.', 'Success',  {
                                timeOut: 5000
                            });

                            let table = $('.si_datatable').mDatatable();
                            anyChanges = true;
                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $('#cmrawl_datatable').on('click', '.select-cmrawl', function () {
            let taskcard_uuid = $(this).data('uuid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/'+project_uuid+'/workpackage/'+workPackage_uuid+'/taskcard/'+taskcard_uuid,
                data: {
                    _token: $('input[name=_token]').val(),
                    taskcard: $(this).data('uuid'),
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        if (data.title == "Danger") {
                            toastr.error('Task card alrady exists!', 'Error',  {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_cmr_awl').modal('hide');

                            toastr.success('Task Card has been added.', 'Success',  {
                                timeOut: 5000
                            });

                            let table = $('.cmr-awl_datatable').mDatatable();
                            anyChanges = true;

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $('.b-t-n').on('click', '.btn-add', function () {
            if($("#predecessorBtn").length == 0) {
              } else {
                $('.add-predecessor-modal').remove();
              }
            if($("#successorBtn").length == 0) {
              } else {
                $('.add-successor-modal').remove();
              }
        });

          //Basic taskcard Datatable
          $('.basic_datatable').on('click', '.material', function () {
            if(material_datatables_init == true){
                material_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                material_tc(triggeruuid);
                $('#m_datatable_material_routine_si_wp').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_material_routine_si_wp').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                material_tc(triggeruuid);
                $('#m_datatable_material_routine_si_wp').DataTable().ajax.reload();
            }
        });


        $('.basic_datatable').on('click', '.predecessor', function () {
            if(predecessor_datatables_init == true){
                predecessor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#predecessor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
        });
        $('.basic_datatable').on('click', '.successor', function () {
            if(successor_datatables_init == true){
                successor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#successor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
        });

        $('.modal-footer').on('click', '.sequence', function () {
            triggeruuid = $('input[name=uuid]').val();
            sequence = $('input[name=sequence]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/project-hm/'+triggeruuid+'/sequence/',
                data: {
                    _token: $('input[name=_token]').val(),
                    sequence: sequence,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {
                        toastr.success('Sequence has been updated.', 'Success', {
                            timeOut: 5000
                        });
                        $('#taskcard_sequence').modal('hide');

                        let table = $('.basic_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $('.sip_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $('.cpcp_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $('.ad-sb_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $('.cmr-awl_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $('.si_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });        });
        $('.basic_datatable').on('click', '.sequence', function () {
            triggeruuid = $(this).data('uuid');
            sequence = $(this).data('sequence');

            document.getElementById('uuid').value = triggeruuid;
            document.getElementById('sequence').value = sequence;

        });
        $('.basic_datatable').on('click', '.mandatory', function () {
            triggeruuid = $(this).data('uuid');
            mandatory = $(this).data('mandatory');
            if (mandatory == 0){
                is_mandatory = 1;
            }
            else if (mandatory ==  1){
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/project-hm/'+triggeruuid+'/mandatory/',
                data: {
                    _token: $('input[name=_token]').val(),
                    is_mandatory: is_mandatory,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {
                        toastr.success('Mandatory has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.basic_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

        });

        $('.basic_datatable').on('click', '.tool', function () {
            if(tool_datatables_init == true){
                tool_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                tool_tc(triggeruuid);
                $('#m_datatable_tool_routine_si_wp').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_tool_routine_si_wp').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                tool_tc(triggeruuid);
                $('#m_datatable_tool_routine_si_wp').DataTable().ajax.reload();
            }
        });

        //SIP taskcard Datatable
        $('.sip_datatable').on('click', '.material', function () {
            if(material_datatables_init == true){
                material_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                material_tc(triggeruuid);
                $('#m_datatable_material_routine_si_wp').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_material_routine_si_wp').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                material_tc(triggeruuid);
                $('#m_datatable_material_routine_si_wp').DataTable().ajax.reload();
            }
        });

        $('.sip_datatable').on('click', '.predecessor', function () {
            if(predecessor_datatables_init == true){
                predecessor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#predecessor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
        });
        $('.sip_datatable').on('click', '.successor', function () {
            if(successor_datatables_init == true){
                successor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#successor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
        });

        $('.sip_datatable').on('click', '.tool', function () {
            if(tool_datatables_init == true){
                tool_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                tool_tc(triggeruuid);
                $('#m_datatable_tool_routine_si_wp').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_tool_routine_si_wp').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                tool_tc(triggeruuid);
                $('#m_datatable_tool_routine_si_wp').DataTable().ajax.reload();
            }
        });

        $('.sip_datatable').on('click', '.sequence', function () {
            triggeruuid = $(this).data('uuid');
            sequence = $(this).data('sequence');

            document.getElementById('uuid').value = triggeruuid;
            document.getElementById('sequence').value = sequence;

        });
        $('.sip_datatable').on('click', '.mandatory', function () {
            triggeruuid = $(this).data('uuid');
            mandatory = $(this).data('mandatory');
            if (mandatory == 0){
                is_mandatory = 1;
            }
            else if (mandatory ==  1){
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/project-hm/'+triggeruuid+'/mandatory/',
                data: {
                    _token: $('input[name=_token]').val(),
                    is_mandatory: is_mandatory,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {
                        toastr.success('Mandatory has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.sip_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

        });



        //CPCP taskcard Datatable
        $('.cpcp_datatable').on('click', '.material', function () {
            if(material_datatables_init == true){
                material_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                material_tc(triggeruuid);
                $('#m_datatable_material_routine_si_wp').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_material_routine_si_wp').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                material_tc(triggeruuid);
                $('#m_datatable_material_routine_si_wp').DataTable().ajax.reload();
            }
        });

        $('.cpcp_datatable').on('click', '.predecessor', function () {
            if(predecessor_datatables_init == true){
                predecessor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#predecessor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
        });
        $('.cpcp_datatable').on('click', '.successor', function () {
            if(successor_datatables_init == true){
                successor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#successor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
        });

        $('.cpcp_datatable').on('click', '.tool', function () {
            if(tool_datatables_init == true){
                tool_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                tool_tc(triggeruuid);
                $('#m_datatable_tool_routine_si_wp').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_tool_routine_si_wp').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                tool_tc(triggeruuid);
                $('#m_datatable_tool_routine_si_wp').DataTable().ajax.reload();
            }
        });

        $('.cpcp_datatable').on('click', '.sequence', function () {
            triggeruuid = $(this).data('uuid');
            sequence = $(this).data('sequence');

            document.getElementById('uuid').value = triggeruuid;
            document.getElementById('sequence').value = sequence;

        });
        $('.cpcp_datatable').on('click', '.mandatory', function () {
            triggeruuid = $(this).data('uuid');
            mandatory = $(this).data('mandatory');
            if (mandatory == 0){
                is_mandatory = 1;
            }
            else if (mandatory ==  1){
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/project-hm/'+triggeruuid+'/mandatory/',
                data: {
                    _token: $('input[name=_token]').val(),
                    is_mandatory: is_mandatory,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {
                        toastr.success('Mandatory has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.cpcp_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

        });

        //ADSB
        $('.ad-sb_datatable').on('click', '.predecessor', function () {
            if(predecessor_datatables_init == true){
                predecessor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#predecessor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
        });
        $('.ad-sb_datatable').on('click', '.successor', function () {
            if(successor_datatables_init == true){
                successor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#successor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
        });

        $('.ad-sb_datatable').on('click', '.sequence', function () {
            triggeruuid = $(this).data('uuid');
            sequence = $(this).data('sequence');

            document.getElementById('uuid').value = triggeruuid;
            document.getElementById('sequence').value = sequence;

        });
        $('.ad-sb_datatable').on('click', '.mandatory', function () {
            triggeruuid = $(this).data('uuid');
            mandatory = $(this).data('mandatory');
            if (mandatory == 0){
                is_mandatory = 1;
            }
            else if (mandatory ==  1){
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/project-hm/'+triggeruuid+'/mandatory/',
                data: {
                    _token: $('input[name=_token]').val(),
                    is_mandatory: is_mandatory,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {
                        toastr.success('Mandatory has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.ad-sb_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

        });

        //CMR-AWL

        $('.cmr-awl_datatable').on('click', '.predecessor', function () {
            if(predecessor_datatables_init == true){
                predecessor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#predecessor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
        });
        $('.cmr-awl_datatable').on('click', '.successor', function () {
            if(successor_datatables_init == true){
                successor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#successor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
        });


        $('.cmr-awl_datatable').on('click', '.sequence', function () {
            triggeruuid = $(this).data('uuid');
            sequence = $(this).data('sequence');

            document.getElementById('uuid').value = triggeruuid;
            document.getElementById('sequence').value = sequence;

        });
        $('.cmr-awl_datatable').on('click', '.mandatory', function () {
            triggeruuid = $(this).data('uuid');
            mandatory = $(this).data('mandatory');
            if (mandatory == 0){
                is_mandatory = 1;
            }
            else if (mandatory ==  1){
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/project-hm/'+triggeruuid+'/mandatory/',
                data: {
                    _token: $('input[name=_token]').val(),
                    is_mandatory: is_mandatory,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {
                        toastr.success('Mandatory has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.cmr-awl_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

        });

        //SI taskcard Datatable
        $('.si_datatable').on('click', '.predecessor', function () {
            if(predecessor_datatables_init == true){
                predecessor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#predecessor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-predecessor').value = triggeruuid;
                predecessor_tc(triggeruuid);
                $('#predecessor_datatable').DataTable().ajax.reload();
            }
        });
        $('.si_datatable').on('click', '.successor', function () {
            if(successor_datatables_init == true){
                successor_datatables_init = false;
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
            else{
                let table = $('#successor_datatable').DataTable();
                table.destroy();
                triggeruuid = $(this).data('tc_uuid');
                document.getElementById('uuid-successor').value = triggeruuid;
                successor_tc(triggeruuid);
                $('#successor_datatable').DataTable().ajax.reload();
            }
        });
        $('.si_datatable').on('click', '.material', function () {
            if(material_datatables_init == true){
                material_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                material_tc_si(triggeruuid);
                $('#m_datatable_material_routine_si_wp').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_material_routine_si_wp').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                material_tc_si(triggeruuid);
                $('#m_datatable_material_routine_si_wp').DataTable().ajax.reload();
            }
        });

        $('.si_datatable').on('click', '.tool', function () {
            if(tool_datatables_init == true){
                tool_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                tool_tc_si(triggeruuid);
                $('#m_datatable_tool_routine_si_wp').DataTable().ajax.reload();
            }
            else{
                let table = $('#m_datatable_tool_routine_si_wp').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                tool_tc_si(triggeruuid);
                $('#m_datatable_tool_routine_si_wp').DataTable().ajax.reload();
            }
        });

        $('.si_datatable').on('click', '.sequence', function () {
            triggeruuid = $(this).data('uuid');
            sequence = $(this).data('sequence');

            document.getElementById('uuid').value = triggeruuid;
            document.getElementById('sequence').value = sequence;

        });
        $('.si_datatable').on('click', '.mandatory', function () {
            triggeruuid = $(this).data('uuid');
            mandatory = $(this).data('mandatory');
            if (mandatory == 0){
                is_mandatory = 1;
            }
            else if (mandatory ==  1){
                is_mandatory = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/project-hm/'+triggeruuid+'/mandatory/',
                data: {
                    _token: $('input[name=_token]').val(),
                    is_mandatory: is_mandatory,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {
                        toastr.success('Mandatory has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.si_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

        });

        //basic
        $('.m-datatable').on('click', '.delete', function () {
            let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            let datatableClassName = parent_id.className.split(' ');
            triggeruuid = $(this).data('uuid');
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
                        url: '/project-hm/'+triggeruuid+'/destroy',
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            let table = $('.'+datatableClassName).mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
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
    Datatables.init();
});
