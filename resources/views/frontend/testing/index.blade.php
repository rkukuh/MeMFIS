@extends('layouts.app')

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
@endsection


@push('footer-scripts')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="{{ asset('js/frontend/testing/test.js')}}"></script>
@endpush