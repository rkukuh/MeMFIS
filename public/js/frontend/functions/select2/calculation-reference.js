let CalculationReferenceSelect2 = {
    init: function () {
        $('#calculation_reference, #calculation_reference_validate').select2({
            placeholder: 'Select a Calculation Reference'
        });
    }
};

let calculationBase = {
    init: function () { 
        $.ajax({
            type: 'GET', 
            url: '/datatables/benefit/basecalculation', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('calculation_reference');
                var len = data['data'].length;
                var data_base = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_base);
        
                for(var i=0; i<len; i++){
                    var option = document.createElement('option')
                    option.setAttribute('value',parseJSON['data'][i].uuid)
                    option.innerHTML = 'Based on '+parseJSON['data'][i].name
                    select.appendChild(option)         
                }
        
            }
        });
    }
};

jQuery(document).ready(function () {
    CalculationReferenceSelect2.init();
    calculationBase.init();
});
