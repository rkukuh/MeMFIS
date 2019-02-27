let TaskCard = {
    init: function () {
        $('.taskcard_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard',
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
                    template: function (t) {
                        return '<a href="/taskcard/'+t.uuid+'">' + t.title + "</a>"
                    }
                },
                {
                    field: 'type.name',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'work_area',
                    title: 'Area',
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
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return (
                                '<a href="/taskcard-routine/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        }
                        else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                            return (
                                '<a href="/taskcard-eo/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        }
                        else if(t.type.code == "si"){
                            return (
                                '<a href="/taskcard-si/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        } else {
                            return (
                                'dummy'
                            );
                        }

                        // return (
                        //     '<a href="/customer/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                        //         '<i class="la la-pencil"></i>' +
                        //     '</a>' +
                        //     '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                        //     t.uuid +
                        //     ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        // );
                    }
                }
            ]
        });

        let remove = $('.taskcard_datatable').on('click', '.delete', function () {
            let tascard_uuid = $(this).data('uuid');

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
                        url: '/taskcard/' + tascard_uuid + '',
                        success: function (data) {
                            toastr.success('Taskcard has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            let table = $('.taskcard_datatable').mDatatable();

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
    TaskCard.init();
});
