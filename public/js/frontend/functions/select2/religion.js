let ReligionSelect2 = {
    init: function () {
        $('#religion, #religion_validate').select2({
            placeholder: 'Select a Religion'
        });

        var religion = [
            'Islam',
            'Christian',
            'Chatolic',
            'Hindu',
            'Buddha',
            'Khonghucu'
        ]

        var select_religion = document.getElementById('religion')

        for(i=0; i<religion.length; i++){
            var opt = document.createElement('option')
            opt.setAttribute('value',religion[i])
            opt.innerHTML = religion[i]
            select_religion.appendChild(opt)
        }
    }
};

jQuery(document).ready(function () {
    ReligionSelect2.init();
});
