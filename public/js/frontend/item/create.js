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

        $('.footer').on('click', '.add-item', function () {
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val()
            let unit = $('#unit').val();
            let category = $('#category').val();
            let ppn_amount = $('input[name=ppn_amount]').val();
            let account_code = $('#account_code').val();

            if (document.getElementById("is_stock").checked) {
                is_stock = 1;
            } else {
                is_stock = 0;
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
                url: '/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    description: description,
                    unit: unit,
                    category: category,
                    is_stock: is_stock,
                    is_ppn: is_ppn,
                    ppn_amount: ppn_amount,
                    account_code: account_code,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);
                        }

                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }

                        if (data.errors.unit) {
                            $('#unit-error').html(data.errors.unit[0]);
                        }

                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);
                        }

                        document.getElementById('code').value = code;
                        document.getElementById('name').value = name;
                        document.getElementById('description').value = description;
                        document.getElementById('account_code').value = account_code;

                    } else {
                        $('#code-error').html('');
                        $('#name-error').html('');
                        $('#description-error').html('');

                        document.getElementById('item-uom').removeAttribute('disabled');
                        document.getElementById('item-storage_stock').removeAttribute('disabled');

                        $('#item-storage').html(code);
                        $('#item-unit').html(code);

                        toastr.success('Material has been created.', 'Success', {
                            timeOut: 5000
                        });

                        save_changes_button();

                        window.location.href = '/item/' + data.uuid + '/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Item.init();
});
