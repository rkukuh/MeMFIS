let Workpackage2 = {
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

        let simpan = $('.action-buttons').on('click', '.add-workpackage', function () {
            $('#name-error').html('');
            $('#simpan').text('Simpan');


            let title = $('input[name=title]').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let description = $('#description').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/workpackage',
                data: {
                    _token: $('input[name=_token]').val(),
                    title: title,
                    aircraft_id: applicability_airplane,
                    description: description,
                    is_template:'1',
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.aircraft_id) {
                            $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        }
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        // document.getElementById('applicability-airplane').value = applicability-airplane;
                        // document.getElementById('title').value = title;

                    } else {
                        // $('#modal_customer').modal('hide');

                        toastr.success('Work Package has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/workpackage/'+data.uuid+'/edit';
                        // let table = $('.m_datatable').mDatatable();

                        // table.originalDataSet = [];
                        // table.reload();
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Workpackage2.init();
});
