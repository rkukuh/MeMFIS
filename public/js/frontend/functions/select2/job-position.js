let JobPositionSelect2 = {
    init: function () {
        $('#job_position, #job_position_validate').select2({
            placeholder: 'Select a Job Position'
        });

        $.ajax({
            type: 'GET', 
            url: '/datatables/position', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('job_position');
                var len = data['data'].length;
                var data_position = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_position);

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
    JobPositionSelect2.init();
});
