let BankNameSelect2 = {
    init: function () {
        $('#bank_name, #bank_name_validate').select2({
            placeholder: 'Select a Bank'
        });
    }
};

let bankSelect2 = {
    init: function () {
        $.ajax({
            type: 'GET', 
            url: '/datatables/bank', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('bank_name');
                var len = data['data'].length;
                var data_bank = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_bank);

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
    BankNameSelect2.init()
    bankSelect2.init()
});
