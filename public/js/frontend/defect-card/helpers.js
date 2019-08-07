let Helpers = {
    init: function () {
        let helpers_datatable = $(".helpers_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/defectcard/'+uuid+'/helpers',
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
                serverPaging: !1,
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
                    field: "first_name",
                    title: "Name",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill remove-helper" href="#" data-id=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

    }
};

$('.add_helper').on('click', function(){
    let helper = $('#defectcard_helper').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/defectcard/'+uuid+'/add-helper',
        type: 'POST',
        data:{helper: helper},
        success: function (data) {
            $('#modal_helper').modal('hide');

            toastr.success('Helper has been added.', 'Success', {
                timeOut: 5000
            });

            let helpers_datatable = $('.helpers_datatable').mDatatable();

            helpers_datatable.originalDataSet = [];
            helpers_datatable.reload();

        }
      });
});
jQuery(document).ready(function () {
  Helpers.init();
});
