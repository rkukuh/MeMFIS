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
    category = function () {
        $.ajax({
            url: '/get-categories/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                let angka = 1;

                $('select[name="category"]').empty();

                $.each(data, function (key, value) {
                    if (angka == 1) {
                        $('select[name="category"]').append(
                            '<option> Select a Category</option>'
                        );

                        angka = 0;
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
                let angka = 1;

                $('select[name="unit"]').empty();

                $.each(data, function (key, value) {
                    if (angka == 1) {
                        $('select[name="unit"]').append(
                            '<option> Select a Unit</option>'
                        );

                        angka = 0;
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
                let angka = 1;

                $('select[name="unit2"]').empty();

                $.each(data, function (key, value) {
                    if (angka == 1) {
                        $('select[name="unit2"]').append(
                            '<option> Select a Unit</option>'
                        );

                        angka = 0;
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
                let angka = 1;

                $('select[name="currency"]').empty();

                $.each(data, function (key, value) {
                    if (angka == 1) {
                        $('select[name="currency"]').append(
                            '<option> Select a Category</option>'
                        );

                        angka = 0;
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
