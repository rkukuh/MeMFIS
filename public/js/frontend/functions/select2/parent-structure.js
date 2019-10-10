let ParentStructureSelect2 = {
    init: function () {
        $('#parent_structure, #parent_structure_validate').select2({
            placeholder: 'Select a Parent structure'
        });

        $.ajax({
            type: 'GET', 
            url: '/datatables/company', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('parent_structure');
                var len = data['data'].length;
                var data_company = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_company);
        
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
    ParentStructureSelect2.init();
});
