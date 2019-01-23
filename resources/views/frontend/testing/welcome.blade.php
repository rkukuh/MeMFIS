<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('try/css/editor.dataTables.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('try/css/editor.bootstrap.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('try/css/editor.foundation.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('try/css/editor.jqueryui.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('try/css/editor.semanticui.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('try/css/jquery.dataTables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('try/scss/main.scss') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('try/scss/datatable.scss') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('try/scss/inline.scss') }}">

        <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('try/js/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('try/js/dataTables.editor.js') }}"></script>

        <!-- Styles -->

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">


                <table id="coba" class="display" style="width:100%;margin-top:50px;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First name</th>
                            <th>Last name</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script>
    $( document ).ready(function() {
        var editor = new $.fn.dataTable.Editor( {

        // ajaxUrl:  "{{url('get_staffs')}}",
        ajax:  "{{url('datatables/journal')}}",
        table: '#coba',
        idSrc:  'coba',
        fields: [
            {
                label: "First name:",
                name: "uuid",
            }, {

                label: "First name:",
                name: "code"
            }, {
                label: "Last name:",
                name: "name"
            },
        ]});

        $('#coba').on( 'click', 'tbody td:not(:first-child)', function (e) {
            editor.inline( this );
        } );

        $('#coba').DataTable( {
        dom: "Bfrtip",
        ajax: "{{url('datatables/journal')}}",
        columns: [
            { data: "uuid" },
            { data: "code" },
            { data: "name" },
        ],
    } );

    });

    </script>
</html>
