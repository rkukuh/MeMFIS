let Customer = {
    init: function () {
        $('.customer_document_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer/'+ customer_uuid +'/document',
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'number',
                    title: 'Document Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type.name',
                    title: 'Type Document',
                    sortable: 'asc',
                    filterable: !1,
                },
            ]
        });
        $('.customer_address_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer/'+ customer_uuid +'/address',
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'address',
                    title: 'Address',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type.name',
                    title: 'Type Address',
                    sortable: 'asc',
                    filterable: !1,
                },
            ]
        });

        $('.customer_phone_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer/'+ customer_uuid +'/phone',
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'number',
                    title: 'Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return '<span>'+t.number+'</span>'
                    }
                },          
                {
                    field: 'type.name',
                    title: 'Type Phone',
                    sortable: 'asc',
                    filterable: !1,
                },     
                {
                    field: 'is_active',
                    title: 'Active',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if(t.is_active == 1){
                            return ' <span class="m-switch  m-switch--outline m-switch--icon m-switch--md">'+
                            '<label>'+
                            '<input type="checkbox" checked name="" id="">'+
                            '<span></span>'+
                            '</label>'+
                            '</span>'

                        }
                        else{
                            return ' <span class="m-switch  m-switch--outline m-switch--icon m-switch--md">'+
                            '<label>'+
                            '<input type="checkbox" name="" id="">'+
                            '<span></span>'+
                            '</label>'+
                            '</span>'

                        }    
                    }
                },  
            ]
        });

        $('.customer_email_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer/'+ customer_uuid +'/email',
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'address',
                    title: 'Email',
                    sortable: 'asc',
                    filterable: !1,

                },
                {
                    field: 'type.name',
                    title: 'Type Email',
                    sortable: 'asc',
                    filterable: !1,
                },                    
                {
                    field: 'is_active',
                    title: 'Active',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if(t.is_active == 1){
                            return ' <span class="m-switch  m-switch--outline m-switch--icon m-switch--md">'+
                            '<label>'+
                            '<input type="checkbox" checked name="" id="">'+
                            '<span></span>'+
                            '</label>'+
                            '</span>'

                        }
                        else{
                            return ' <span class="m-switch  m-switch--outline m-switch--icon m-switch--md">'+
                            '<label>'+
                            '<input type="checkbox" name="" id="">'+
                            '<span></span>'+
                            '</label>'+
                            '</span>'

                        }    
                    }
                },               
            ]
        });

        $('.customer_fax_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer/'+ customer_uuid +'/fax',
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'number',
                    title: 'Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type.name',
                    title: 'Type Fax',
                    sortable: 'asc',
                    filterable: !1,
                },                                   
                {
                    field: 'is_active',
                    title: 'Active',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if(t.is_active == 1){
                            return ' <span class="m-switch  m-switch--outline m-switch--icon m-switch--md">'+
                            '<label>'+
                            '<input type="checkbox" checked name="" id="">'+
                            '<span></span>'+
                            '</label>'+
                            '</span>'

                        }
                        else{
                            return ' <span class="m-switch  m-switch--outline m-switch--icon m-switch--md">'+
                            '<label>'+
                            '<input type="checkbox" name="" id="">'+
                            '<span></span>'+
                            '</label>'+
                            '</span>'

                        }    
                    }
                },  
            ]
        });

        $('.customer_website_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer/'+ customer_uuid +'/website',
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'url',
                    title: 'URL',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'type.name',
                    title: 'Type Fax',
                    sortable: 'asc',
                    filterable: !1,
                },                                   
            ]
        });
        // $('.customer_address_datatable').mDatatable({
        //     data: {
        //         type: 'remote',
        //         source: {
        //             read: {
        //                 method: 'GET',
        //                 url: '/datatables/customer/'+ customer_uuid +'/document',
        //                 map: function (raw) {
        //                     let dataSet = raw;

        //                     if (typeof raw.data !== 'undefined') {
        //                         dataSet = raw.data;
        //                     }

        //                     return dataSet;
        //                 }
        //             }
        //         },
        //         pageSize: 10,
        //         serverPaging: !0,
        //         serverFiltering: !0,
        //         serverSorting: !0
        //     },
        //     layout: {
        //         theme: 'default',
        //         class: '',
        //         scroll: false,
        //         footer: !1
        //     },
        //     sortable: !0,
        //     perpage: 3,
        //     filterable: !1,
        //     pagination: !0,
        //     search: {
        //         input: $('#generalSearch')
        //     },
        //     toolbar: {
        //         items: {
        //             pagination: {
        //                 pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
        //             }
        //         }
        //     },
        //     columns: [
        //         {
        //             field: 'number',
        //             title: 'Document Number',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'type.name',
        //             title: 'Type Document',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'Actions',
        //             width: 110,
        //             title: 'Actions',
        //             sortable: !1,
        //             overflow: 'visible',
        //             template: function (t, e, i) {
        //                 return (
        //                     '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
        //                     t.id +
        //                     ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
        //                 );
        //             }
        //         }
        //     ]
        // });

        $('.customer_phone_datatable').mDatatable({
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'name',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                            t.id +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.customer_email_datatable').mDatatable({
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'name',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                            t.id +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.customer_fax_datatable').mDatatable({
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
            perpage: 3,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [3, 5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [
                {
                    field: 'name',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                            t.id +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });


        // let edit = $('.m_datatable').on('click', '.edit', function () {
        //     $('#button').show();
        //     $('#simpan').text('Perbarui');

        //     let triggerid = $(this).data('id');

        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type: 'get',
        //         url: '/customer/' + triggerid + '/edit',
        //         success: function (data) {
        //             document.getElementById('id').value = data.id;
        //             document.getElementById('name').value = data.name;

        //             $('.btn-success').addClass('update');
        //             $('.btn-success').removeClass('add');
        //         },
        //         error: function (jqXhr, json, errorThrown) {
        //             let errorsHtml = '';
        //             let errors = jqXhr.responseJSON;

        //             $.each(errors.errors, function (index, value) {
        //                 $('#kategori-error').html(value);
        //             });
        //         }
        //     });
        // });

        let update = $('.footer').on('click', '.edit-customer', function () {

            // alert('aa')
            let customer_uuid = $('input[name=customer_uuid]').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let payment_term = $('#payment_term').val();
            let account_code = $('#account_code').val();

            if (document.getElementById("active").checked) {
                banned = 1;
            } else {
                banned = 0;
            }


            let phone_array = [];
            $('#phone ').each(function (i) {
                phone_array[i] = document.getElementsByName('group-phone[' + i + '][phone]')[0].value;
            });
        

            let ext_phone_array = [];
            $('#ext ').each(function (i) {
                ext_phone_array[i] = document.getElementsByName('group-phone[' + i + '][ext]')[0].value;
            });

            let type_phone_array = [];
            $('#phone ').each(function (i) {
                type_phone_array[i] = $('input[name="group-phone[' + i + '][type_phone]"]:checked').val();
            });


            let fax_array = [];
            $('#fax ').each(function (i) {
                fax_array[i] = document.getElementsByName('group-fax[' + i + '][fax]')[0].value;
            });

            let type_fax_array = [];
            $('#fax ').each(function (i) {
                type_fax_array[i] = $('input[name="group-fax[' + i + '][type_fax]"]:checked').val();
            });

            let website_array = [];
            $('#website ').each(function (i) {
                website_array[i] = document.getElementsByName('group-website[' + i + '][website]')[0].value;
            });

            let email_array = [];
            $('#email ').each(function (i) {
                email_array[i] = document.getElementsByName('group-email[' + i + '][email]')[0].value;
            });

            let type_email_array = [];
            $('#email ').each(function (i) {
                type_email_array[i] = $('input[name="group-email[' + i + '][type_email]"]:checked').val();
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/customer/' + customer_uuid,
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    payment_term: payment_term,
                    account_code: account_code,
                    phone_array: phone_array,
                    ext_phone_array: ext_phone_array,
                    type_phone_array: type_phone_array,
                    fax_array: fax_array,
                    type_fax_array: type_fax_array,
                    website_array: website_array,
                    email_array: email_array,
                    type_email_array: type_email_array,
                    // banned: banned
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
    Customer.init();
});
