let Item = {
    init: function () {
        $(document).ready(function () {
            $('.btn-success').removeClass('add');

            document.getElementById('is_ppn').onchange = function () {
                document.getElementById('ppn_amount').disabled = !this.checked;

                if (document.getElementById("is_ppn").checked) {
                    document.getElementById('ppn_amount').value = 10;
                } else {
                    document.getElementById('ppn_amount').value = '';
                }
            };
        });

        $('.footer').on('click', '.reset', function () {
            item_reset();
        });

        errorMessage = function () {
            $('#code-error').html('');
            $('#name-error').html('');
            $('#unit-error').html('');
            $('#category-error').html('');
            $('#ppn_amount-error').html('');
        };

        $('.footer').on('click', '.add-item', function () {
            errorMessage();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();
            let unit = $('#unit_id').val();
            let manufacturer_id = $('#manufacturer_id').val();
            let ppn_amount = $('input[name=ppn_amount]').val();
            let account_code = $('#account_code').val();

            if ($('#tag :selected').length > 0) {
                var selectedtags = [];

                $('#tag :selected').each(function (i, selected) {
                    selectedtags[i] = $(selected).val();
                });
            }

            if (document.getElementById("is_ppn").checked) {
                is_ppn = 1;
            } else {
                is_ppn = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/service',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    description: description,
                    unit_id: unit,
                    manufacturer_id: manufacturer_id,
                    is_ppn: is_ppn,
                    ppn_amount: ppn_amount,
                    account_code: account_code,
                    selectedtags: selectedtags,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);
                        }

                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }

                        if (data.errors.unit_id) {
                            $('#unit-error').html(data.errors.unit_id[0]);
                        }

                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);
                        }

                        if (data.errors.ppn_amount) {
                            $('#ppn_amount-error').html(data.errors.ppn_amount[0]);
                        }

                        document.getElementById('code').value = code;
                        document.getElementById('name').value = name;
                        document.getElementById('description').value = description;
                        document.getElementById('account_code').value = account_code;

                    } else {
                        errorMessage();
                        toastr.success('Service has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/service/' + data.uuid + '/edit';
                    }
                }
            });
        });

        // Manufacturer

        $('.modal-footer').on('click', '.add-manufacturer', function () {
            let name = $('input[name=name_manufacturer]').val();
            let code = $('input[name=code_manufacturer]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/manufacturer',
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    code: code,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name_manufacturer-error').html(data.errors.name[0]);

                        }
                        if (data.errors.code) {
                            $('#code_manufacturer-error').html(data.errors.code[0]);

                        }
                        document.getElementById('code_manufacturer').value = code;
                        document.getElementById('name_manufacturer').value = name;

                    } else {
                        $('#modal_manufacturer').modal('hide');

                        toastr.success('Manufacturer has been created.', 'Success', {
                            timeOut: 5000
                        });

                        manufacturer();
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Item.init();
});
