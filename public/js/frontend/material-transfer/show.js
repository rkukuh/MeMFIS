let MaterialTransfer = {
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

    }
};

jQuery(document).ready(function () {
    MaterialTransfer.init();
});
