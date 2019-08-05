// let EO_tool = {
function EO_tool(triggeruuid2) {
    $("#m_datatable_tool").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 5,
        ajax: "/datatables/taskcard-eo/" + triggeruuid2 + "/tools",
        columns: [{
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
                data: "pivot.part number"
            },
            {
                data: "Actions"
            }
        ],
        columnDefs: [{
                targets: -1,
                orderable: !1,
                render: function (a, e, t, n) {
                    return '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" data-uuid="' + t.uuid + '" href="#"title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                }
            },

        ]
    })

    $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.tool-body .dataTables_filter');
    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');

    // $('.dataTables_filter').on('click', '.refresh', function () {
    //     $('#m_datatable_journalll').DataTable().ajax.reload();
    // });

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
                        url: '/taskcard-eo/eo-instruction/' + triggeruuid2 + '/' + triggeruuiditem + '/item',
                        success: function (data) {
                            toastr.success('Item has been deleted.', 'Deleted', {
                                timeOut: 5000
                            });

                            $('#m_datatable_tool').DataTable().ajax.reload();

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


    $('.tool-body').on('click', '.item_modal', function () {
        $('#add_modal_tool').modal('show');
    });


};
// };

// jQuery(document).ready(function () {
//   Eo_tool.init();
// });
