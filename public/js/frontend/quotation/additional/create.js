let AdditionalTaskQtnCreate = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

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
                    field: 'jobcard.taskcard.number',
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

        $('.action-buttons').on('click', '.add-additional-quotation', function () {
            let attention_name = $('#attention').val();
            let attention_phone = $('#phone').val();
            let attention_fax = $('#fax').val();
            let attention_email = $('#email').val();
            let attention_address = $('#address').val();
            let scheduled_payment_array = [];
            let type = $('#scheduled_payment_type').children("option:selected").html();
            if(type === "By Date"){
                $('input[name^=scheduled_payment] ').each(function (i) {
                    scheduled_payment_array[i] = $(this).val();
                    console.log($(this).val());
                });
            }else{
                $('#scheduled_payment ').each(function (i) {
                    scheduled_payment_array[i] = parseInt($(this).val());
                });
            }
            scheduled_payment_array.pop();
            let data = new FormData();
            data.append("project_id", project_uuid);
            data.append("customer_id", $('#customer_uuid').val());
            data.append("requested_at", $('#date').val());
            data.append("valid_until", $('#valid_until').val());
            data.append("currency_id", $('#currency').val());
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

                        // window.location.href = '/quotation-additional/' + data.uuid + '/edit';


                    }
                }
            });
        });


    }
};

$(document).ready(function () {
    let customer_uuid = $('#customer_uuid').val();
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
                console.log(res);
                $('select[name="attention"]').empty();
                $('select[name="phone"]').empty();
                $('select[name="email"]').empty();
                $('select[name="fax"]').empty();
                $('select[name="address"]').empty();
                // From customer relationship
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

                // from  attention
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
});

jQuery(document).ready(function () {
    AdditionalTaskQtnCreate.init();
});
