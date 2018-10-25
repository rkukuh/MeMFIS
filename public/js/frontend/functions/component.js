var update_button = function () {
    $('.btn-success').removeClass('add');
    $('.btn-success').addClass('update');
    $('.btn-success').html("<span><i class='fa fa-save'></i><span> Save Changes</span></span>");
}

var save_button = function () {
    if ($('.update')[0]) {
        $('.btn-success').removeClass('update');
        $('.btn-success').addClass('add');
        $('.btn-success').html("<span><i class='fa fa-save'></i><span> Save New</span></span>");
    }
}

let close = $('.modal-footer').on('click', '.clse', function () {
    save_button();
});

var update_item_button = function () {
    $('.btn-success').removeClass('add');
    $('.btn-success').addClass('edit-item');
    $('.btn-success').removeClass('add-item');
    $('.btn-success').html("<span><i class='fa fa-save'></i><span> Save Changes</span></span>");
}

var save_general_license_button = function () {
    $('.btn-success').removeClass('add');
    $('.btn-success').removeClass('update-general-license');
    $('.btn-success').addClass('add-general-license');
    $('.btn-success').html("<span><i class='fa fa-save'></i><span> Save New</span></span>");
}

var update_general_license_button = function () {
    $('.btn-success').removeClass('update');
    $('.btn-success').removeClass('add-general-license');
    $('.btn-success').addClass('update-general-license');
    $('.btn-success').html("<span><i class='fa fa-save'></i><span> Save Changes</span></span>");
}