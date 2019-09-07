let FieldOfStudySelect2 = {
    init: function () {
        $('#field_of_study, #field_of_study_validate').select2({
            placeholder: 'Select an Field Of Study'
        });

        var genders = ['Engineering', 'Economy', 'Dukun']
            var select_gender = document.getElementById('field_of_study')

        for(i=0; i<genders.length; i++){
            var opt = document.createElement('option')
            opt.setAttribute('value',genders[i])
            opt.innerHTML = genders[i]
            select_gender.appendChild(opt)
        }
    }
};

jQuery(document).ready(function () {
    FieldOfStudySelect2.init();
});
