{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Testing</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are Testing!

                    <input type="file" id="largeImage">

                    <div class ="radio01">
                        <label for="question1">question1</label><input type="radio" name="question1"  id="question1" value="answer1">
                        <label for="question1">question1</label><input type="radio" name="question1"  id="question1" value="answer2">
                        <label for="question1">question1</label><input type="radio" name="question1"  id="question1" value="answer3">
                        <label for="question1">question1</label><input type="radio" name="question1"  id="question1" value="answer4">
                        <label for="question1">question1</label><input type="radio" name="question1"  id="question1" value="answer5">
                  
                     </div> 
                     
                    <button id="stepbutton2" class="add"> simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


{{-- @push('footer-scripts')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="{{ asset('js/frontend/testing/test.js')}}"></script>
@endpush --}}

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="style.css" />
    <script data-require="jquery" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>

  <body>
    <input id="myInput" type="file" multiple style="display:none" />

    <button id="myButton" type="button" style="border-radius: 5px; background-color: #fff; color: green;">+ Add Files</button>
    <button id="mySubmitButton" type="button" style="border-radius: 5px; background-color: #fff; color: green;">Send Files</button>

    <div id="myFiles"></div>
    {{-- <script>
$(function(){
  let inputFile = $('#myInput');
  let button = $('#myButton');
  let buttonSubmit = $('#mySubmitButton');
  let filesContainer = $('#myFiles');
  let files = [];

  inputFile.change(function() {
    let newFiles = []; 
    for(let index = 0; index < inputFile[0].files.length; index++) {
      let file = inputFile[0].files[index];
      newFiles.push(file);
      files.push(file);
    }

    newFiles.forEach(file => {
      let fileElement = $(`<p>${file.name}</p>`);
      fileElement.data('fileData', file);
    //   filesContainer.append(fileElement);

      fileElement.click(function(event) {
        let fileElement = $(event.target);
        let indexToRemove = files.indexOf(fileElement.data('fileData'));
        fileElement.remove();
        files.splice(indexToRemove, 1);
      });
    });
  });

  button.click(function() {
    inputFile.click();
  });

  buttonSubmit.click(function() {
    let formData = new FormData();
    formData.append('code' , 'tes123');

    let z = 0;
    files.forEach(file => {
      formData.append('file'+z , file);
    //   formData.append('file2' , file);
      z++;
    });

    console.log('Sending...');

    // $.ajax({
    //     headers: {
    //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                     },
    //   url: '/post-photos',
    //   data: formData,
    //   type: 'POST',
    //   success: function(data) { console.log('SUCCESS !!!'); },
    //   error: function(data) { console.log('ERROR !!!'); },
    //   cache: false,
    //   processData: false,
    //   contentType: false
    // });
    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        url: '/post-photos',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            if (data.uploaded == true) {
                                alert('sukses');
                            }
                        },
                        error: function (err) {
                            alert(err);
                        }
                    });
  });
});
    </script> --}}
        
</body>
</html>