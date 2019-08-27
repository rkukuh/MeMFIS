let SupervisorSelect2 = {
    init: function () {
        $('#supervisor, #supervisor_validate').select2({
            placeholder: 'Select a Supervisor'
        });

        $.ajax({
            type: 'GET', 
            url: '/datatables/employee', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('supervisor');
                var len = data['data'].length;
                var data_supervisor = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_supervisor);

                for(var i=0; i<len; i++){
                    var option = document.createElement('option')
                    option.setAttribute('value',parseJSON['data'][i].uuid)

                    let employee_name = null

                    if(parseJSON['data'][i].last_name == parseJSON['data'][i].first_name){
                        employee_name = parseJSON['data'][i].first_name
                    }else{
                            employee_name = parseJSON['data'][i].first_name+' '+parseJSON['data'][i].last_name
                    }
                    option.innerHTML = employee_name
                    select.appendChild(option)         
                }
    
            }
        });
    }
};

jQuery(document).ready(function () {
    SupervisorSelect2.init();
});
