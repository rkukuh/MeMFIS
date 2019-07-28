function predecessor_tc(triggeruuid) {
        $("#predecessor_datatable").DataTable({
            "dom": '<"top"f>rt<"bottom">pl',
            responsive: !0,
            searchDelay: 500,
            processing: !0,
            serverSide: !0,
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            ajax: "/datatables/workpackage/"+workPackage_uuid+"/taskcard/"+triggeruuid+"/predecessor",
            columns: [
                {
                    data: "number"
                },
                {
                    data: "title"
                },
                {
                    data: "work_area"
                },
                {
                    data: "estimation_manhour"
                },
                {
                    data: "order"
                }
            ]
        })

};