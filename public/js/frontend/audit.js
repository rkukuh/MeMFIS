var Customer = {
    init: function() {
        // var tes =(<?php echo $message; ?>);
        // var tes ='<?php echo $abc?>';
        // <?php
        // header("Content-type: application/javascript");
        // ?>
        // var jsvar='something';
        // var othervar='<?php echo $phpVar; ?>';
        //<?php //some php ;?>
        // alert(tes);


        $(".m_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        // sample GET method
                        method: "GET",
                        url: "/get-audits",
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== "undefined") {
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
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: { input: $("#generalSearch") },
            toolbar: {
                items: {
                    pagination: { pageSizeSelect: [5, 10, 20, 30, 50, 100] }
                }
            },
            columns: [
                {
                    field: "id",
                    title: "#",
                    sortable: !1,
                    width: 40
                },
                {
                    field: "user_type",
                    title: "User Type",
                    sortable: "asc",
                    filterable: !1,
                    width: 60
                },
                {
                    field: "user_id",
                    title: "ID User",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "event",
                    title: "Event",
                    sortable: "asc",
                    filterable: !1,
                    width: 150,
                },
                {
                    field: "auditable_type",
                    title: "Auditable Type",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "old_values",
                    title: "Old Value",
                    sortable: "asc",
                    filterable: !1,
                    width: 150,
                },
                {
                    field: "new_values",
                    title: "new Value",
                    sortable: "asc",
                    filterable: !1,
                    width: 150,
                },
                {
                    field: "url",
                    title: "URL",
                    sortable: "asc",
                    filterable: !1,
                    width: 150,
                },
                {
                    field: "ip_address",
                    title: "IP Address",
                    sortable: "asc",
                    filterable: !1,
                    width: 150,
                },
                {
                    field: "user_agent",
                    title: "User Agent",
                    sortable: "asc",
                    filterable: !1,
                    width: 150,
                },
                {
                    field: "tags",
                    title: "Tags",
                    sortable: "asc",
                    filterable: !1,
                    width: 150,
                },

                {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t, e, i) {
                        if(tes == 2) {
                        return (
                            '<a href="/audit/1" ><button   type="button" href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            t.id +
                            '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button></a>\t\t\t\t\t\t' 
                            );

                    }
                          else {
                            return (
                                '<button   type="button" href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                                t.id +
                                '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'+
                                '<a href="audit/'+t.id+'" ><button   type="button" href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="audit" data-id=' +
                                t.id +
                                '>\t\t\t\t\t\t\t<i class="la la-info-circle"></i>\t\t\t\t\t\t</button></a>\t\t\t\t\t\t' 
                                );
                              }
                        // alert(tes); 
                        // "<?php echo $message; ?>"
                        // return (
                        //     '<a href="/audit/1" ><button   type="button" href="" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                        //     t.id +
                        //     '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button></a>\t\t\t\t\t\t'+ 
                        //     // '"<?php echo $message; ?>"'
                        //     // '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id=' +
                        //     // t.id +
                        //     // '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                        //     // '\t\t\t\t\t\t    \t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill  delete" href="#" data-id=' +
                        //     // t.id +
                        //     // ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t    \t'
                        // );
                    }
                }
            ]
        });




    }
};


jQuery(document).ready(function() {
    Customer.init();
});
