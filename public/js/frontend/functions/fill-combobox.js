$(document).ready(function () {
    accountcode = function () {
        $.ajax({
            url: '/get-accountcodes/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka = 1;

                $('select[name="accountcode"]').empty();

                $.each(data, function (key, value) {
                    if (angka == 1) {
                        $('select[name="accountcode"]').append(
                            '<option> Select a Accountcode</option>'
                        );

                        angka = 0;
                    }

                    $('select[name="accountcode"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    accountcode();
});

$(document).ready(function () {
    accountcode_category = function () {
        $.ajax({
            url: '/get-accountcodes/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka2 = 1;

                $('select[name="accountcode_category"]').empty();

                $.each(data, function (key, value) {
                    if (angka2 == 1) {
                        $('select[name="accountcode_category"]').append(
                            '<option> Select a Accountcode</option>'
                        );

                        angka2 = 0;
                    }

                    $('select[name="accountcode_category"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    accountcode_category();
});

$(document).ready(function () {
    name2 = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="name"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="name"]').append(
                            '<option> Select a Name</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="name"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    name2();
});

$(document).ready(function () {
    school = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="school"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="school"]').append(
                            '<option> Select a school</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="school"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    school();
});

$(document).ready(function () {
    category = function () {
        $.ajax({
            url: '/get-categories-item/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka3 = 1;

                $('select[name="category"]').empty();

                $.each(data, function (key, value) {
                    if (angka3 == 1) {
                        $('select[name="category"]').append(
                            '<option> Select a Category</option>'
                        );

                        angka3 = 0;
                    }

                    $('select[name="category"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    category();
});

$(document).ready(function () {
    units = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka4 = 1;

                $('select[name="unit"]').empty();

                $.each(data, function (key, value) {
                    if (angka4 == 1) {
                        $('select[name="unit"]').append(
                            '<option> Select a Unit</option>'
                        );

                        angka4 = 0;
                    }

                    $('select[name="unit"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    units();
});

$(document).ready(function () {
    units2 = function () {
        $.ajax({
            url: '/get-units/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka5 = 1;

                $('select[name="unit2"]').empty();

                $.each(data, function (key, value) {
                    if (angka5 == 1) {
                        $('select[name="unit2"]').append(
                            '<option> Select a Unit</option>'
                        );

                        angka5 = 0;
                    }

                    $('select[name="unit2"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    units2();
});

$(document).ready(function () {
    currencies = function () {
        $.ajax({
            url: '/get-currencies/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka6 = 1;

                $('select[name="currency"]').empty();

                $.each(data, function (key, value) {
                    if (angka6 == 1) {
                        $('select[name="currency"]').append(
                            '<option> Select a Category</option>'
                        );

                        angka6 = 0;
                    }

                    $('select[name="currency"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    currencies();
});

$(document).ready(function () {
    storages = function () {
        $.ajax({
            url: '/get-storages-combobox/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka7 = 1;

                $('select[name="storage"]').empty();

                $.each(data, function (key, value) {
                    if (angka7 == 1) {
                        $('select[name="storage"]').append(
                            '<option> Select a Storage</option>'
                        );

                        angka7 = 0;
                    }

                    $('select[name="storage"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };

    storages();
});

$(document).ready(function () {
    type = function () {
        $.ajax({
            url: '/type',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka8 = 1;

                $('select[name="type"]').empty();

                $.each(data, function (key, value) {
                    if (angka8 == 1) {
                        $('select[name="type"]').append(
                            '<option> Select a Type</option>'
                        );
                        angka8 = 0;
                    }
                    $('select[name="type"]').append(
                        '<option value="' + key + '">' + value + '</option>'
                    );
                });
            }
        });
    };
    type();
});
