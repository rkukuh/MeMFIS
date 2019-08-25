let GenderSelect2 = {
    init: function () {
        $('#gender, #gender_validate').select2({
            placeholder: 'Select a Gender'
        });

        var genders = ['All', 'Male', 'Female']
            var select_gender = document.getElementById('gender')

        for(i=0; i<genders.length; i++){
            var opt = document.createElement('option')
            opt.setAttribute('value',genders[i])
            opt.innerHTML = genders[i]
            select_gender.appendChild(opt)
        }
    }
};

jQuery(document).ready(function () {
    GenderSelect2.init();
});
