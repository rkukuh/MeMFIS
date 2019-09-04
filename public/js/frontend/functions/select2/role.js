let RoleSelect2 = {
    init: function () {
        $('#role, #role_validate').select2({
            placeholder: 'Select a Role'
        });
    }
};

let roleSelect = {
    init: function () { 
        $.ajax({
            type: 'GET', 
            url: '/datatables/role', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('role');
                var len = data['data'].length;
                var data_role = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_role);
        
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
    RoleSelect2.init();
    roleSelect.init();
});
