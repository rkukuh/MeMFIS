@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden" >
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    TaskCard
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
                        <a href="{{ route('frontend.taskcard.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                TaskCard
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
                                    TaskCard Datalist
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group row align-items-center">
                                            <div class="col-md-6">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" placeholder="Search..."
                                                        id="generalSearch">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-form__group row align-items-center">
                                            <div class="col-md-6">
                                                    @component('frontend.common.buttons.create')
                                                        @slot('text', 'Routine Taskcard ')
                                                        @slot('href', route('frontend.taskcard-routine.create') )
                                                    @endcomponent
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="dropdown">
                                                            @component('frontend.common.buttons.dropdown')
                                                            @slot('text', 'Non-Routine Taskcard ')
                                                            @slot('id', 'taskcard-non-routine')
                                                        @endcomponent

                                                        <div class="dropdown-menu" aria-labelledby="taskcard-non-routine" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a class="dropdown-item" href="{{route('frontend.taskcard-eo.create')}}"> Engineering Order</a>
                                                            <a class="dropdown-item" href="{{route('frontend.taskcard-si.create')}}"> Special Instruction</a>
                                                        </div>
                                                    </div>
                                                {{-- <div class="d-md-none m--margin-bottom-10"></div> --}}
                                            </div>
                                        </div>
                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    @component('frontend.common.buttons.create')
                                                        @slot('text', 'Routine Taskcard ')
                                                        @slot('href', route('frontend.taskcard-routine.create') )
                                                    @endcomponent
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="dropdown">
                                                        @component('frontend.common.buttons.dropdown')
                                                        @slot('text', 'Non-Routine Taskcard ')
                                                        @slot('id', 'taskcard-non-routine')
                                                    @endcomponent

                                                    <div class="dropdown-menu" aria-labelledby="taskcard-non-routine" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item" href="{{route('frontend.taskcard-eo.create')}}"> Engineering Order</a>
                                                        <a class="dropdown-item" href="{{route('frontend.taskcard-si.create')}}"> Special Instruction</a>
                                                    </div>


                                                </div>

                                                </div>
                                            </div> --}}
                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="taskcard_datatable" id="scrolling_both"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script>
    <script src="{{ asset('js/frontend/taskcard/index.js')}}"></script>
@endpush
