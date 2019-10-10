let QualificationSelect2 = {
    init: function () {
        $('#qualification, #qualification_validate').select2({
            placeholder: 'Select an Qualification'
        });
    }
};

let schoolSelect = {
    init: function () { 
        $.ajax({
            type: 'GET', 
            url: '/datatables/school-type', 
            dataType: 'JSON',
            success: function (data) {
                var select = document.getElementById('qualification');
                var len = data['data'].length;
                var data_qualification = JSON.stringify(data, null, 4)
                var parseJSON = $.parseJSON(data_qualification);
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
    QualificationSelect2.init()
    schoolSelect.init()
});
