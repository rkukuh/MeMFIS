let Item = {
    init: function () {
        $('.item_unit_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-uom/' + item_uuid + '/',
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
                    field: 'uom.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    width: 50
                },
                {
                    field: 'name',
                    title: 'Unit',
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
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id="' + t.uom.item_id + '"' +
                            'data-unit_id="' + t.uom.unit_id + '"' +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.item_storage_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-item-storages/' + item_uuid + '/',
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
                    field: 'name',
                    title: 'Storage',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'pivot.max',
                    title: 'Max',
                    sortable: 'asc',
                    filterable: !1,
                    width: 50
                },
                {
                    field: 'pivot.min',
                    title: 'Min',
                    sortable: 'asc',
                    filterable: !1,
                    width: 50
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id="' + t.pivot.item_id + '"' +
                            'data-storage_id="' + t.pivot.storage_id + '"' +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

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

        $('.footer').on('click', '.edit-item', function () {

            if ($('#tag :selected').length > 0) {
                var selectedtags = [];

                $('#tag :selected').each(function (i, selected) {
                    selectedtags[i] = $(selected).val();
                });
            }

            // if (document.getElementById("is_stock").checked) {
            is_stock = 1;
            // } else {
            //     is_stock2 = 0;
            // }

            // alert(is_stock);
            // if (document.getElementById("is_ppn").checked) {
            //     is_ppn = 1;
            // } else {
            //     is_ppn = 0;
            // }
            let account_code = $('#account_code').val();
            let uuid = $('input[name=id]').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();
            let barcode = $('input[name=barcode]').val();
            let ppn_amount = $('input[name=ppn_amount]').val();
            let category = $('#category').val();
            // let quantity = $('input[name=quantity]').val();
            let unit = $('#unit_item').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/item/' + uuid + '/',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    // quantity: quantity,
                    unit: unit,
                    // is_stock: is_stock,
                    // is_ppn: is_ppn,
                    // barcode: barcode,
                    ppn: ppn_amount,
                    description: description,
                    account_code: account_code,
                    selectedtags: selectedtags,
                    category: category

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

                        if (unit == "Select a Unit") {
                            $('#unit-error').html("The Unit field is required.");
                        }

                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);
                        }

                        document.getElementById('code').value = code;
                        document.getElementById('name').value = name;
                        document.getElementById('description').value = description;
                        document.getElementById('barcode').value = barcode;
                        document.getElementById('accountcode2').value = accountcode2;

                    } else {

                        $('input[type=file]').val("");
                        $('#code-error').html('');
                        $('#name-error').html('');
                        $('#description-error').html('');
                        $('#barcode-error').html('');
                        $('#item-storage').html(code);
                        $('#item-unit').html();

                        // document.getElementById('item-uom').removeAttribute('disabled');
                        // document.getElementById('item-minmaxstock').removeAttribute('disabled');
                        // item_reset();

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        // location.reload();
                        // photo();
                    }
                }
            });
        });

        // $(function () {

        //     // klik();
        //     let inputFile = $('#myInput');
        //     let button = $('#myButton');
        //     let buttonSubmit = $('#add-item');
        //     let filesContainer = $('#myFiles');
        //     let files = [];

        //     inputFile.change(function () {
        //         let newFiles = [];
        //         for (let index = 0; index < inputFile[0].files.length; index++) {
        //             let file = inputFile[0].files[index];
        //             newFiles.push(file);
        //             files.push(file);
        //         }

        //         newFiles.forEach(file => {
        //             let fileElement = $(`<p>${file.name}</p>`);
        //             fileElement.data('fileData', file);
        //             filesContainer.append(fileElement);

        //             fileElement.click(function (event) {
        //                 let fileElement = $(event.target);
        //                 let indexToRemove = files.indexOf(fileElement.data('fileData'));
        //                 fileElement.remove();
        //                 files.splice(indexToRemove, 1);
        //             });
        //         });
        //     });

        //     button.click(function () {
        //         inputFile.click();
        //     });
        //     $('.footer').on('click', '.edit-item', function () {
        //         let formData = new FormData();
        //         let code = $('input[name=code]').val();
        //         formData.append('code', code);

        //         let z = 0;
        //         files.forEach(file => {
        //             formData.append('file' + z, file);
        //             z++;
        //         });

        //         // console.log('Sending...');

        //             $.ajax({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 },

        //                 url: '/post-photos',
        //                 data: formData,
        //                 processData: false,
        //                 contentType: false,
        //                 type: 'POST',
        //                 success: function (data) {
        //                     if (data.uploaded == true) {
        //                         // alert('sukses');
        //                     }
        //                 },
        //                 error: function (err) {
        //                     alert(err);
        //                 }
        //             });
        //     });
        // });

        let simpan2 = $('.modal-footer').on('click', '.add-uom', function () {
            let code = $('input[name=code]').val();
            let uom_quantity = $('input[name=uom_quantity]').val();
            let unit = $('#unit').val();
            // let unit2 = $('#unit2').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item-unit',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    quantity: quantity,
                    uom_quantity: uom_quantity,
                    unit: unit,
                    // unit2: unit2
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.quantity) {
                            $('#quantity-error').html(data.errors.quantity[0]);
                        }

                        if (data.errors.uom_quantity) {
                            $('#uom_quantity-error').html(data.errors.uom_quantity[0]);
                        }

                        if (data.errors.unit) {
                            $('#unit-error').html(data.errors.unit[0]);
                        }

                        if (data.errors.unit2) {
                            $('#unit2-error').html(data.errors.unit2[0]);
                        }

                        document.getElementById('quantity').value = quantity;
                        document.getElementById('uom_quantity').value = uom_quantity;
                        document.getElementById('unit').value = unit;
                        document.getElementById('unit2').value = unit2;
                    } else {
                        $('#modal_uom').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        uom_reset()

                        let table = $('.item_unit_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                    }
                }
            });
        });

        let simpan3 = $('.modal-footer').on('click', '.add-stock', function () {
            let code = $('input[name=code]').val();
            $('#name-error').html('');
            let storage = $('#storage').val();
            let min = $('input[name=min]').val();
            let max = $('input[name=max]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item-storage',
                data: {
                    _token: $('input[name=_token]').val(),
                    storage: storage,
                    min: min,
                    max: max,
                    code: code,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.storage) {
                            $('#storage-error').html(data.errors.storage[0]);
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                        if (data.errors.min) {
                            $('#min-error').html(data.errors.min[0]);
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                        if (data.errors.max) {
                            $('#max-error').html(data.errors.max[0]);
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                    } else {
                        $('#modal_minmaxstock').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        minmaxstock_reset();
                        let table = $('.item_storage_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        // let remove_uom = $('.item_unit_datatable').on('click', '.delete', function () {
        //     let triggerid = $(this).data('id');
        //     let triggerid2 = $(this).data('unit_id');
        //     // alert(triggerid);

        //     swal({
        //         title: 'Are you sure?',
        //         text: 'You will not be able to recover this imaginary file!',
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes, delete it!',
        //         cancelButtonText: 'No, keep it'
        //     }).then(result => {
        //         if (result.value) {
        //             $.ajax({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
        //                         'content'
        //                     )
        //                 },
        //                 type: 'DELETE',
        //                 url: '/item-unit/' + triggerid + '/'+ triggerid2,
        //                 success: function (data) {
        //                     toastr.success(
        //                         'Data Berhasil Dihapus.',
        //                         'Sukses!', {
        //                             timeOut: 5000
        //                         }
        //                     );

        //                     let table = $('.item_unit_datatable').mDatatable();
        //                     table.originalDataSet =[];
        //                     table.reload();
        //                 },
        //                 error: function (jqXhr, json, errorThrown) {
        //                     let errorsHtml = '';
        //                     let errors = jqXhr.responseJSON;

        //                     $.each(errors.errors, function (index, value) {
        //                         $('#delete-error').html(value);
        //                     });
        //                 }
        //             });
        //             swal(
        //                 'Deleted!',
        //                 'Your imaginary file has been deleted.',
        //                 'success'
        //             );
        //         } else {
        //             swal(
        //                 'Cancelled',
        //                 'Your imaginary file is safe :)',
        //                 'error'
        //             );
        //         }
        //     });
        // });

        // let remove_storages = $('.item_storage_datatable').on('click', '.delete', function () {
        //     let triggerid = $(this).data('id');
        //     let triggerid2 = $(this).data('storage_id');
        //     // alert(triggerid);

        //     swal({
        //         title: 'Are you sure?',
        //         text: 'You will not be able to recover this imaginary file!',
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes, delete it!',
        //         cancelButtonText: 'No, keep it'
        //     }).then(result => {
        //         if (result.value) {
        //             $.ajax({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
        //                         'content'
        //                     )
        //                 },
        //                 type: 'DELETE',
        //                 url: '/item-storage/' + triggerid + '/'+ triggerid2,
        //                 success: function (data) {
        //                     toastr.success(
        //                         'Data Berhasil Dihapus.',
        //                         'Sukses!', {
        //                             timeOut: 5000
        //                         }
        //                     );

        //                     let table = $('.item_storage_datatable').mDatatable();
        //                     table.originalDataSet =[];
        //                     table.reload();
        //                 },
        //                 error: function (jqXhr, json, errorThrown) {
        //                     let errorsHtml = '';
        //                     let errors = jqXhr.responseJSON;

        //                     $.each(errors.errors, function (index, value) {
        //                         $('#delete-error').html(value);
        //                     });
        //                 }
        //             });
        //             swal(
        //                 'Deleted!',
        //                 'Your imaginary file has been deleted.',
        //                 'success'
        //             );
        //         } else {
        //             swal(
        //                 'Cancelled',
        //                 'Your imaginary file is safe :)',
        //                 'error'
        //             );
        //         }
        //     });
        // });
    }
};

jQuery(document).ready(function () {
    Item.init();
});
