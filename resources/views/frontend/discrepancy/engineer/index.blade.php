@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Discrepancy
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
                            Discrepancy
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="m-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.datalist')

                            <h3 class="m-portlet__head-text">
                                Discrepancy Found
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="row align-items-center" style="margin-top:50px;">
                            <div class="col-xl-12 order-2 order-xl-1">
                                <form method="POST" action="{{route('frontend.engineer.discrepancy.search')}}">
                                    {!! csrf_field() !!}
                                    <div class="form-group m-form__group row align-items-center d-flex justify-content-center">
                                        <div class="col-md-4">
                                            <div class="m-input-icon m-input-icon--left">
                                                <input type="text" class="form-control m-input" id="code" name="code" placeholder="Search...">

                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                    <span><i class="la la-search"></i></span>
                                                </span>
                                            </div>
                                            <?php
                                            echo $errors->first('code','<div class="form-control-feedback text-danger" ">:message</div>');
                                            ?>
                                        </div>
                                        <div class="col-md-3 search">
                                            @component('frontend.common.buttons.search')
                                                @slot('id','btn-search')
                                            @endcomponent()

                                            @include('frontend.common.buttons.filter')
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">

                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                            <div class="col-lg-12">
                                @include('frontend.job-card.filter')
                            </div>
                            <div class="Discrepancy_datatable" id="scrolling_both"></div>
                        </div>

                        @include('frontend.job-card.engineer.tool.index')
                        @include('frontend.job-card.engineer.item.index')

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
<script src="{{ asset('js/frontend/discrepancy/engineer/index.js') }}"></script>
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
