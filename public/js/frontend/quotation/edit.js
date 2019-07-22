

let Quotation = {
    init: function () {
        let exchange_rate_value = $('input[name=exchange]').val();
        $(document).ready(function () {
            let GTotal = 0;
            if(currency == 1){
                GTotal = IDRformatter.format($("#grand_total_rupiah").html());
                $("#grand_total_rupiah").html(GTotal);
            }else{
                GTotal = ForeignFormatter.format($("#grand_total").html());
                $("#grand_total").html(GTotal);
                GTotal = IDRformatter.format($("#grand_total_rupiah").html());
                $("#grand_total_rupiah").html(GTotal);
            }
        });

        $('select[name="currency"]').on('change', function () {
            let exchange_id = this.options[this.selectedIndex].innerHTML;
            let exchange_rate = $('input[name=exchange]');
            if (exchange_id.includes("Rp")) {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", true);
            } else {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", false);
            }
        });

        let edit = $(".m_datatable").on("click", ".edit", function () {
            $("#button").show();
            $("#simpan").text("Perbarui");

            let triggerid = $(this).data("id");

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "get",
                url: "/category/" + triggerid + "/edit",
                success: function (data) {
                    document.getElementById("id").value = data.id;
                    document.getElementById("name").value = data.name;

                    $(".btn-success").addClass("update");
                    $(".btn-success").removeClass("add");
                },
                error: function (jqXhr, json, errorThrown) {
                    let errorsHtml = "";
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $("#kategori-error").html(value);
                    });
                }
            });
        });

        let workpackage_datatables_init = true;
        $(document).ready(function () {
            $.ajax({
                url: '/project/' + project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (workpackage_datatables_init == true) {
                        workpackage_datatables_init = false;
                        workpackage(data.uuid);
                    }
                    else {
                        let table = $('.workpackage_datatable').mDatatable();
                        table.destroy();
                        workpackage(data.uuid);
                        table = $('.workpackage_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

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
                success: function (respone) {
                    if (respone) {
                        let res = JSON.parse(respone);
                        $('select[name="attention"]').empty();
                        $('select[name="phone"]').empty();
                        $('select[name="email"]').empty();
                        $('select[name="fax"]').empty();
                        $('select[name="address"]').empty();
                        for (var i = 0; i < res.length; i++) {
                            if (res[i].name) {
                                $('select[name="attention"]').append(
                                    '<option value="' + res[i].name + '">' + res[i].name + '</option>'
                                );
                            }
                            if (res[i].address) {
                                $('select[name="attention"]').append(
                                    '<option value="' + res[i].address + '">' + res[i].address + '</option>'
                                );
                            }
                            if (res[i].fax) {
                                $('select[name="attention"]').append(
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
                        console.log("empty");

                    }

                }
            });
        });

        $('.summary_datatable').on('click', '.discount', function edit() {
            document.getElementById("workpackage_uuid").value = $(this).data('uuid');
        });

        $('.calculate').on('click', function calculate_total() {
            let value = [];
            let inputs = $(".charge");
            let currency = $("#currency").val();
            let exchange_rate = $("#exchange").val();
            let grandTotal = grandTotalRupiah = 0;
            //get all values
            for (let i = 0; i < inputs.length; i++) {
                value[i] = parseInt($(inputs[i]).val());
            }
            const arrSum = arr => arr.reduce((a, b) => a + b, 0);
            let subTotal = $('#sub_total').attr("value");
            grandTotal = parseInt(subTotal) + parseInt(arrSum(value));

            if(currency !== 1){
                grandTotalRupiah = ( parseInt(subTotal) + parseInt(arrSum(value)) ) * exchange_rate;
            }
                        
            $('#grand_total').attr("value", grandTotal);
            $('#grand_total_rupiah').attr("value", grandTotalRupiah);
            $('#grand_total').html("$ "+ForeignFormatter.format(grandTotal));
            $('#grand_total_rupiah').html(IDRformatter.format(grandTotalRupiah));
        });

        $('.action-buttons').on('click', '.discount', function () {
            let type = $('#discount-type').val();
            let discount = $('input[name=discount]').val();
            let quotation = $('#quotation_uuid').val();
            let workpackage = $('#workpackage_uuid').val();


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/quotation/' + quotation + '/workpackage/' + workpackage + '/discount',
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

        $('.nav-tabs').on('click', '.workpackage', function () {
            let workpackage = $('.workpackage_datatable').mDatatable();

            workpackage.originalDataSet = [];
            workpackage.reload();
        });

        $('.nav-tabs').on('click', '.summary', function () {

            let summary = $('.summary_datatable').mDatatable();

            summary.originalDataSet = [];
            summary.reload();
            
            let value = [];
            let inputs = $(".charge");
            let currency = $("#currency").val();
            let exchange_rate = $("#exchange").val();
            let grandTotal = grandTotalRupiah = 0;
            //get all values
            for (let i = 0; i < inputs.length; i++) {
                value[i] = parseInt($(inputs[i]).val());
            }
            const arrSum = arr => arr.reduce((a, b) => a + b, 0);
            let subTotal = $('#sub_total').attr("value");
            grandTotal = parseInt(subTotal) + parseInt(arrSum(value));

            if(currency !== 1){
                grandTotalRupiah = ( parseInt(subTotal) + parseInt(arrSum(value)) ) * exchange_rate;
            }
                        
            $('#grand_total').attr("value", grandTotal);
            $('#grand_total_rupiah').attr("value", grandTotalRupiah);
            $('#grand_total').html("$ "+ForeignFormatter.format(grandTotal));
            $('#grand_total_rupiah').html(IDRformatter.format(grandTotalRupiah));
        });

        $('select[name="work-order"]').on('change', function () {
            let project_id = this.options[this.selectedIndex].value;
            $.ajax({
                url: '/project/' + project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#project_number').html(data.title);
                    $('#name').html(data.customer.name);
                    $('#customer_id').val(data.customer.uuid);

                    if (workpackage_datatables_init == true) {
                        workpackage_datatables_init = false;
                        workpackage(data.uuid);
                    }
                    else {
                        let table = $('.workpackage_datatable').mDatatable();
                        table.destroy();
                        workpackage(data.uuid);
                        table = $('.workpackage_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

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
                type: 'GET',
                dataType: "json",
                url: '/label/get-customer/' + customer_uuid,
                success: function (data) {
                    // adding customer phones  option on selectBox inside identifier
                    if (jQuery.isEmptyObject(data.phones)) {
                        console.log('empty phones');
                    } else {
                        console.log('get the phones data');
                        $.each(data.phones, function (key, value) {
                            if (value.ext === null) {
                                phoneNumber = value.number;
                            } else {
                                phoneNumber = value.number + ' Ext. ' + value.ext;
                            }
                            let phoneNumberOption = new Option(phoneNumber, value.uuid);
                            phone.append(phoneNumberOption);
                        });
                    }

                    // adding customer faxes  option on selectBox inside identifier
                    if (jQuery.isEmptyObject(data.faxes)) {
                        console.log('empty faxes');
                    } else {
                        console.log('get the faxes data');
                        $.each(data.faxes, function (key, value) {
                            let faxNumberOption = new Option(value.number, value.uuid);
                            fax.append(faxNumberOption);
                        });
                    }

                    // Adding customer addresses option on selectBox inside identifier
                    if (jQuery.isEmptyObject(data.addresses)) {
                        console.log('empty addresses');
                    } else {
                        console.log('get the addresses data');
                        $.each(data.addresses, function (key, value) {
                            let addressesOption = new Option(value.address, value.uuid);
                            addresses.append(addressesOption);
                        });
                    }

                    // Adding customer emails option on selectBox inside identifier
                    if (jQuery.isEmptyObject(data.emails)) {
                        console.log('empty emails');
                    } else {
                        console.log('get the emails data');
                        $.each(data.emails, function (key, value) {
                            let emailsOption = new Option(value.address, value.uuid);
                            emails.append(emailsOption);
                        });
                    }
                }
            });
        });

        $('select[name="scheduled_payment_type"]').on('change', function () {
            let type = this.options[this.selectedIndex].innerHTML;
            if(type === "By Date"){
                $.each($('#scheduled_payment '), function () {
                    $(this).addClass("scheduledPayment");
                    $(this).val("");
                    $(this).datetimepicker({
                        format: "yyyy-mm-dd",
                        todayHighlight: !0,
                        autoclose: !0,
                        startView: 2,
                        minView: 2,
                        forceParse: 0,
                        pickerPosition: "bottom-left"
                    });
                });
            }else{
                $.each($('#scheduled_payment '), function () {
                    $(this).val("");
                    $(this).removeClass("scheduledPayment");
                    $(this).datetimepicker( "remove" );
                });
            }
        });
        
        $('.footer').on('click', '.add-quotation', function () {
            let is_ppn =  $('#is_ppn').prop("checked");
            let ppn = 0;
            console.log($('#grand_total_rupiah'));
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
            let type = $('#scheduled_payment_type').children("option:selected").html();
            if(type === "By Date"){
                $('select[name^=scheduled_payment] ').each(function (i) {
                    scheduled_payment_array[i] = $(this).val();
                });
            }else{
                $('#scheduled_payment ').each(function (i) {
                    scheduled_payment_array[i] = parseInt($(this).val());
                });
            }
            scheduled_payment_array.pop();
            let charge = [];
            let chargeInputs = $('input[name^="charge"]');
            //get all values
            for (let i = 0; i < chargeInputs.length; i++) {
                charge[i] = parseInt($(chargeInputs[i]).val());
            }
            charge.pop();
            let chargeType = [];
            //get all values
            $("select[name^=charge_type]").each(function() {
                chargeType.push($(this).children("option:selected").val());
              });
            chargeType.pop();

            let data = new FormData();
            data.append("chargeType", JSON.stringify(chargeType));
            data.append("project_id", $('#work-order').val());
            data.append("customer_id", $('#customer_id').val());
            data.append("requested_at", $('#date').val());
            data.append("valid_until", $('#valid_until').val());
            data.append("currency_id", $('#currency').val());
            data.append("term_of_payment", $('#term_of_payment').val());
            data.append("term_of_condition", $('#term_and_condition').val());
            data.append("exchange_rate", $('#exchange').val());
            data.append("scheduled_payment_type", $('#scheduled_payment_type').val());
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
            data.append("title", $('#title').val());
            data.append("ppn", ppn);
            data.append("is_ppn",is_ppn);
            data.append("charge", JSON.stringify(charge));
            data.append('_method', 'PUT');

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: 'post',
                url: '/quotation/' + quotation_uuid,
                processData: false,
                contentType: false,
                data: data,
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.currency_id) {
                            $("#currency-error").html(data.errors.currency_id[0]);
                        }
                        if (data.errors.customer_id) {
                            $("#customer_id-error").html(data.errors.customer_id[0]);
                        }
                        if (data.errors.description) {
                            $("#description-error").html(data.errors.description[0]);
                        }
                        if (data.errors.exchange_rate) {
                            $("#exchange-error").html(data.errors.exchange_rate[0]);
                        }
                        if (data.errors.project_id) {
                            $("#work-order-error").html(data.errors.project_id[0]);
                        }
                        if (data.errors.requested_at) {
                            $("#requested_at-error").html(data.errors.requested_at[0]);
                        }
                        if (data.errors.scheduled_payment_amount) {
                            $("#scheduled_payment_amount-error").html(data.errors.scheduled_payment_amount[0]);
                        }
                        if (data.errors.scheduled_payment_type) {
                            $("#scheduled_payment_type-error").html(data.errors.scheduled_payment_type[0]);
                        }
                        if (data.errors.valid_until) {
                            $("#valid_until-error").html(data.errors.valid_until[0]);
                        }

                        document.getElementById("name").value = name;
                    } else {

                        toastr.success('Quotation has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/quotation/' + response.uuid + '/edit';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Quotation.init();
});
