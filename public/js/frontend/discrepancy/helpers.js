let HelpersShow = {
    init: function () {
        let helpers_datatable = $(".defectcard_helper_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/defectcard/'+discrepancy_uuid+'/helpers',
                        map: function(raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== "undefined") {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        }
                    }
                },
                pageSize: 10,
                serverPaging: !0,
                serverFiltering: !1,
                serverSorting: !1
            },
            layout: {
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $("#generalSearch")
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
                    field: "code",
                    title: "NIM",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "first_name",
                    title: "Name",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.additionals",
                    title: "Reference",
                    sortable: "asc",
                    filterable: !1,
                },
            ]
        });
    }
};

let HelpersEdit = {
    init: function () {
        let helpers_datatable = $(".defectcard_helper_edit_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/defectcard/'+discrepancy_uuid+'/helpers',
                        map: function(raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== "undefined") {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        }
                    }
                },
                pageSize: 10,
                serverPaging: !0,
                serverFiltering: !1,
                serverSorting: !1
            },
            layout: {
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $("#generalSearch")
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
                    field: "code",
                    title: "NIM",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "first_name",
                    title: "Name",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.additionals",
                    title: "Reference",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill remove-helper" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.defectcard_helper_edit_datatable').on('click', '.remove-helper', function(){
            let triggeruuid = $(this).data('uuid');
            swal({
                title: 'Are you sure?',
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
                        type: 'delete',
                        url: '/defectcard/'+discrepancy_uuid+'/remove-helper/'+triggeruuid,
                        success: function (data) {
                            toastr.success('helper has been deleted.', 'Deleted', {
                                timeOut: 5000
                            }
                        );
                        let helpers_datatable = $('.defectcard_helper_edit_datatable').mDatatable();
        
                        helpers_datatable.originalDataSet = [];
                        helpers_datatable.reload();
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

$('.add_helper').on('click', function(){
    let helper = $('#defectcard_helper').val();
    let reference = $("#reference").val();
  
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/defectcard/'+discrepancy_uuid+'/add-helper',
        type: 'POST',
        data:{
            helper: helper,
            reference: reference
        },
        success: function (data) {
            $('#modal_helper').modal('hide');

            toastr.success('Helper has been added.', 'Success', {
                timeOut: 5000
            });

            let helpers_datatable = $('.defectcard_helper_edit_datatable').mDatatable();
            // if(data.current_helpers >= data.helper_quantity){
            //     $(".add-helper").hide();
            // }

            $("#reference").val("");
            $("#defectcard_helper").val("").select2();
            
            $("#modal_helper").modal("hide");

            helpers_datatable.originalDataSet = [];
            helpers_datatable.reload();

        }
      });
});



jQuery(document).ready(function () {
    HelpersShow.init();
    HelpersEdit.init();
});
