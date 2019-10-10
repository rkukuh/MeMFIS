let ReligionSelect2 = {
    init: function () {
        $('#religion, #religion_validate').select2({
            placeholder: 'Select a Religion'
        });

        var religion = [
            'Islam',
            'Christianity',
            'Nonreligious (Secular/Agnostic/Atheist)',
            'Hinduism',
            'Chinese traditional religion',
            'Buddhism',
            'Primal-indigenous ',
            'African traditional and Diasporic',
            'Sikhism',
            'Juche',
            'Spiritism',
            'Judaism',
            'Bahai',
            'Jainism',
            'Shinto',
            'Cao Dai',
            'Zoroastrianism',
            'Tenrikyo',
            'Neo-Paganism',
            'Unitarian-Universalism'
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
