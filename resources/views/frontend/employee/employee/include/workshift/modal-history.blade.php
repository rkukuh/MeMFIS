<div class="modal fade" id="modal_history_workshift" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @include('frontend.common.label.show')
                    <h5 class="modal-title" id="TitleModalEducation">Workshift History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="m-portlet__body pb-0">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
    
                                                <h3 class="m-portlet__head-text">
                                                    Current
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet m-portlet--mobile pb-3">
                                        <div class="m-portlet__body">
                                            <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                <tr>
                                                    <td align="center"><b>Workshift Information</b></td>
                                                </tr>
                                                <tr>
                                                    @php
                                                    $workshift_name = null;
                                                        if(isset($workshift_current['name'])){
                                                            $workshift_name = $workshift_current['name'];
                                                        }
                                                    @endphp
                                                <td align="center" valign="top">{{ $workshift_name }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body pt-0">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
    
                                                <h3 class="m-portlet__head-text">
                                                    History
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet m-portlet--mobile pb-3">
                                        <div class="m-portlet__body">

                                            @for ($i = 0; $i < count($workshift_history); $i++)

                                            <div class="my-4">
                                                <div class="d-flex justify-content-end">
                                                    <h3 class="m-portlet__head-text">
                                                            @php
                                                            $created_time = $workshift_history[$i]['created_at'];
                                                            $formatCreatedTime = strtotime($created_time);
    
                                                            $updated_time = $workshift_history[$i]['updated_at'];
                                                            $formatUpdatedTime = strtotime($updated_time);

                                                            echo date("d F Y", $formatCreatedTime).' to '.date("d F Y", $formatUpdatedTime);
                                                        @endphp
                                                    </h3>
                                                </div>
                                                <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                    <tr>
                                                        <td align="center"><b>Workshift Information</b></td>
                                                    </tr>
                                                    <tr>
                                                    <td align="center" valign="top">{{ $workshift_history[$i]['name'] }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <hr>

                                            @endfor

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                <div class="flex">
                                    <div class="action-buttons">
                                        @include('frontend.common.buttons.close')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    