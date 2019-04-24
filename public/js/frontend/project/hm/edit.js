let Project = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.workpackage_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/'+project_uuid+'/workpackage/',
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
                    field: 'code',
                    title: 'Workpackage Number',
                    sortable: !1,
                },
                {
                    field: 'title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/project-hm/'+project_uuid+'/workpackage/'+t.uuid+'">' + t.title + "</a>"
                    }
                },
                {
                    field: 'aircrafts',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.description) {
                            data = strtrunc(t.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                        template: function (t, e, i) {
                            return (
                                '<a href="/project-hm/' + project_uuid + '/workpackage/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-workpackage" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        }
                }
            ]
        });

        $("#project_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/workpackage/modal",
            columns: [
                {
                    data: "code"
                },
                {
                    data: "title"
                },
                {
                    data: "aircraft_id"
                },
                {
                    data: "Actions"
                }
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: !1,
                    render: function (a, e, t, n) {
                        return '<a class="btn btn-primary btn-sm m-btn--hover-brand select-workpackage" title="View" data-uuid="' + t.uuid + '">\n<span><i class="la la-edit"></i><span>Use</span></span></a>'
                    }
                },

            ]
        })

        $('#project_datatable').on('click', '.select-workpackage', function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/' + project_uuid +'/workpackage',
                data: {
                    _token: $('input[name=_token]').val(),
                    workpackage: $(this).data('uuid'),
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.customer_id) {
                            $('#customer-error').html(data.errors.customer_id[0]);
                        }
                        if (data.errors.aircraft_register) {
                            $('#reg-error').html(data.errors.aircraft_register[0]);
                        }
                        if (data.errors.aircraft_sn) {
                            $('#serial-number-error').html(data.errors.aircraft_sn[0]);
                        }
                        if (data.errors.aircraft_id) {
                            $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        }
                        if (data.errors.no_wo) {
                            $('#work-order-error').html(data.errors.no_wo[0]);
                        }

                        document.getElementById('customer').value = data.getAll('customer_id');
                        document.getElementById('work-order').value = data.getAll('no_wo');
                        document.getElementById('applicability_airplane').value = data.getAll('aircraft_id');
                        document.getElementById('reg').value = data.getAll('aircraft_register');
                        document.getElementById('serial-number').value = data.getAll('aircraft_sn');
                    } else {
                        $('#modal_project').modal('hide');

                        toastr.success('Workpackage has been created.', 'Success',  {
                            timeOut: 5000
                        });

                        let table = $('.workpackage_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $('.workpackage_datatable').on('click', '.delete-workpackage', function () {
            let workpackage_uuid = $(this).data('uuid');

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
                        url: '/project-hm/' + project_uuid +'/workpackage/'+workpackage_uuid,
                        success: function (data) {
                            toastr.success('Unit has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.workpackage_datatable').mDatatable();

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

        $('.add-blank-workpackage').on('click', function () {
            let registerForm = $('#BlankWorkpackageForm');
            let applicability_airplane = $('#applicability_airplane').val();
            let title = $('#title').val();
            let is_template = 0;
            console.log(applicability_airplane);
            console.log(title);
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
                    is_template: is_template,
                    project_uuid: project_uuid,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);

                            document.getElementById('title').value = title;
                        }
                    } else {
                        toastr.success('Project has been created.', 'Success', {
                            timeOut: 5000
                        });
                        window.location.href = '/project-hm/'+project_uuid+'/workpackage/'+data.uuid+'/edit';

                    }
                }
            });
        });

        $(document).ready(function() {
            let customer_uuid = $('#customer')[0];
            let phone = $('#phone');
            let fax = $('#fax');
            let addresses = $('#address');
            let emails = $('#email');
            phone.empty();
            fax.empty();
            addresses.empty();
            emails.empty();
            let phoneNumber = "";
            $("#name").html(customer_uuid.text);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: "json",
                url: '/label/get-customer/'+customer_uuid.value,
                success: function (data) {
                    // adding customer phones option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.phones)){
                        console.log('empty phones');
                    }else{
                        console.log('get the phones data');
                        $.each( data.phones, function( key, value ) {
                            if(value.ext === null){
                                phoneNumber = value.number;
                            }else{
                                phoneNumber = value.number+' Ext. '+value.ext;
                            }
                            let phoneNumberOption = new Option(phoneNumber,value.uuid);
                            phone.append(phoneNumberOption);
                        });
                    }
        
                    // adding customer faxes option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.faxes)){
                        console.log('empty faxes');
                    }else{
                        console.log('get the faxes data');
                        $.each( data.faxes, function( key, value ) {
                            let faxNumberOption = new Option( value.number,value.uuid);
                            fax.append(faxNumberOption);
                        });
                    }
        
                    // Adding customer addresses option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.addresses)){
                        console.log('empty addresses');
                    }else{
                        console.log('get the addresses data');
                        $.each( data.addresses, function( key, value ) {
                            let addressesOption = new Option( value.address,value.uuid);
                            addresses.append(addressesOption);
                        });
                    }
        
                    // Adding customer emails option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.emails)){
                        console.log('empty emails');
                    }else{
                        console.log('get the emails data');
                        $.each( data.emails, function( key, value ) {
                            let emailsOption = new Option( value.address,value.uuid);
                            emails.append(emailsOption);
                        });
                    }

                }
            });
        });
        
        $('select[name="customer"]').on('change', function () {
            let customer_uuid = this.options[this.selectedIndex];
            let phone = $('#phone');
            let fax = $('#fax');
            let addresses = $('#address');
            let emails = $('#email');
            phone.empty();
            fax.empty();
            addresses.empty();
            emails.empty();
            let phoneNumber = "";
            console.log(phone);
            $("#name").html(customer_uuid.text);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: "json",
                url: '/label/get-customer/'+customer_uuid.value,
                success: function (data) {
                    // adding customer phones  option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.phones)){
                        console.log('empty phones');
                    }else{
                        console.log('get the phones data');
                        $.each( data.phones, function( key, value ) {
                            if(value.ext === null){
                                phoneNumber = value.number;
                            }else{
                                phoneNumber = value.number+' Ext. '+value.ext;
                            }
                            let phoneNumberOption = new Option(phoneNumber,value.uuid);
                            phone.append(phoneNumberOption);
                        });
                    }
        
                    // adding customer faxes  option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.faxes)){
                        console.log('empty faxes');
                    }else{
                        console.log('get the faxes data');
                        $.each( data.faxes, function( key, value ) {
                            let faxNumberOption = new Option( value.number,value.uuid);
                            fax.append(faxNumberOption);
                        });
                    }
        
                    // Adding customer addresses option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.addresses)){
                        console.log('empty addresses');
                    }else{
                        console.log('get the addresses data');
                        $.each( data.addresses, function( key, value ) {
                            let addressesOption = new Option( value.address,value.uuid);
                            addresses.append(addressesOption);
                        });
                    }
        
                    // Adding customer emails option on selectBox inside identifier
                    if(jQuery.isEmptyObject(data.emails)){
                        console.log('empty emails');
                    }else{
                        console.log('get the emails data');
                        $.each( data.emails, function( key, value ) {
                            let emailsOption = new Option( value.address,value.uuid);
                            emails.append(emailsOption);
                        });
                    }
                }
            });
        });

        $('.update-project').on('click', function () {
            let data = new FormData();
            data.append("title", $('#project_title').val());
            data.append("customer_id", $('#customer').val());
            data.append("no_wo", $('input[name=work-order]').val());
            data.append("aircraft_id", $('#applicability_airplane').val());
            data.append("aircraft_register", $('input[name=reg]').val());
            data.append("aircraft_sn", $('input[name=serial-number]').val());
            data.append("code", 'Dummy COde');
            data.append("fileInput", document.getElementById('work-order-attachment').files[0]);
            data.append('_method', 'PUT');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/project-hm/'+ project_uuid,
                data:data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.customer_id) {
                            $('#customer-error').html(data.errors.customer_id[0]);
                        }
                        if (data.errors.aircraft_register) {
                            $('#reg-error').html(data.errors.aircraft_register[0]);
                        }
                        if (data.errors.aircraft_sn) {
                            $('#serial-number-error').html(data.errors.aircraft_sn[0]);
                        }
                        if (data.errors.aircraft_id) {
                            $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        }
                        if (data.errors.no_wo) {
                            $('#work-order-error').html(data.errors.no_wo[0]);
                        }

                        document.getElementById('customer').value = data.getAll('customer_id');
                        document.getElementById('work-order').value = data.getAll('no_wo');
                        document.getElementById('applicability_airplane').value = data.getAll('aircraft_id');
                        document.getElementById('reg').value = data.getAll('aircraft_register');
                        document.getElementById('serial-number').value = data.getAll('aircraft_sn');

                    } else {
                        toastr.success('Project has been created.', 'Success', {
                            timeOut: 5000
                        });

                    }
                }
            });
        });

        
    }
};

jQuery(document).ready(function () {
    Project.init();
});
