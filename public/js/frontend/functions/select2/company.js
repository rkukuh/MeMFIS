let CompanySelect2 = {
    init: function () {
        $('#company, #company_validate').select2({
            placeholder: 'Select a Company'
        });

        $.ajax({
            type: 'GET', 
            url: '/datatables/company/type', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('company');
                var len = data['data'].length;
                var data_type = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_type);

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
    CompanySelect2.init();
});
