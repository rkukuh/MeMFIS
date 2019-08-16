

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
                field: 'removal',
                title: 'Removal Mhrs Est.',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'installation',
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
                        '<button data-toggle="modal" data-target="#modal_material_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material_htcrr" title="Material" data-uuid=' +
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
                        '<button data-toggle="modal" data-target="#modal_tool_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool_htcrr" title="Tool" data-uuid=' +
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
                        '<button data-toggle="modal" data-target="#modal_workshop_task" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Create Workshop Task" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-file"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                        '<button data-toggle="modal" data-target="#modal_ht_crr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-uuid_htcrr=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                        '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid_htcrr="' + t.uuid + '">' +
                        '<i class="la la-trash"></i>' +
                        '</a>'
                    );
                }
            }
            ]
        });

        let material_htcrr_datatables_init = true;
        let triggeruuid = "";
        let htcrr_materials = $('.ht_crr_datatable').on('click', '.material_htcrr', function () {
            if (material_htcrr_datatables_init == true) {
                material_htcrr_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                htcrr_material(triggeruuid);
                $('#m_datatable_material_htcrr').DataTable().ajax.reload();
            }
            else {
                let table = $('#m_datatable_material_htcrr').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                htcrr_material(triggeruuid);
                $('#m_datatable_material_htcrr').DataTable().ajax.reload();
            }
        });

        let tool_htcrr_datatables_init = true;
        let htcrr_tools = $('.ht_crr_datatable').on('click', '.tool_htcrr', function () {
            if (tool_htcrr_datatables_init == true) {
                tool_htcrr_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                htcrr_tool(triggeruuid);
                $('#m_datatable_tool_htcrr').DataTable().ajax.reload();
            }
            else {
                let table = $('#m_datatable_tool_htcrr').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                htcrr_tool(triggeruuid);
                $('#m_datatable_tool_htcrr').DataTable().ajax.reload();
            }
        });

        $('.modal-footer').on('click', '.add-htcrr', function () {

            let pn = $('#item').val();
            let position = $('input[name=position]').val();
            let removal = $('input[name=removal]').val();
            let installation = $('input[name=installation]').val();
            let description = $('#description').val();
            let otr_certification = $('#otr_certification').val();
            let mhrs = $('input[name=mhrs]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/htcrr',
                data: {
                    _token: $('input[name=_token]').val(),
                    part_number: pn,
                    description: description,
                    skill_id: otr_certification,
                    estimation_manhour: mhrs,
                    position: position,
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

                        anyChanges = true;
                    }
                }
            });
        });

        let remove = $('.ht_crr_datatable').on('click', '.delete', function () {
            let uuid_htcrr = $(this).data('uuid_htcrr');

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
                            url: '/htcrr/' + uuid_htcrr ,
                            success: function (data) {
                                toastr.success('Instruction has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                                );

                                let table = $('.ht_crr_datatable').mDatatable();

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


        $('.ht_crr_datatable').on('click', '.edit', function () {
            $('.btn-success').removeClass('add-htcrr');
            $('.btn-success').removeClass('add');
            $('.btn-success').addClass('edit-htcrr');
            $('.btn-success').html("<span><i class='fa fa-save'></i><span> Save Changes</span></span>");


            let uuid_htcrr = $(this).data('uuid_htcrr');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/htcrr/' + uuid_htcrr + '/edit/',
                success: function (data) {
                    document.getElementById('description').value = data.description;
                    document.getElementById('mhrs').value = data.estimation_manhour;
                    document.getElementById('position').value = data.position;
                    document.getElementById('installation').value = data.installation_mhrs;
                    document.getElementById('removal').value = data.removal_mhrs;
                    document.getElementById('htcrr_uuid').value = data.uuid;


                    $.ajax({
                        url: '/get-items/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data2) {
                            $('select[name="item"]').empty();
                            $.each(data2, function (key, value) {
                                if (key == data.pn) {
                                    $('select[name="item"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else {
                                    $('select[name="item"]').append(
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
        $('.modal-footer').on('click', '.edit-htcrr', function () {
            let htcrr_uuid = $('#htcrr_uuid').val();
            let pn = $('#item').val();
            let position = $('input[name=position]').val();
            let removal = $('input[name=removal]').val();
            let installation = $('input[name=installation]').val();
            let description = $('#description').val();
            let otr_certification = $('#otr_certification').val();
            let mhrs = $('input[name=mhrs]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/htcrr/' + htcrr_uuid ,
                data: {
                    _token: $('input[name=_token]').val(),
                    part_number: pn,
                    description: description,
                    skill_id: otr_certification,
                    estimation_manhour: mhrs,
                    position: position,
                    removal_manhour_estimation: removal,
                    installation_manhour_estimation: installation,
                    project_id: project_uuid,
                },
                success: function (data) {
                    if (data.errors) {


                    } else {

                        toastr.success('HTCRR has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.ht_crr_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                        anyChanges = true;

                        $('#modal_ht_crr').modal('hide');
                        $('.btn-success').removeClass('edit-htcrr');
                        $('.btn-success').addClass('add-htcrr');
                        $('.btn-success').html("<span><i class='fa fa-save'></i><span> Save New</span></span>");
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
                url: '/project-hm/' + project_uuid + '/workpackage/' + workPackage_uuid + '/engineerTeam',
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

    }
};
function htcrr_tool(triggeruuid) {
    $("#m_datatable_tool_htcrr").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/project/"+triggeruuid+"/tools",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "pivot.unit"
            },
            {
                data: "pivot.note"
            },
            {
                data: "Actions"
            }
        ],
        columnDefs: [
            {
                targets: -1,
                orderable: !1,
                render: function (a, e, t, n) {
                      return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" data-uuid="' + t.uuid + '" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                }
            },

        ]
    })

    $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm tool_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.htcrr-tool-body .dataTables_filter');

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');


    $('.modal-footer').on('click', '.add-htcrr-tool', function () {
        let tool = $('#tool').val();
        let unit_tool = $('#unit_tool').val();
        let quantity = $('input[name=quantity]').val();
        let remark_tool = $('#remark_tool').val();
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/project-hm/htcrr/'+triggeruuid+'/item/',
            data: {
                _token: $('input[name=_token]').val(),
                item_id: tool,
                quantity: quantity,
                unit_id: unit_tool,
                note: remark_tool,
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

                    toastr.success('Tool has been created.', 'Success', {
                        timeOut: 5000
                    });

                    // let table = $('.tools_datatable').mDatatable();

                    // table.originalDataSet = [];
                    // table.reload();
                    $('#m_datatable_tool_htcrr').DataTable().ajax.reload();


                    $('#add_tool_modal').modal('hide');

                }
            }
        });
    });

    $('.dataTable').on('click', '.delete-tool', function () {
      let triggeruuiditem = $(this).data('uuid');
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
                  url: '/project-hm/htcrr/'+triggeruuid+'/'+triggeruuiditem+'/item',
                  success: function (data) {
                      toastr.success('Item has been deleted.', 'Deleted', {
                          timeOut: 5000
                      }
                  );

                  $('#m_datatable_tool_htcrr').DataTable().ajax.reload();

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

    $('.htcrr-tool-body').on('click', '.tool_modal', function () {
        $('#add_tool_modal').modal('show');
    });

};

function htcrr_material(triggeruuid) {
    $("#m_datatable_material_htcrr").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/project/"+triggeruuid+"/materials",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "pivot.unit"
            },
            {
                data: "pivot.note"
            },
            {
                data: "Actions"
            }
        ],
        columnDefs: [
            {
                targets: -1,
                orderable: !1,
                render: function (a, e, t, n) {
                      return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-item" data-uuid="' + t.uuid + '" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                }
            },

        ]
    })

    $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.htcrr-item-body .dataTables_filter');

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');


    $('.modal-footer').on('click', '.add-htcrr-item', function () {
        let material = $('#material').val();
        let unit_material = $('#unit_material').val();
        let quantity = $('input[name=quantity_material]').val();
        let remark_material = $('#remark_material').val();


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/project-hm/htcrr/'+triggeruuid+'/item/',
            data: {
                _token: $('input[name=_token]').val(),
                item_id: material,
                quantity: quantity,
                unit_id: unit_material,
                note: remark_material,

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

                    $('#m_datatable_material_htcrr').DataTable().ajax.reload();

                    $('#add_material_modal').modal('hide');

                }
            }
        });
    });

    $('.dataTable').on('click', '.delete-item', function () {
      let triggeruuiditem = $(this).data('uuid');
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
                  url: '/project-hm/htcrr/'+triggeruuid+'/'+triggeruuiditem+'/item',
                  success: function (data) {
                      toastr.success('Item has been deleted.', 'Deleted', {
                          timeOut: 5000
                      }
                  );
                  anyChanges = true;

                  $('#m_datatable_material_htcrr').DataTable().ajax.reload();

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

    $('.htcrr-item-body').on('click', '.item_modal', function () {
        $('#add_material_modal').modal('show');
    });

    

};

jQuery(document).ready(function () {
    Workpackage.init();
});

$('.m_taskcard_htcrr').on('click', function () {
    let table = $('.ht_crr_datatable').mDatatable();

    table.originalDataSet = [];
    table.reload();
});

$('.m_tabs_manhour').on('click', function () {
    if(anyChanges){
        $.ajax({
        url: "/project-htcrr/"+Project_uuid+"/getManhours",
        method: "get",
        success: function(dataFetched){
            $('#total_mhrs').html(dataFetched.total_mhrs);
            $('#total').html(dataFetched.mhrs_pfrm_factor);
        },
        });
    }
});

$('.m_tabs_enginner').on('click', function () {
    if(anyChanges){
        let csrf = $('meta[name="csrf-token"]').attr('content');
        let url = '/project-htcrr/' + project_uuid  + '/project-htcrr/create';
        let form = $('<form action="' + url + '" method="GET">' +
        '<input type="hidden" name="anyChanges" value="' + anyChanges + '" />' +
        '<input name="_token" value="'+csrf+'" type="hidden">' +
        '</form>');
        $('body').append(form);
        form.submit();
    }
});