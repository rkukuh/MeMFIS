<div class="modal fade" id="modal_ht_crr" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalHT/CRRR">HT/CRR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="htcrr_uuid" id="htcrr_uuid">
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6 hidden">
                        <label class="form-control-label">
                            CRI No
                        </label>

                        @component('frontend.common.input.text')
                        @slot('text', 'CRI No')
                        @slot('id', 'cri')
                        @slot('name', 'cri')
                        @slot('id_error', 'cri')
                        @endcomponent
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label class="form-control-label">
                            Position @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.text')
                        @slot('text', 'position')
                        @slot('id', 'position')
                        @slot('name', 'position')
                        @slot('id_error', 'position')
                        @endcomponent
                    </div>


                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            P/N @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.item.index')
                            @slot('name_item','item')
                            @slot('id_item','item')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Skill @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select2')
                        @slot('text', 'Skill')
                        @slot('id', 'otr_certification')
                        @slot('name', 'otr_certification')
                        @slot('id_error', 'otr_certification')
                        @endcomponent
                    </div>

                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-3 col-lg-6">
                        <label class="form-control-label">
                            S/N Off @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.text')
                        @slot('text', 'sn_off')
                        @slot('id', 'sn_off')
                        @slot('name', 'sn_off')
                        @slot('id_error', 'sn_off')
                        @endcomponent
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-6">
                        <label class="form-control-label">
                            S/N On @include('frontend.common.label.optional')
                        </label>

                        @component('frontend.common.input.text')
                        @slot('text', 'sn_on')
                        @slot('id', 'sn_on')
                        @slot('name', 'sn_on')
                        @slot('id_error', 'sn_on')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-6">
                        <label class="form-control-label">
                            Removal Est.Mhrs @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.number')
                        @slot('text', 'removal')
                        @slot('id', 'removal')
                        @slot('name', 'removal')
                        @slot('id_error', 'removal')
                        @endcomponent
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Installation Est.Mhrs @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.number')
                        @slot('text', 'Installaton')
                        @slot('id', 'installation')
                        @slot('name', 'installation')
                        @slot('id_error', 'installation')
                        @endcomponent
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Description @include('frontend.common.label.optional')
                        </label>

                        @component('frontend.common.input.textarea')
                        @slot('text', 'Description')
                        @slot('id', 'description')
                        @slot('rows', '3')
                        @slot('name', 'description')
                        @slot('id_error', 'description')
                        @endcomponent
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">

                        </label>

                        @component('frontend.common.input.checkbox')
                        @slot('id', 'is_rii')
                        @slot('name', 'is_rii')
                        @slot('text', 'RII?')
                        @slot('value', 1)

                        @endcomponent


                    </div>

                </div>
                <div class="form-group m-form__group row hidden">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <label class="form-control-label">
                            Removal By @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.text')
                        @slot('text', 'Removal')
                        @slot('id', 'removal_by')
                        @slot('name', 'removal_by')
                        @slot('value', Auth::user()->name)
                        @slot('id_error', 'removal_by')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 hidden">
                        <label class="form-control-label">
                            Installation By @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select')
                        @slot('text', 'Installaton')
                        @slot('id', 'installaton_by')
                        @slot('name', 'installaton_by')
                        @slot('id_error', 'installaton_by')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group m-form__group row ">
                    <div class="col-sm-6 col-md-6 col-lg-6 hidden">
                        <label class="form-control-label">
                            Engineer By @include('frontend.common.label.required')
                        </label>

                        @component('frontend.common.input.select')
                        @slot('text', 'Engineer')
                        @slot('id', 'engineer_by')
                        @slot('name', 'engineer_by')
                        @slot('id_error', 'engineer_by')
                        @endcomponent
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 hidden">
                        <label class="form-control-label">
                            RII Required? @include('frontend.common.label.optional')
                        </label>

                        @component('frontend.common.input.checkbox')
                        @slot('text', 'Required')
                        @slot('id', 'is_rii')
                        @slot('name', 'is_rii')
                        @slot('id_error', 'is_rii')
                        @slot('disabled','disabled')
                        {{-- @if($defectcard->is_rii == 1)
                            @slot('checked','checked')
                        @else

                        @endif --}}
                        @endcomponent
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="flex">
                    <div class="action-buttons">
                        @component('frontend.common.buttons.submit')
                        @slot('class', 'add-htcrr')
                        @slot('type', 'button')
                        @endcomponent

                        @include('frontend.common.buttons.reset')

                        @component('frontend.common.buttons.close')
                        @slot('text', 'Close')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('footer-scripts')
<script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>
@endpush
