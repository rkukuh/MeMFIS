let save_changes_button = function () {
    $('.btn-success').removeClass('add');
    $('.btn-success').addClass('edit-item');
    $('.btn-success').removeClass('add-item');
    $('.btn-success').html("<span><i class='fa fa-save'></i><span>Save Changes</span></span>");
}
