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
                field: '',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: '',
                title: 'Position',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: '',
                title: 'Removal Mhrs',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: '',
                title: 'Installation Mhrs',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'skill.name',
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
            // alert('tes');
            let manhour = total_mhrs;
            let performa_used = performa;
            let total = total.toFixed(2);

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
            let employee_airframe = $('#employee_airframe').val();
            let airframe_qty = $('#airframe_qty').val();
            let employee_powerplant = $('#employee_powerplant').val();
            let powerplant_qty = $('#powerplant_qty').val();
            let employee_electrical = $('#employee_electrical').val();
            let electrical_qty = $('#electrical_qty').val();
            let employee_radio = $('#employee_radio').val();
            let radio_qty = $('#radio_qty').val();
            let employee_cabinMaintenance = $('#employee_cabinMaintenance').val();
            let cabin_qty = $('#cabin_qty').val();
            let employee_runup = $('#employee_runup').val();
            let runup_qty = $('#runup_qty').val();
            let employee_repair = $('#employee_repair').val();
            let repair_qty = $('#repair_qty').val();
            let employee_repainting = $('#employee_repainting').val();
            let repainting_qty = $('#repainting_qty').val();
            let employee_ndi_ndt = $('#employee_ndi_ndt').val();
            let ndi_ndt_qty = $('#ndi_ndt_qty').val();
            let tat = $('#tat').val();
            let skills = $('#skills').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/' + project_uuid + '/workpackage/' + workpackage_uuid + '/engineerTeam',
                data: {
                    _token: $('input[name=_token]').val(),
                    employee_airframe: employee_airframe,
                    airframe_qty: airframe_qty,
                    employee_powerplant: employee_powerplant,
                    powerplant_qty: powerplant_qty,
                    employee_electrical: employee_electrical,
                    electrical_qty: electrical_qty,
                    employee_radio: employee_radio,
                    radio_qty: radio_qty,
                    employee_cabinMaintenance: employee_cabinMaintenance,
                    cabin_qty: cabin_qty,
                    employee_runup: employee_runup,
                    runup_qty: runup_qty,
                    employee_repair: employee_repair,
                    repair_qty: repair_qty,
                    employee_repainting: employee_repainting,
                    repainting_qty: repainting_qty,
                    employee_ndi_ndt: employee_ndi_ndt,
                    ndi_ndt_qty: ndi_ndt_qty,
                    skills: skills,
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
            $('#facility ').each(function (i) {
                facility_array[i] = document.getElementsByName('group-facility[' + i + '][facility]')[0].value;
            });

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

