let Workpackage = {
    init: function () {
        $('.taskcard_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer',
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
                    field: 'title',
                    title: 'Tittle',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'type_id',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'work_area',
                    title: 'Area',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'zone',
                    title: 'Zone',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'rii',
                    title: 'Rii',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'id',
                    title: '#',
                    width: 50,
                    sortable: !1,
                    textAlign: 'center',
                    name: 'sas',
                    selector: {
                        class: 'm-checkbox--solid m-checkbox--brand'
                    }
                },

            ]
        });
        $('.nav-tabs').on('click', '.routine', function () {

            let basic = $('.basic_datatable').mDatatable();

            basic.originalDataSet = [];
            basic.reload();

            let sip = $('.sip_datatable').mDatatable();

            sip.originalDataSet = [];
            sip.reload();

            let cpcp = $('.cpcp_datatable').mDatatable();

            cpcp.originalDataSet = [];
            cpcp.reload();
        });

        $('.nav-tabs').on('click', '.non-routine', function () {

            let AdSb = $('.ad-sb_datatable').mDatatable();

            AdSb.originalDataSet = [];
            AdSb.reload();

            let CmrAwl = $('.cmr-awl_datatable').mDatatable();

            CmrAwl.originalDataSet = [];
            CmrAwl.reload();

            let SI = $('.si_datatable').mDatatable();

            SI.originalDataSet = [];
            SI.reload();


        });

        let update = $('.modal-footer').on('click', '.update', function () {
            $('#button').show();
            $('#name-error').html('');
            $('#simpan').text('Perbarui');

            let name = $('input[name=name]').val();
            let triggerid = $('input[name=id]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/category/' + triggerid,
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                            document.getElementById('name').value = name;
                        }
                    } else {
                        $('#modal_customer').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        let table = $('.m_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let triggeruuid ="";
        let material_datatables_init = true;
        let tool_datatables_init = true;
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

        //SI taskcard Datatable
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

        //basic
        $('.basic_datatable').on('click', '.delete', function () {
            // let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            // console.log(parent_id);
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
                        url: '/WorkPackage/'+workPackage_uuid+'/taskcard/'+triggeruuid,
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            anyChange = true;
                            let table = $('.basic_datatable').mDatatable();

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

        //sip
        $('.sip_datatable').on('click', '.delete', function () {
            // let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            // console.log(parent_id);
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
                        url: '/WorkPackage/'+workPackage_uuid+'/taskcard/'+triggeruuid,
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            anyChange = true;
                            let table = $('.sip_datatable').mDatatable();

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

        //cpcp
        $('.cpcp_datatable').on('click', '.delete', function () {
            // let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            // console.log(parent_id);
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
                        url: '/WorkPackage/'+workPackage_uuid+'/taskcard/'+triggeruuid,
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            anyChange = true;
                            let table = $('.cpcp_datatable').mDatatable();

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

        //ad-sb
        $('.ad-sb_datatable').on('click', '.delete', function () {
            // let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            // console.log(parent_id);
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
                        url: '/WorkPackage/'+workPackage_uuid+'/taskcard/'+triggeruuid,
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            anyChange = true;
                            let table = $('.ad-sb_datatable').mDatatable();

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

        //cmr-awl
        $('.cmr-awl_datatable').on('click', '.delete', function () {
            // let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            // console.log(parent_id);
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
                        url: '/WorkPackage/'+workPackage_uuid+'/taskcard/'+triggeruuid,
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            anyChange = true;
                            let table = $('.cmr-awl_datatable').mDatatable();

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

        //si
        $('.si_datatable').on('click', '.delete', function () {
            // let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            // console.log(parent_id);
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
                        url: '/WorkPackage/'+workPackage_uuid+'/taskcard/'+triggeruuid,
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            anyChange = true;
                            let table = $('.si_datatable').mDatatable();

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

        //Preliminary
        $('.preliminary_datatable').on('click', '.delete', function () {
            // let parent_id = $(this).closest('div[id="scrolling_both"]')[0];
            // console.log(parent_id);
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
                        url: '/WorkPackage/'+workPackage_uuid+'/taskcard/'+triggeruuid,
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            anyChange = true;
                            let table = $('.preliminary_datatable').mDatatable();

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
    Workpackage.init();
});
