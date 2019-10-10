let InventoryInCreate = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/item',

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
                    width:'40',
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
                        return '<a href="/item/'+t.uuid+'">' + t.code + "</a>"
                    }
                },
                {
                    field: '',
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
                    field: '',
                    title: 'Expired Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: "description",
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
        });

        $(function(){
            $('input[type="radio"]').click(function(){
              if ($(this).is(':checked'))
              {
                // alert($(this).val());
                if($(this).val() == 'general'){
                    $('.project').addClass('hidden');
                }
                else if($(this).val() == 'project'){
                    $('.project').removeClass('hidden');
                }
              }
            });
        });

        // $('.footer').on('click', '.add-pr', function () {
        //     let number = $('input[name=number]').val();
        //     let type_id = $('input[name=type]').val();
        //     // let project_id = $('input[name=project]').val();
        //     let date = $('input[name=date]').val();
        //     let date_required = $('input[name=date-required]').val();
        //     let description = $('#description').val();

        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: '/purchase-request',
        //         type: 'POST',
        //         data: {
        //             number:number,
        //             type_id:type_id,
        //             requested_at:date,
        //             required_at:date_required,
        //             description:description,
        //         },
        //         success: function (response) {
        //             if (response.errors) {
        //                 console.log(errors);
        //                 // if (response.errors.title) {
        //                 //     $('#title-error').html(response.errors.title[0]);
        //                 // }

        //                 // document.getElementById('manual_affected_id').value = manual_affected_id;


        //             } else {
        //                 //    taskcard_reset();


        //                 toastr.success('Taskcard has been created.', 'Success', {
        //                     timeOut: 5000
        //                 });

        //                 window.location.href = '/purchase-request/'+response.uuid+'/edit';
        //             }
        //         }
        //     });
        // });

        $('.footer').on('click', '.add-inventory-in', function () {
            let ref_no = $('input[name=ref-no]').val();
            let description = $('input[name=remark]').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('input[name=item_storage_id]').val();
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
                    console.log(response);
                    if (response.errors) {
                        console.log(errors);
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
