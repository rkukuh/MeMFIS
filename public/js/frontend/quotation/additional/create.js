let AdditionalTaskQtnCreate = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/basic/',
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
                    field: 'number',
                    title: 'Defect Card No',
                    sortable: !1,
                },
                {
                    field: 'title',
                    title: 'P/N No.',
                    sortable: 'asc',
                    filterable: !1,template: function (t, e, i) {
                        if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a href="/taskcard-routine/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                            return '<a href="/taskcard-eo/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if(t.type.code == "si"){
                            return '<a href="/taskcard-si/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if(t.type.code == "preliminary"){
                            return '<a href="/preliminary/'+t.uuid+'">' + t.title + "</a>"
                        } else {
                            return (
                                'dummy'
                            );
                        }
                    }
                },
                {
                    field: 'skill',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'task.name',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Selling Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Subtotal',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Marketing Notes',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    // template: function (t, e, i) {
                    //     return (
                    //         '<button data-toggle="modal" data-target="#modal_price_list_edit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-price" title="Edit"'+
                    //         'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                    //         t.uuid +
                    //         '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                    //         '<button data-toggle="modal" data-target="#modal_price_list" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill add-price" title="Edit"' +
                    //         'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                    //         t.uuid +
                    //         '>\t\t\t\t\t\t\t<i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    //     );
                    // }
                }
            ]
        });
        $('.tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/basic/',
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
                    field: 'number',
                    title: 'Defect Card No',
                    sortable: !1,
                },
                {
                    field: 'title',
                    title: 'P/N No.',
                    sortable: 'asc',
                    filterable: !1,template: function (t, e, i) {
                        if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a href="/taskcard-routine/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                            return '<a href="/taskcard-eo/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if(t.type.code == "si"){
                            return '<a href="/taskcard-si/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if(t.type.code == "preliminary"){
                            return '<a href="/preliminary/'+t.uuid+'">' + t.title + "</a>"
                        } else {
                            return (
                                'dummy'
                            );
                        }
                    }
                },
                {
                    field: 'skill',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'task.name',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Charge Price',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Subtotal',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Marketing Notes',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    // template: function (t, e, i) {
                    //     return (
                    //         '<button data-toggle="modal" data-target="#modal_price_list_edit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-price" title="Edit"'+
                    //         'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                    //         t.uuid +
                    //         '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                    //         '<button data-toggle="modal" data-target="#modal_price_list" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill add-price" title="Edit"' +
                    //         'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                    //         t.uuid +
                    //         '>\t\t\t\t\t\t\t<i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    //     );
                    // }
                }
            ]
        });
        $('.defect_card_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/jobcard',

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
                serverPaging: !1,
                serverSorting: !1
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
                    field: 'number',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-ppc/'+t.uuid+'">' + t.number + "</a>"
                    }
                },
                {
                    field: 'taskcard.number',
                    title: 'Defect Card No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.title',
                    title: 'JC Ref.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.type.name',
                    title: 'TC No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.task.name',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.description',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.taskcard.description) {
                            data = strtrunc(t.taskcard.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
                {
                    field: 'taskcard.skill.name',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.task.name',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    // template: function (t, e, i) {
                    //     return (
                    //         '<button data-toggle="modal" data-target="#modal_price_list_edit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-price" title="Edit"'+
                    //         'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                    //         t.uuid +
                    //         '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                    //         '<button data-toggle="modal" data-target="#modal_price_list" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill add-price" title="Edit"' +
                    //         'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                    //         t.uuid +
                    //         '>\t\t\t\t\t\t\t<i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    //     );
                    // }
                }
            ]
        });

        // let workpackage_datatables_init = true;
        $('select[name="currency"]').on('change', function () {
            let exchange_id = this.options[this.selectedIndex].innerHTML;
            let exchange_rate = $('input[name=exchange]');
            if (exchange_id === "Rupiah (Rp)") {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", true);
            } else {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", false);
            }
        });

        // $('select[name="work-order"]').on('change', function () {
        //     let project_id = this.options[this.selectedIndex].value;
        //     $.ajax({
        //         url: '/project/' + project_id,
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function (data) {
        //             $('#project_number').html(data.code);
        //             $('#project_title').html(data.title);
        //             $('#name').html(data.customer.name);
        //             $('#customer_id').val(data.customer.uuid);
        //             $.ajax({
        //                 url: '/label/get-customer/' + data.customer.uuid,
        //                 type: 'GET',
        //                 dataType: 'json',
        //                 success: function (respone) {
        //                     let res = JSON.parse(respone);
        //                     $('select[name="attention"]').empty();
        //                     $('select[name="phone"]').empty();
        //                     $('select[name="email"]').empty();
        //                     $('select[name="fax"]').empty();
        //                     $('select[name="address"]').empty();
        //                     for (var i = 0; i < res.length; i++) {
        //                         if(res[i].name){
        //                             $('select[name="attention"]').append(
        //                                 '<option value="' + res[i].name + '">' + res[i].name + '</option>'
        //                             );
        //                         }
        //                         if(res[i].address){
        //                             $('select[name="attention"]').append(
        //                                 '<option value="' + res[i].address + '">' + res[i].address + '</option>'
        //                             );
        //                         }
        //                         if(res[i].fax){
        //                             $('select[name="attention"]').append(
        //                                 '<option value="' + res[i].fax + '">' + res[i].fax + '</option>'
        //                             );
        //                         }
        //                         if(res[i].phones){
        //                             $.each(res[i].phones, function (value) {
        //                                 $('select[name="phone"]').append(
        //                                     '<option value="' + res[i].phones[value] + '">' + res[i].phones[value] + '</option>'
        //                                 );
        //                             });
        //                         }
        //                         if(res[i].emails){
        //                             $.each(res[i].emails, function (value) {
        //                                 $('select[name="email"]').append(
        //                                     '<option value="' + res[i].emails[value] + '">' + res[i].emails[value] + '</option>'
        //                                 );
        //                             });
        //                         }
        //                     }
        //                 }
        //             });
        //             if (workpackage_datatables_init == true) {
        //                 workpackage_datatables_init = false;
        //                 workpackage(data.uuid);
        //             }
        //             else {
        //                 let table = $('.workpackage_datatable').mDatatable();
        //                 table.destroy();
        //                 workpackage(data.uuid);
        //                 table = $('.workpackage_datatable').mDatatable();
        //                 table.originalDataSet = [];
        //                 table.reload();
        //             }
        //         }
        //     });

        // });

        // $('select[name="scheduled_payment_type"]').on('change', function () {
        //     let type = this.options[this.selectedIndex].innerHTML;
        //     if(type === "By Date"){
        //         $.each($('#scheduled_payment '), function () {
        //             $(this).addClass("scheduledPayment");
        //             $(this).val("");
        //             $(this).datetimepicker({
        //                 format: "yyyy-mm-dd",
        //                 todayHighlight: !0,
        //                 autoclose: !0,
        //                 startView: 2,
        //                 minView: 2,
        //                 forceParse: 0,
        //                 pickerPosition: "bottom-left"
        //             });
        //         });
        //     }else{
        //         $.each($('#scheduled_payment '), function () {
        //             $(this).val("");
        //             $(this).removeClass("scheduledPayment");
        //             $(this).datetimepicker( "remove" );
        //         });
        //     }
        // });

        $('.action-buttons').on('click', '.add-additional-quotation', function () {
            // let attention_name = $('#attention').val();
            // let attention_phone = $('#phone').val();
            // let attention_fax = $('#fax').val();
            // let attention_email = $('#email').val();
            // let attention_address = $('#address').val();
            // let scheduled_payment_array = [];
            // let type = $('#scheduled_payment_type').children("option:selected").html();
            // if(type === "By Date"){
            //     $('select[name^=scheduled_payment] ').each(function (i) {
            //         scheduled_payment_array[i] = $(this).val();
            //     });
            // }else{
            //     $('#scheduled_payment ').each(function (i) {
            //         scheduled_payment_array[i] = parseInt($(this).val());
            //     });
            // }
            // scheduled_payment_array.pop();
            let data = new FormData();
            data.append("project_id", project_uuid);
            // data.append("customer_id", $('#customer_id').val());
            data.append("requested_at", $('#date').val());
            data.append("valid_until", $('#valid_until').val());
            data.append("currency_id", $('#currency').val());
            data.append("term_of_condition", $('#term_and_condition').val());
            data.append("exchange_rate", $('#exchange').val());
            data.append("scheduled_payment_type", $('#scheduled_payment_type').val());
            // data.append("scheduled_payment_amount", JSON.stringify(scheduled_payment_array));
            // data.append("attention_name", attention_name);
            // data.append("attention_phone", attention_phone);
            // data.append("attention_fax", attention_fax);
            // data.append("attention_email", attention_email);
            // data.append("attention_address", attention_address);
            data.append("total", 0.000000);
            data.append("subtotal", 0.000000);
            data.append("grandtotal", 0.000000);
            data.append("title", $('#title').val());
            data.append("description", $('#description').val());
            data.append("top_description", $('#term_and_condition').val());
            data.append("title", $('#title').val());


            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: 'post',
                url: '/quotation-additional/',
                processData: false,
                contentType: false,
                data: data,
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.currency_id) {
                        //     $("#currency-error").html(data.errors.currency_id[0]);
                        // }
                        // if (data.errors.customer_id) {
                        //     $("#customer_id-error").html(data.errors.customer_id[0]);
                        // }
                        // if (data.errors.description) {
                        //     $("#description-error").html(data.errors.description[0]);
                        // }
                        // if (data.errors.exchange_rate) {
                        //     $("#exchange-error").html(data.errors.exchange_rate[0]);
                        // }
                        // if (data.errors.project_id) {
                        //     $("#work-order-error").html(data.errors.project_id[0]);
                        // }
                        // if (data.errors.requested_at) {
                        //     $("#requested_at-error").html(data.errors.requested_at[0]);
                        // }
                        // if (data.errors.scheduled_payment_amount) {
                        //     $("#scheduled_payment_amount-error").html(data.errors.scheduled_payment_amount[0]);
                        // }
                        // if (data.errors.scheduled_payment_type) {
                        //     $("#scheduled_payment_type-error").html(data.errors.scheduled_payment_type[0]);
                        // }
                        // if (data.errors.valid_until) {
                        //     $("#valid_until-error").html(data.errors.valid_until[0]);
                        // }
                        // if (data.errors.title) {
                        //     $("#title-error").html(data.errors.title[0]);
                        // }

                        // document.getElementById("name").value = name;
                    } else {

                        toastr.success('Quotation Additional has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/quotation/' + data.uuid + '/edit';


                    }
                }
            });
        });


    }
};

jQuery(document).ready(function () {
    AdditionalTaskQtnCreate.init();
});
