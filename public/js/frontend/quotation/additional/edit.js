let AdditionalTaskQtnEdit = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/label/get-customer/' + customer_uuid,
            type: 'GET',
            dataType: "json",
            success: function (response) {
                // console.log(response.attention);
                if (response) {
                    let res = JSON.parse(response.attention);
                    $('select[name="attention"]').empty();
                    $('select[name="phone"]').empty();
                    $('select[name="email"]').empty();
                    $('select[name="fax"]').empty();
                    $('select[name="address"]').empty();
                    if(response.addresses.length){
                        $.each(response.addresses, function( index, value ) {
                            $('select[name="address"]').append(
                                '<option value="' + value.address + '">' + value.address + '</option>'
                            );
                        });
                    }
                    if(response.emails.length){
                        $.each(response.emails, function( index, value ) {
                            $('select[name="email"]').append(
                                '<option value="' + value.address + '">' + value.address + '</option>'
                            );
                        });
                    }
                    if(response.faxes.length){
                        $.each(response.faxes, function( index, value ) {
                            $('select[name="fax"]').append(
                                '<option value="' + value.number + '">' +value.number + '</option>'
                            );
                        });
                    }
                    if(response.phones.length){
                        $.each(response.phones, function( index, value ) {
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

        $('.materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation/'+quotation_uuid+'/defectcard/item',
                        map: function (raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }

                            // console.log(dataSet);
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
                    field: 'defectcard.code',
                    title: 'DefectCard',
                    sortable: !1,
                },
                {
                    field: 'item.code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'item.name',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit.name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unitPrice',
                    title: 'Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ForeignFormatter.format(t.unitPrice);
                    }
                },
                {
                    field: 'price_amount',
                    title: 'Selling  Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ForeignFormatter.format(t.price_amount);
                    }
                },
                {
                    field: 'subtotal',
                    title: 'Sub Total',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ForeignFormatter.format(t.quantity*t.price_amount);
                    }
                },
                {
                    field: 'note',
                    title: 'Marketing Notes',
                    sortable: 'asc',
                    filterable: !1,
                    width:150,

                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_item_price" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item-price" title="Edit" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation/'+quotation_uuid+'/defectcard/tool',
                        map: function (raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }

                            // console.log(dataSet);
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
                    field: 'defectcard.code',
                    title: 'DefectCard',
                    sortable: !1,
                },
                {
                    field: 'item.code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'item.name',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit.name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unitPrice',
                    title: 'Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ForeignFormatter.format(t.unitPrice);
                    }
                },
                {
                    field: 'price_amount',
                    title: 'Selling  Unit Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ForeignFormatter.format(t.price_amount);
                    }
                },
                {
                    field: 'subtotal',
                    title: 'Sub Total',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t){
                        return ForeignFormatter.format(t.quantity*t.price_amount);
                    }
                },
                {
                    field: 'note',
                    title: 'Marketing Notes',
                    sortable: 'asc',
                    filterable: !1,
                    width:150,

                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_item_price" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item-price" title="Edit" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
        
        $('.defect_card_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/defectcard/'+project_uuid+'/selected',

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
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'code',
                    title: 'Defect Card No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'JC Ref.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.jobcardable.number',
                    title: 'TC No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'defectcard_skill',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'created_by',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
        });

        $('.footer').on('click', '.update-quotation', function () {
            calculate_total();
            
            let is_ppn =  $('#is_ppn').prop("checked");
            let ppn = 0;
            if(is_ppn){
                ppn = $('#grand_total_rupiah').attr("value") * 1.1;
                is_ppn = 1;
            }else{
                ppn = $('#grand_total_rupiah').attr("value") * 0.1;
                is_ppn = 0;
            }
            let attention_name = $('#attention').val();
            let attention_phone = $('#phone').val();
            let attention_fax = $('#fax').val();
            let attention_email = $('#email').val();
            let attention_address = $('#address').val();

            let scheduled_payment_array = [];
            let scheduled_payment_datatable = $('#scheduled_payments_datatables').DataTable();
            let allData = scheduled_payment_datatable.rows().data();
            for(let ind = 0 ; ind < allData.length ; ind++){
                let container = [];
                container[0] = allData[ind]["amount"];
                container[1] = allData[ind]["amount_percentage"];
                container[2] = allData[ind]["description"];
                container[3] = allData[ind]["work_progress"];
                scheduled_payment_array.push(container);
            }

            let charge = [];
            let chargeInputs = $('input[type="number"][name^="charge"]');
            //get all values
            for (let i = 0; i < chargeInputs.length; i++) {
                charge[i] = parseInt($(chargeInputs[i]).val());
            }
            charge.pop();
            let chargeType = [];
            //get all values
            $("input[name^=charge_type]").each(function() {
                chargeType.push($(this).val());
              });
            chargeType.pop();

            let data = new FormData();
            data.append("chargeType", JSON.stringify(chargeType));
            data.append("project_id", project_uuid);
            data.append("customer_id", $('#customer_id').val());
            data.append("requested_at", $('#date').val());
            data.append("valid_until", $('#valid_until').val());
            data.append("currency_id", $('#currency').val());
            data.append("term_of_condition", $('#term_and_condition').val());
            data.append("exchange_rate", $('#exchange').val());
            data.append("scheduled_payment_amount", JSON.stringify(scheduled_payment_array));
            data.append("attention_name", attention_name);
            data.append("attention_phone", attention_phone);
            data.append("attention_fax", attention_fax);
            data.append("attention_email", attention_email);
            data.append("attention_address", attention_address);
            data.append("total", 0.000000);
            data.append("title", $('#title').val());
            data.append("description", $('#description').val());
            data.append("top_description", $('#term_and_condition').val());
            data.append("subtotal", $('#sub_total').attr("value"));
            data.append("grandtotal", $('#grand_total').attr("value"));
            data.append("manhour_rate", $('#manhour_rate').val());
            data.append("total_manhour", $('#total_manhour').attr('value'));
            data.append("ppn", ppn);
            data.append("is_ppn",is_ppn);
            data.append("charge", JSON.stringify(charge));
            data.append('_method', 'PUT');

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: 'post',
                url: '/quotation-additional/' + quotation_uuid,
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

                        // document.getElementById("name").value = name;
                    } else {

                        toastr.success('Quotation has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/quotation/' + response.uuid + '/edit';

                    }
                }
            });
        });

        $('.materials_datatable').on('click','.edit-item-price', function edit () {
            // save_changes_button();

            let triggerid = $(this).data('uuid');
            // alert(triggerid);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/quotation/qtn-defectcard-item/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('uuid').value = data.uuid;
                    document.getElementById('qty').value = data.quantity;
                    document.getElementById('price').value = data.price_amount;
                    document.getElementById('note').value = data.note;
                    $.ajax({
                        url: '/get-units/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (unit) {
                            $('select[name="unit_id"]').empty();

                            $.each(unit, function (key, value) {
                                if(key == data.unit_id){
                                    $('select[name="unit_id"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="unit_id"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    );
                                }
                            });
                        }
                    });

                    // $('.btn-success').addClass('update');
                    // $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        $('.tools_datatable').on('click','.edit-item-price', function edit () {
            // save_changes_button();

            let triggerid = $(this).data('uuid');
            // alert(triggerid);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/quotation/qtn-defectcard-item/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('uuid').value = data.uuid;
                    document.getElementById('qty').value = data.quantity;
                    document.getElementById('price').value = data.price_amount;
                    document.getElementById('note').value = data.note;
                    $.ajax({
                        url: '/get-units/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (unit) {
                            $('select[name="unit_id"]').empty();

                            $.each(unit, function (key, value) {
                                if(key == data.unit_id){
                                    $('select[name="unit_id"]').append(
                                        '<option value="' + key + '" selected>' + value + '</option>'
                                    );
                                }
                                else{
                                    $('select[name="unit_id"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    );
                                }
                            });
                        }
                    });

                    // $('.btn-success').addClass('update');
                    // $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        $('.modal-footer').on('click', '.add-item-price', function () {
            let quantity = $('input[name=qty]').val();
            let price_amount = $('input[name=price]').val();
            let unit_id =$('#unit_id').val();
            let note =$('#note').val();
            let triggerid = $('input[name=uuid]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/quotation/qtn-defectcard-item/' + triggerid,
                data: {
                    _token: $('input[name=_token]').val(),
                    uuid: triggerid,
                    quantity: quantity,
                    unit_id: unit_id,
                    price_amount: price_amount,
                    note: note
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.quantity) {
                            $('#qty-limit-error').html(data.errors.quantity[0]);
                        }
                        // if (data.errors.symbol) {
                        //     $('#symbol-error').html(data.errors.symbol[0]);

                        // }
                        // if (data.errors.type) {
                        //     $('#type-error').html(data.errors.type[0]);

                        // }

                    } else {
                        // save_changes_button();
                        // unit_reset();
                        $('#modal_item_price').modal('hide');

                        toastr.success('Selling Price has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.materials_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        table = $('.tools_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        // table = $('.non_routine_tools_datatable').mDatatable();

                        // table.originalDataSet = [];
                        // table.reload();

                        // table = $('.non_routine_materials_datatable').mDatatable();
                        // table.originalDataSet = [];
                        // table.reload();

                        // table = $('.htcrr_materials_datatable').mDatatable();
                        // table.originalDataSet = [];
                        // table.reload();

                        // table = $('.htcrr_materials_datatable').mDatatable();
                        // table.originalDataSet = [];
                        // table.reload();
                    }
                }
            });
        });

        $('.nav-tabs').on('click', '.items', function () {

            let table = $('.materials_datatable').mDatatable();
            table.originalDataSet = [];
            table.reload();

            let table2 = $('.tools_datatable').mDatatable();
            table2.originalDataSet = [];
            table2.reload();

        });

    }
};

jQuery(document).ready(function () {
    AdditionalTaskQtnEdit.init();
});

$('.action-buttons').on('click', '.discount-htcrr', function () {
    let type = $('select[name="discount-type"]').val();
    let discount = $('input[name="discount"').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/quotation-additional/'+quotation_uuid+'/discount/',
        data: {
            _token: $('input[name=_token]').val(),
            discount_type: type,
            discount_value: discount,
        },
        success: function (data) {
            if (data.errors) {
                // if (data.errors.name) {
                //     $('#name-error').html(data.errors.name[0]);

                //     document.getElementById('name').value = name;
                // }
            } else {
                $('#discount').modal('hide');


                toastr.success('Discount has been updated.', 'Success', {
                    timeOut: 5000
                });


                let table = $('.summary_datatable').mDatatable();


                table.originalDataSet = [];
                table.reload();
            }
        }
    });
});

$('.nav-tabs').on('click', '.summary', function () {

    let summary = $('.summary_datatable').mDatatable();

    summary.originalDataSet = [];
    summary.reload();

    calculate_total();
});

$('.calculate').on('click', function () {
    calculate_total();
});



function calculate_total() {
    let value = [];
    let inputs = $(".charge");
    let currency = $("#currency").val();
    let exchange_rate = $("#exchange").val();
    let grandTotal = grandTotalRupiah = 0;
    //get all values
    for (let i = 0; i < inputs.length; i++) {
        value[i] = parseFloat($(inputs[i]).val());
    }
    
    const arrSum = arr => arr.reduce((a, b) => a + b, 0);
    let total_discount = $("#total_discount").attr("value");
    let subTotal = $('#sub_total').attr("value");
    grandTotal = parseFloat(subTotal) - parseFloat(total_discount) + parseFloat(arrSum(value));
    
    if(currency !== 1){
        grandTotalRupiah = ( parseFloat(subTotal) - parseFloat(total_discount) + parseFloat(arrSum(value)) ) * exchange_rate;
    }
  
    $('#grand_total').attr("value", grandTotal);
    $('#grand_total_rupiah').attr("value", grandTotalRupiah);
    $('#grand_total').html(ForeignFormatter.format(grandTotal));
    $('#grand_total_rupiah').html(IDRformatter.format(grandTotalRupiah));
  }