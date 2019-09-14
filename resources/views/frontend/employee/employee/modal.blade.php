@php
        $checked_1 = null;
        $checked_2 = null;
        $checked_3 = null;
        $checked_4 = null;

        $active_1 = null;
        $active_2 = null;
        $active_3 = null;
        $active_4 = null;
        if(!isset($photo_profile['profile_1'])){
            $checked_1 = 'checked';
            if(isset($photo_profile['active'])){
                $active_1 = $photo_profile['active'];
            }
        }else if(!isset($photo_profile['profile_2'])){
            $checked_2 = 'checked';
            if(isset($photo_profile['active'])){
                $active_2 = $photo_profile['active'];
            }
        }else if(!isset($photo_profile['profile_3'])){
            $checked_3 = 'checked';
            if(isset($photo_profile['active'])){
                $active_3 = $photo_profile['active'];
            }
        }else if(!isset($photo_profile['profile_4'])){
            $checked_4 = 'checked';
            if(isset($photo_profile['active'])){
                $activ_4 = $photo_profile['active'];
            }
        }     
        
        $profile_1 = null;
        $profile_2 = null;
        $profile_3 = null;
        $profile_4 = null;
        if(isset($photo_profile['profile_1'])){
            $profile_1 = $photo_profile['profile_1'];
        }

        if(isset($photo_profile['profile_2'])){
            $profile_2 = $photo_profile['profile_2'];
        }
        
        if(isset($photo_profile['profile_3'])){
            $profile_3 = $photo_profile['profile_3'];
        }
        
        if(isset($photo_profile['profile_4'])){
            $profile_4 = $photo_profile['profile_4'];
        }
@endphp

<div class="modal fade" id="modal_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">   
                
                @component('frontend.common.label.create-new')
                    @slot('icon','la la-cloud-upload')
                    @slot('text','Upload')
                @endcomponent

                <h5 class="modal-title" id="exampleModalLongTitle">Upload Photos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="left">
                <div class="form-group m-form__group row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label class="form-control-label text-primary">
                            Recommended size is 256 x 256 pixels
                        </label>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-3 col-md-3 col-lg-3">

                            @if ($profile_1 != null)
                            <img src="{{$profile_1}}" alt="{{$profile_1}}" style="width: 256px; height:256px;position:relative;">    
                            @elseif ($active_1 != null)
                            <img src="{{$active_1}}" alt="{{$active_1}}" style="width: 256px; height:256px;position:relative;">
                            @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ" alt="..." style="width: 256px; height:256px;position:relative;">
                            @endif

                        <div class="image-upload">
                            <label for="file-input-1">
                                <i class="la la-edit" style="font-size:32px;"></i>
                            </label>
                            <input id="file-input-1" type="file" class="file-upload" accept="image/*"/>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            @component('frontend.common.input.radio')
                                @slot('id', 'profile')
                                @slot('name', 'profile')
                                @slot('value', '1')
                                @slot('checked', $checked_1)
                                @slot('text', 'Set As Profile')
                            @endcomponent
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">

                        @if ($profile_2 != null)
                        <img src="{{$profile_2}}" alt="{{$profile_2}}" style="width: 256px; height:256px;position:relative;">    
                        @elseif ($active_2 != null)
                        <img src="{{$active_2}}" alt="{{$active_2}}" style="width: 256px; height:256px;position:relative;">
                        @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ" alt="..." style="width: 256px; height:256px;position:relative;">
                        @endif
                        
                        
                        <div class="image-upload">
                            <label for="file-input-2">
                                <i class="la la-edit" style="font-size:32px;"></i>
                            </label>
                            <input id="file-input-2" type="file" class="file-upload" accept="image/*"/>
                        </div>
                            
                        <div class="d-flex justify-content-center">
                            @component('frontend.common.input.radio')
                                @slot('id', 'profile')
                                @slot('name', 'profile')
                                @slot('value', '2')
                                @slot('checked', $checked_2)
                                @slot('text', 'Set As Profile')
                            @endcomponent
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">

                            @if ($profile_3 != null)
                            <img src="{{$profile_3}}" alt="{{$profile_3}}" style="width: 256px; height:256px;position:relative;">    
                            @elseif ($active_3 != null)
                            <img src="{{$active_3}}" alt="{{$active_3}}" style="width: 256px; height:256px;position:relative;">
                            @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ" alt="..." style="width: 256px; height:256px;position:relative;">
                            @endif

                        <div class="image-upload">
                            <label for="file-input-3">
                                <i class="la la-edit" style="font-size:32px;"></i>
                            </label>
                            <input id="file-input-3" type="file" class="file-upload" accept="image/*"/>
                        </div>

                        <div class="d-flex justify-content-center">
                            @component('frontend.common.input.radio')
                                @slot('id', 'profile')
                                @slot('name', 'profile')
                                @slot('value', '3')
                                @slot('checked', $checked_3)
                                @slot('text', 'Set As Profile')
                            @endcomponent
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">

                            @if ($profile_4 != null)
                            <img src="{{$profile_4}}" alt="{{$profile_4}}" style="width: 256px; height:256px;position:relative;">    
                            @elseif ($active_4 != null)
                            <img src="{{$active_4}}" alt="{{$active_4}}" style="width: 256px; height:256px;position:relative;">
                            @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ" alt="..." style="width: 256px; height:256px;position:relative;">
                            @endif

                        <div class="image-upload">
                            <label for="file-input-4">
                                <i class="la la-edit" style="font-size:32px;"></i>
                            </label>
                            <input id="file-input-4" type="file" class="file-upload"/>
                        </div>

                        <div class="d-flex justify-content-center">
                            @component('frontend.common.input.radio')
                                @slot('id', 'profile')
                                @slot('name', 'profile')
                                @slot('value', '4')
                                @slot('checked', $checked_4)
                                @slot('text', 'Set As Profile')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group m-form__group row pr-3">
                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                    <div class="flex">
                        <div class="action-buttons">
                            @component('frontend.common.buttons.submit')
                                @slot('type','button')
                                @slot('id', 'create-photo-profile')
                                @slot('class', 'create-photo-profile')
                            @endcomponent
            
                            @include('frontend.common.buttons.reset')
            
                            @include('frontend.common.buttons.close')
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('header-scripts')
    <style>
    @media (min-width: 992px){
        .modal-xl {
            max-width: 1300px !important;
        }
    }
    .image-upload{
        position:absolute;
        top:0;
        right:60px;
    }

    .image-upload label{
        cursor: pointer;
    }

    .image-upload .file-upload {
        display: none;
    }
    </style>
@endpush

@push('footer-scripts')
<script src="{{ asset('js/frontend/employee/employee/edit_profile.js') }}"></script>
@endpush