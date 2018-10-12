let Item = {
    init: function () {
        $('.m_datatable1').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-uom/' + code + '/',
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
                    field: 'quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
            ]
        });

        $('.m_datatable2').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-item-storages/' + code + '/',
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
                    field: 'max',
                    title: 'Max',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'min',
                    title: 'Min',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
            ]
        });

        $(document).ready(function () {
            $('.btn-success').removeClass('add');
            document.getElementById('isppn').onchange = function () {
                document.getElementById('ppn').disabled = !this.checked;
            };
        });

        $('.footer').on('click', '.reset', function () {
            item_reset();
        });


        $('.footer').on('click', '.edit-item', function () {

            if ($('#category :selected').length > 0) {
                var selectedcategories = [];
                $('#category :selected').each(function (i, selected) {
                    selectedcategories[i] = $(selected).val();
                });
            }


            if (document.getElementById("isstock").checked) {
                isstock = 1;
            } else {
                isstock = 0;
            }

            if (document.getElementById("isppn").checked) {
                isppn = 1;
            } else {
                isppn = 0;
            }
            let accountcode2 = $('#accountcode2').val();
            let uuid = $('input[name=id]').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();
            let barcode = $('input[name=barcode]').val();
            let ppn = $('input[name=ppn]').val();
            alert(name);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/item/'+uuid+'/',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    barcode: barcode,
                    ppn: ppn,
                    description: description,
                    accountcode: accountcode2,
                    selectedcategories: selectedcategories

                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                        }

                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

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
                        document.getElementById('item-uom').removeAttribute('disabled');
                        document.getElementById('item-minmaxstock').removeAttribute('disabled');
                        $('#item-storage').html(code);
                        $('#item-unit').html();
                        // item_reset();
                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        // photo();
                    }
                }
            });
        });

        // $(function () {

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
        //     $('.footer').on('click', '.add-item', function () {
        //         let formData = new FormData();
        //         let code = $('input[name=code]').val();
        //         formData.append('code', code);

        //         let z = 0;
        //         files.forEach(file => {
        //             formData.append('file' + z, file);
        //             z++;
        //         });

        //         // console.log('Sending...');

        //         $.ajax({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },

        //             url: '/post-photos',
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             type: 'POST',
        //             success: function (data) {
        //                 if (data.uploaded == true) {
        //                     alert('sukses');
        //                 }
        //             },
        //             error: function (err) {
        //                 alert(err);
        //             }
        //         });
        //     });
        // });
    }
};

jQuery(document).ready(function () {
    Item.init();
});
