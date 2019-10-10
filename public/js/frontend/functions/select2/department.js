let DepartmentSelect2 = {
    init: function () {
        $('#department, #department_validate').select2({
            placeholder: 'Select a Department'
        });

        $.ajax({
            type: 'GET', 
            url: '/datatables/department', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('department');
                var len = data['data'].length;
                var data_department = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_department);

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
    DepartmentSelect2.init();
});
