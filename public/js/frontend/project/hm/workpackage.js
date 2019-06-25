let Workpackage = {
    init: function () {
        $('.ht_crr_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/' + project_uuid + '/htcrr/',
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
                field: 'code',
                title: 'CRI No',
                sortable: !1,
            },
            {
                field: 'part_number',
                title: 'P/N',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'description',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'position',
                title: 'Position',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'removal_manhour_estimation',
                title: 'Removal Mhrs Est.',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'estimation_manhour',
                title: 'Installation Mhrs Est.',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'skill_name',
                title: 'Skill',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'material',
                title: 'Material',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_material_routine-si" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                    );
                }

            },
            {
                field: 'tool',
                title: 'Tool',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_tool_routine-si" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
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
                        '<button data-toggle="modal" data-target="#modal_workshop_task" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill " title="Create Workshop Task" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                        '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                        '<i class="la la-trash"></i>' +
                        '</a>'
                    );
                }
            }
            ]
        });

        $('.modal-footer').on('click', '.add-htcrr', function () {

            let cri = $('input[name=cri]').val();
            let pn = $('input[name=pn]').val();
            let position = $('input[name=position]').val();
            let removal = $('input[name=removal]').val();
            let installation = $('input[name=installation]').val();
            let description = $('#description').val();
            let otr_certification = $('#otr_certification').val();
            let mhrs = $('input[name=mhrs]').val();
            let is_rii;
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
                url: '/project-hm/htcrr',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: cri,
                    part_number: pn,
                    description: description,
                    skill_id: otr_certification,
                    estimation_manhour: mhrs,
                    is_rii: is_rii,
                    position: is_rii,
                    removal_manhour_estimation: removal,
                    installation_manhour_estimation: installation,
                    project_id: project_uuid,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {

                        toastr.success('HT/CRR has been created.', 'Success', {
                            timeOut: 5000
                        });

                        $('#modal_ht_crr').modal('hide');

                        let table = $('.ht_crr_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();


                    }
                }
            });
        });
        $('.footer').on('click', '.add-manhour', function () {
            let manhour = total_mhrs;
            let performa_used = performa;
            let total = $('#total').html();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/' + project_uuid + '/workpackage/' + workpackage_uuid + '/manhoursPropotion',
                data: {
                    _token: $('input[name=_token]').val(),
                    manhour: manhour,
                    performa_used: performa_used,
                    total: total,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {

                        toastr.success('Manhours Propotion has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/discrepancy/' + data.uuid + '/edit';

                    }
                }
            });
        });

        $('.footer').on('click', '.add-engineer', function () {
            let engineer_qty = [], engineer_skills = [], engineer = [];
            $('#engineer_skills ').each(function() {
                engineer_skills.push($(this).val());
            });
            if(engineer_skills.indexOf("Airframe") >= 0) {
                engineer.push( $('#employee_airframe').val());
                engineer_qty.push( $('#airframe_qty').val());
            }
            if(engineer_skills.indexOf("Powerplant") >= 0) {
                engineer.push( $('#employee_powerplant').val());
                engineer_qty.push( $('#powerplant_qty').val());
            }
            if(engineer_skills.indexOf("Electrical") >= 0) {
                engineer.push( $('#employee_electrical').val());
                engineer_qty.push( $('#electrical_qty').val());
            }
            if(engineer_skills.indexOf("Radio") >= 0) {
                engineer.push( $('#employee_radio').val());
                engineer_qty.push( $('#radio_qty').val());
            }
            if(engineer_skills.indexOf("Instrument") >= 0) {
                engineer.push( $('#employee_instrument').val());
                engineer_qty.push( $('#instrument_qty').val());
            }
            if(engineer_skills.indexOf("Cabin Maintenance") >= 0) {
                engineer.push( $('#employee_cabinMaintenance').val());
                engineer_qty.push( $('#cabin_qty').val());
            }
            if(engineer_skills.indexOf("Run-Up") >= 0) {
                engineer.push( $('#employee_runup').val());
                engineer_qty.push( $('#runup_qty').val());
            }
            if(engineer_skills.indexOf("Repair") >= 0) {
                engineer.push( $('#employee_repair').val());
                engineer_qty.push( $('#repair_qty').val());
            }
            if(engineer_skills.indexOf("Repainting") >= 0) {
                engineer.push( $('#employee_repainting').val());
                engineer_qty.push( $('#repainting_qty').val());
            }
            if(engineer_skills.indexOf("NDI / NDT") >= 0) {
                engineer.push( $('#employee_ndi_ndt').val());
                engineer_qty.push( $('#ndi_ndt_qty').val());
            }
            let tat = $('#tat').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/' + project_uuid + '/workpackage/' + workpackage_uuid + '/engineerTeam',
                data: {
                    _token: $('input[name=_token]').val(),
                    engineer_skills: engineer_skills,
                    engineer: engineer,
                    engineer_qty: engineer_qty,
                    tat: tat,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {

                        toastr.success('Engineer team has been created.', 'Success', {
                            timeOut: 5000
                        });

                    }
                }
            });
        });

        $('.footer').on('click', '.add-facility', function () {
            let facility_array = [];
            $('select[name^=facility]').each(function (i) {
                facility_array[i] = $(this).val();
            });
            facility_array.pop();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/' + project_uuid + '/workpackage/' + workpackage_uuid + '/facilityUsed',
                data: {
                    _token: $('input[name=_token]').val(),
                    facility_array: facility_array,
                },
                success: function (data) {
                    if (data.errors) {
                    } else {

                        toastr.success('Facility has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/discrepancy/' + data.uuid + '/edit';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Workpackage.init();
});

