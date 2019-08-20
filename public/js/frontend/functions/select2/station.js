let StationSelect2 = {
    init: function () {
        $('#station, #station_validate').select2({
            placeholder: 'Select a Station',
            tags: true
        });
    }
};

jQuery(document).ready(function () {
    StationSelect2.init();
});
