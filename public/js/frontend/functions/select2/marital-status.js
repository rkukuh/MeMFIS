let MaritalStatusSelect2 = {
    init: function () {
        $('#marital_status, #marital_status_validate').select2({
            placeholder: 'Select a Marital Status'
        });

        var marital_status = [
            'Married with 1 child',
            'Married with 2 childs',
            'Married with 3 childs',
            'Not Married',
            'Not Married with 1 child',
            'Not Married with 2 childs',
            'Not Married with 3 childs'
    ]

    var select_marital = document.getElementById('marital_status')

    for(i=0; i<marital_status.length; i++){
        var opt = document.createElement('option')
        opt.setAttribute('value',marital_status[i])
        opt.innerHTML = marital_status[i]
        select_marital.appendChild(opt)
    }
    }
};

jQuery(document).ready(function () {
    MaritalStatusSelect2.init();
});
