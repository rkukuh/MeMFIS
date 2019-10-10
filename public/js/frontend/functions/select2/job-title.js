let JobTitleSelect2 = {
    init: function () {
        $('#job_title, #job_title_validate').select2({
            placeholder: 'Select a Job Title'
        });

        $.ajax({
            type: 'GET', 
            url: '/datatables/job-tittle', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('job_title');
                var len = data['data'].length;
                var data_job = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_job);

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
    JobTitleSelect2.init();
});
