let QuotationWorkshop = {
    init: function () {
        let customer_uuid = $('#customer_id')[0].value;
        let phone = $('#phone');
        let fax = $('#fax');
        let addresses = $('#address');
        let emails = $('#email');
        // emptying options
        phone.empty();
        fax.empty();
        addresses.empty();
        emails.empty();
        let phoneNumber = "";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/label/get-customer/' + customer_uuid,
            type: 'GET',
            dataType: "json",
            success: function (response) {
                if (response) {
                    let res = JSON.parse(response.attention);
                    $('select[name="attention"]').empty();
                    $('select[name="phone"]').empty();
                    $('select[name="email"]').empty();
                    $('select[name="fax"]').empty();
                    $('select[name="address"]').empty();
                    if (response.addresses.length) {
                        $.each(response.addresses, function (index, value) {
                            $('select[name="address"]').append(
                                '<option value="' + value.address + '">' + value.address + '</option>'
                            );
                        });
                    }
                    if (response.emails.length) {
                        $.each(response.emails, function (index, value) {
                            $('select[name="email"]').append(
                                '<option value="' + value.address + '">' + value.address + '</option>'
                            );
                        });
                    }
                    if (response.faxes.length) {
                        $.each(response.faxes, function (index, value) {
                            $('select[name="fax"]').append(
                                '<option value="' + value.number + '">' + value.number + '</option>'
                            );
                        });
                    }
                    if (response.phones.length) {
                        $.each(response.phones, function (index, value) {
                            $('select[name="phone"]').append(
                                '<option value="' + value.number + '">' + value.number + '</option>'
                            );
                        });
                    }
                    for (var i = 0; i < res.length; i++) {
                        if (res[i].name) {
                            $('select[name="attention"]').append(
                                '<option value="' + res[i].name + '">' + res[i].name + '</option>'
                            );
                        }
                        if (res[i].address) {
                            $('select[name="address"]').append(
                                '<option value="' + res[i].address + '">' + res[i].address + '</option>'
                            );
                        }
                        if (res[i].fax) {
                            $('select[name="fax"]').append(
                                '<option value="' + res[i].fax + '">' + res[i].fax + '</option>'
                            );
                        }
                        if (res[i].phones) {
                            $.each(res[i].phones, function (value) {
                                $('select[name="phone"]').append(
                                    '<option value="' + res[i].phones[value] + '">' + res[i].phones[value] + '</option>'
                                );
                            });
                        }
                        if (res[i].emails) {
                            $.each(res[i].emails, function (value) {
                                $('select[name="email"]').append(
                                    '<option value="' + res[i].emails[value] + '">' + res[i].emails[value] + '</option>'
                                );
                            });
                        }
                    }
                } else {
                    // console.log("empty");
                }

            }
        });

        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '',
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
                serverFiltering: !1,
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
                    field: '#',
                    title: 'No',
                    width:'40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: '',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Serial Number',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Items Name',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Job Request',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Complaint',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Evaluation Cost',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Full Package Cost',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-id="' + t.uuid + '">' +
                                '<i class="la la-check"></i>' +
                            '</a>'+
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

    }
};

jQuery(document).ready(function () {
    QuotationWorkshop.init();
});