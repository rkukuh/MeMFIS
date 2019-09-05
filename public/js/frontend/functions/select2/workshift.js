let WorkShiftSelect2 = {
    init: function () {
        $('#job_position_workshift, #job_position_workshift_validate').select2({
            placeholder: 'Select a Workshift Name'
        });
    }
};

let workshiftSelect = {
    init: function () { 
        $.ajax({
            type: 'GET', 
            url: '/datatables/workshift', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('job_position_workshift');
                var len = data['data'].length;
                var data_workshift = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_workshift);
        
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
    WorkShiftSelect2.init()
    workshiftSelect.init()
});
