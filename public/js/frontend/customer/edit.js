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
                        url: '/datatables/customer/'+ customer_uuid +'/addresses',
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

            let customer_uuid = $('input[name=customer_uuid]').val();
            // let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let payment_term = $('input[name=term_of_payment]').val();
            let account_code = $('#account_code').val();
            let level = $('select[name="customer-level"]').val();

            let phone_array = [];
            $('input[name^=phone_array]').each(function (i) {
                phone_array[i] = $(this).val();
            });
            phone_array.pop();

            let ext_phone_array = [];
            $('input[name^=ext]').each(function (i) {
                ext_phone_array[i] = $(this).val();
            });
            ext_phone_array.pop();

            let type_phone_array = [];
            $('#type_phone ').each(function (i) {
                type_phone_array[i] = $(this).val();
            });
            type_phone_array.pop();

            let fax_array = [];
            $('#fax ').each(function (i) {
                fax_array[i] = $(this).val();
            });
            fax_array.pop();

            let type_fax_array = [];
            $('#type_fax ').each(function (i) {
                type_fax_array[i] = $(this).val();
            });
            type_fax_array.pop();

            let website_array = [];
            $('#website ').each(function (i) {
                website_array[i] = $(this).val();
            });
            website_array.pop();

            let type_website_array = [];
            $('select[name^=type_website]').each(function (i) {
                type_website_array[i] = $(this).val();
            });
            type_website_array.pop();

            let email_array = [];
            $('input[name^=email_array]').each(function (i) {
                email_array[i] = $(this).val();
            });
            email_array.pop();

            let type_email_array = [];
            $('#type_email ').each(function (i) {
                type_email_array[i] = $(this).val();
            });
            type_email_array.pop();

            let document_array = [];
            $('#email ').each(function (i) {
                document_array[i] = $(this).val();
            });
            document_array.pop();

            let type_document_array = [];
            $('input[name^=type_document]').each(function (i) {
                type_document_array[i] = $(this).val();
            });
            type_document_array.pop();

            let attn_phone_array = [];
            $('select[name^=attn-phone]').each(function () {
                let attn_phone_array_row = [];
                ai = 0;
                $(this).val().forEach(function(entry) {
                    attn_phone_array_row[ai] = entry;
                    ai++;
                });;
                attn_phone_array.push(attn_phone_array_row);
            });
            attn_phone_array.pop();

            let attn_position_array = [];
            $('#attn-position ').each(function (i) {
                attn_position_array[i] = $(this).val();
            });
            attn_position_array.pop();

            let attn_name_array = [];
            $('#attn-name ').each(function (i) {
                attn_name_array[i] = $(this).val();
            });
            attn_name_array.pop();

            let attn_ext_array = [];
            $('#attn-ext ').each(function (i) {
                attn_ext_array[i] = $(this).val();
            });
            attn_ext_array.pop();

            let attn_fax_array = [];
            $('#attn-fax ').each(function (i) {
                attn_fax_array[i] = $(this).val();
            });
            attn_fax_array.pop();

            let attn_email_array = [];
            $('select[name^=attn-email]').each(function (i) {
                let attn_email_array_row = [];
                ai = 0;
                $(this).val().forEach(function(entry) {
                    attn_email_array_row[ai] = entry;
                   ai++;
               });;
               attn_email_array.push(attn_email_array_row);
            });
            attn_email_array.pop();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/customer/' + customer_uuid,
                data: {
                    _token: $('input[name=_token]').val(),
                    // code: code,
                    name: name,
                    payment_term: payment_term,
                    account_code: account_code,
                    phone_array: phone_array,
                    ext_phone_array: ext_phone_array,
                    type_phone_array: type_phone_array,
                    fax_array: fax_array,
                    type_fax_array: type_fax_array,
                    website_array: website_array,
                    type_website_array: type_website_array,
                    email_array: email_array,
                    type_email_array: type_email_array,
                    document_array: document_array,
                    type_document_array: type_document_array,
                    attn_phone_array:attn_phone_array,
                    attn_name_array:attn_name_array,
                    attn_position_array:attn_position_array,
                    attn_ext_array:attn_ext_array,
                    attn_fax_array:attn_fax_array,
                    attn_email_array:attn_email_array,
                    level:level,
                    // banned: banned
                },
                success: function (data) {
                    if (data.errors) {
                        $.each(data.errors, function (key, value) {
                            var name = $("input[name='"+key+"']");
                            if(key.indexOf(".") != -1){
                              var arr = key.split(".");
                              name = $("input[name='"+arr[0]+"']:eq("+arr[1]+")");
                            }
                            name.parent().find("div.form-control-feedback.text-danger").html(value[0]);
                          }); 

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

        $('.modal-footer').on('click', '.add-address', function () {
            let address = $('#address-modal').val();
            let address_type = $('#address_type').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/customer/' + customer_uuid + '/addresses',data: {
                    _token: $('input[name=_token]').val(),
                    address:address,
                    address_type: address_type
                },
                success: function (data) {
                    if (data.errors) {
                        $.each(data.errors, function (key, value) {
                            var name = $("input[name='"+key+"']");
                            if(key.indexOf(".") != -1){
                              var arr = key.split(".");
                              name = $("input[name='"+arr[0]+"']:eq("+arr[1]+")");
                            }
                            name.parent().find("div.form-control-feedback.text-danger").html(value[0]);
                          }); 
                    } else {
                        $('#modal_address').modal('hide');

                        let table = $('.customer_address_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Customer.init();
});
