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