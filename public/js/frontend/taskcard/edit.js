let Item = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/item/',
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
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                // {
                //     field: 'quantity',
                //     title: 'Quantity',
                //     sortable: 'asc',
                //     filterable: !1,
                //     width: 150,
                //     template: function (t) {
                //         return t.name + ' (' + t.symbol + ')'
                //     }
                // },
                // {
                //     field: 'unit',
                //     title: 'Unit',
                //     sortable: 'asc',
                //     filterable: !1,
                //     width: 150,
                //     template: function (t) {
                //         return t.name + ' (' + t.symbol + ')'
                //     }
                // },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    width: 50,
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                                'data-item_id="' + t.uuid + '" ' +
                                'data-unit_id="' + t.uuid+ '">' +
                                    '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });


        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        

        $('.footer').on('click', '.reset', function () {
            window.location.href = '/taskcard/1/edit';
        });

        $('.footer').on('click', '.edit-taskcard', function () {
        //     if ($('#tag :selected').length > 0) {
        //         var selectedtags = [];

        //         $('#tag :selected').each(function (i, selected) {
        //             selectedtags[i] = $(selected).val();
        //         });
        //     }

        //     if (document.getElementById("is_stock").checked) {
        //         is_stock = 1;
        //     } else {
        //         is_stock = 0;
        //     }

        //     if (document.getElementById("is_ppn").checked) {
        //         is_ppn = 1;
        //     } else {
        //         is_ppn = 0;
        //     }

        //     let uuid = $('input[name=uuid]').val();
        //     let code = $('input[name=code]').val();
        //     let name = $('input[name=name]').val();
        //     let description = $('#description').val();
        //     let barcode = $('input[name=barcode]').val();
        //     let unit_id = $('#unit_id').val();
        //     let category = $('#category').val();
        //     let ppn_amount = $('input[name=ppn_amount]').val();
        //     let account_code = $('#account_code').val();

        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type: 'PUT',
        //         url: '/item/' + uuid + '/',
        //         data: {
        //             _token: $('input[name=_token]').val(),
        //             code: code,
        //             name: name,
        //             description: description,
        //             unit_id: unit_id,
        //             category: category,
        //             is_stock: is_stock,
        //             is_ppn: is_ppn,
        //             ppn_amount: ppn_amount,
        //             account_code: account_code,
        //             selectedtags: selectedtags,
        //         },
        //         success: function (data) {
        //             if (data.errors) {
        //                 if (data.errors.code) {
        //                     $('#code-error').html(data.errors.code[0]);
        //                 }

        //                 if (data.errors.name) {
        //                     $('#name-error').html(data.errors.name[0]);
        //                 }

        //                 if (data.errors.unit_id) {
        //                     $('#unit-error').html(data.errors.unit_id[0]);
        //                 }

        //                 if (data.errors.category) {
        //                     $('#category-error').html(data.errors.category[0]);
        //                 }

        //                 document.getElementById('code').value = code;
        //                 document.getElementById('name').value = name;
        //                 document.getElementById('description').value = description;
        //                 document.getElementById('barcode').value = barcode;
        //                 document.getElementById('account_code').value = account_code;

        //             } else {
        //                 $('#code-error').html('');
        //                 $('#name-error').html('');
        //                 $('#description-error').html('');
        //                 $('#barcode-error').html('');
        //                 $('#item-unit').html();
        //                 $('#item-storage').html(code);
        //                 $('input[type=file]').val('');

                        toastr.success('Taskcard has been updated.', 'Success', {
                            timeOut: 5000
                        });
        //             }
        //         }
        //     });
        });


    }
};

jQuery(document).ready(function () {
    Item.init();
});
