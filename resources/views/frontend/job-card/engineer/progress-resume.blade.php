@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center ">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Job Card
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
                        <a href="{{ route('frontend.journal.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Job Card
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
                                    Job Card
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <table border="1px" width="100%">
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Job Card No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                JC 012122
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Task Card No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                TC 212212
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Reg
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                A/C Serial Number
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Inspection Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Company Task No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Project No
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Inspection Type
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Skill
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Est. Mhrs
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Work Area
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Sequence
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                RII
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Reference
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Title
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Description
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="background-color:beige;padding:10px;">
                                                Helper
                                            </td>
                                            <td width="70%" style="text-align:center">
                                                Generated
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                    <div class="flex">
                                        <div class="action-buttons">
                                                @include('frontend.job-card.engineer.modal-pause')
                                                @component('frontend.common.buttons.pause')
                                                    @slot('data_target', '#modal_pause')
                                                @endcomponent
                                                @include('frontend.job-card.engineer.modal-close')
                                                @component('frontend.common.buttons.close')
                                                    @slot('data_target', '#modal_close')
                                                @endcomponent
                                                @component('frontend.common.buttons.found')
                                                @slot('href','/discrepancy')
                                            @endcomponent()
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Job Card Progress Timeline
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-scrollable" data-scrollable="true" data-height="380" data-mobile-height="300">
                            <div class="m-timeline-2">
                                <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                    <div class="m-timeline-2__item">
                                        <span class="m-timeline-2__item-time">10:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                            Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                            incididunt ut labore et dolore magna
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">12:45</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-success"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
                                            AEOL Meeting With
                                        </div>
                                        <div class="m-list-pics m-list-pics--sm m--padding-left-20">
                                            <a href="#"><img src="assets/app/media/img/users/100_4.jpg" title=""></a>
                                            <a href="#"><img src="assets/app/media/img/users/100_13.jpg" title=""></a>
                                            <a href="#"><img src="assets/app/media/img/users/100_11.jpg" title=""></a>
                                            <a href="#"><img src="assets/app/media/img/users/100_14.jpg" title=""></a>
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">14:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-brand"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Make Deposit <a href="#" class="m-link m-link--brand m--font-bolder">USD 700</a> To ESL.
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">16:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                            incididunt ut labore et dolore magna elit enim at minim<br>
                                            veniam quis nostrud
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">17:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-info"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Placed a new order in <a href="#" class="m-link m-link--brand m--font-bolder">SIGNATURE MOBILE</a> marketplace.
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">16:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-brand"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                            incididunt ut labore et dolore magna elit enim at minim<br>
                                            veniam quis nostrud
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">17:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Received a new feedback on <a href="#" class="m-link m-link--brand m--font-bolder">FinancePro App</a> product.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Your Progress Timeline
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-scrollable" data-scrollable="true" data-height="380" data-mobile-height="300">
                            <div class="m-timeline-2">
                                <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                    <div class="m-timeline-2__item">
                                        <span class="m-timeline-2__item-time">10:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                            Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                            incididunt ut labore et dolore magna
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">12:45</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-success"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
                                            AEOL Meeting With
                                        </div>
                                        <div class="m-list-pics m-list-pics--sm m--padding-left-20">
                                            <a href="#"><img src="assets/app/media/img/users/100_4.jpg" title=""></a>
                                            <a href="#"><img src="assets/app/media/img/users/100_13.jpg" title=""></a>
                                            <a href="#"><img src="assets/app/media/img/users/100_11.jpg" title=""></a>
                                            <a href="#"><img src="assets/app/media/img/users/100_14.jpg" title=""></a>
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">14:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-brand"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Make Deposit <a href="#" class="m-link m-link--brand m--font-bolder">USD 700</a> To ESL.
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">16:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                            incididunt ut labore et dolore magna elit enim at minim<br>
                                            veniam quis nostrud
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">17:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-info"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Placed a new order in <a href="#" class="m-link m-link--brand m--font-bolder">SIGNATURE MOBILE</a> marketplace.
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">16:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-brand"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                            incididunt ut labore et dolore magna elit enim at minim<br>
                                            veniam quis nostrud
                                        </div>
                                    </div>
                                    <div class="m-timeline-2__item m--margin-top-30">
                                        <span class="m-timeline-2__item-time">17:00</span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                            Received a new feedback on <a href="#" class="m-link m-link--brand m--font-bolder">FinancePro App</a> product.
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
    <script src="{{ asset('js/frontend/functions/reset.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/select2/type.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/type.js')}}"></script>


    <script src="{{ asset('js/frontend/journal.js')}}"></script>
@endpush
