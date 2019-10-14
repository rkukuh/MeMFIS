let InventoryInCreate = {
    init: function () {

        let dataSet = {
            "meta": {
                "page": 1,
                "pages": 1,
                "perpage": -1,
                "total": 56,
                "sort": "asc",
                "field": "RecordID"
            },"data": [] 
        };

        let options = {
            data: {
                type: 'local',
                source: dataSet.data,
                pageSize: 10,
                serverPaging: !0,
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
                    field: '#',
                    title: 'No',
                    width: '40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: 'code',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return (
                            '<a href="/item/' + t.uuid + '">' + t.code + "</a>"
                        );
                    }
                },
                {
                    field: 'serial_no',
                    title: 'Serial Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'exp_date',
                    title: 'Expired Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'qty',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: "remark",
                    title: "Remark",
                },
                {
                    field: 'Actions',
                    width: 110,
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_item" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-instruction_uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }

            ]
        };

        $('.modal-footer').on('click', '.add', function () {
            let item = document.getElementById('item').value
            let itemText = document.getElementById('select2-item-container').title
            let expDate = document.getElementById('exp_date').value
            let qty = document.getElementById('qty').value
            let unitId = document.getElementById('unit_id').value
            let remark = document.getElementById('remark').value
            let serialNo = document.getElementById('serial_no').value

            dataSet.data.push({
                uuid: item,
                code: itemText,
                exp_date: expDate,
                qty: qty,
                unit_id: unitId,
                remark: remark,
                serial_no: serialNo
            });

            $('#modal_item').modal('hide');

            $('#modal_item').on('hidden.bs.modal', function (e) {
                $(this)
                    .find("input,textarea")
                        .val('')
                        .end()
                    .find("input[type=checkbox], input[type=radio]")
                        .prop("checked", "")
                        .end()
                    .find("select")
                        .select2('val', 'All')
                        .end();
            });

            toastr.success("Item has been added.", "Success", {
                timeOut: 300
            });

            let table = $(".item_datatable").mDatatable(options);
            table.originalDataSet = dataSet.data;
            table.reload();
        });

        $('.footer').on('click', '.add-inventory-in', function () {
            let ref_no = $('input[name=ref-no]').val();
            let description = $('#remark').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/inventory-in',
                type: 'POST',
                data: {
                    number: ref_no,
                    storage_id: storage_id,
                    inventoried_at: date,
                    description: description,
                    section_code: section_code,
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors)
                    } else {
                        toastr.success('InventoryIn has been created.', 'Success', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    InventoryInCreate.init();
});
