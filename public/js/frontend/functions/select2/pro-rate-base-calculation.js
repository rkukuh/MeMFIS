let ProRateBaseCalculationSelect2 = {
    init: function () {
        $('#pro_rate_base_calculation, #pro_rate_base_calculation_validate').select2({
            placeholder: 'Select a Pro Rate Calculation'
        });
    }
};

let prorateBase = {
    init: function () { 
        $.ajax({
            type: 'GET', 
            url: '/datatables/benefit/proratecalculation', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('pro_rate_base_calculation');
                var len = data['data'].length;
                var data_prorate = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_prorate);
        
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
    ProRateBaseCalculationSelect2.init();
    prorateBase.init();
});
