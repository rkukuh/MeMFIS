@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    DefectCards
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ route('frontend.item.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                DefectCards
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>

                                @include('frontend.common.label.datalist')

                                <h3 class="m-portlet__head-text">
                                    DefectCards
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="row align-items-center" style="margin-bottom:150px; margin-top:150px;">
                                <div class="col-xl-12 order-2 order-xl-1">
                                    <div class="form-group m-form__group row align-items-center d-flex justify-content-center">
                                        <div class="col-md-4">
                                            <form method="POST" action="{{route('frontend.mechanic.defectcard.search')}}">
                                                {!! csrf_field() !!}
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" id="code" name="code" placeholder="Search...">

                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                                <div class="d-flex justify-content-end mt-4 search">
                                                    @component('frontend.common.buttons.search')
                                                        @slot('id','btn-search')
                                                    @endcomponent()
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script>
        $("#code").focus();
    </script>
    <script>
        let input = document.getElementById("search");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
            event.preventDefault();
                document.getElementById("btn-search").click();
            }
        });
    </script>
@endpush
