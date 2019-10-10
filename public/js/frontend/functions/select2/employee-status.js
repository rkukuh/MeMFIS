let EmployeeStatusSelect2 = {
    init: function () {
        $('#employee_status, #employee_status_validate').select2({
            placeholder: 'Select a Employee Status'
        });

        $.ajax({
            type: 'GET', 
            url: '/datatables/employee/statuses', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('employee_status');
                var len = data['data'].length;
                var data_status = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_status);

                for(var i=0; i<len; i++){
                    var option = document.createElement('option')
                    option.setAttribute('value',parseJSON['data'][i].uuid)
                    option.innerHTML = parseJSON['data'][i].name
                    select.appendChild(option)         
                }
    
            }
        });
    }


};

jQuery(document).ready(function () {
    EmployeeStatusSelect2.init();
});
