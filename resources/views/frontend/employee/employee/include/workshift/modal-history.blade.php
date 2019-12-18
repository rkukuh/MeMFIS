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
                                        
                                                <td align="center" valign="totd">{{ $employee->workshifts->last()->name }}</p>
                                                   
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

                                            <table class="table table-striped table-bordered second" widtd="100%" cellpadding="4">
                                                <tr>
                                                    <td align="center" colspan="2"><b>Workshift Information</b></td>
                                                </tr>
                                                <tr>
                                                @foreach($employee->workshift_histories as $key => $history)
                                                    <td align="center" valign="top">{{ json_decode($history->history_data)->name }}</td>
                                                    <td align="center" valign="top">{{ date("d F Y", strtotime(json_decode($history->history_data)->pivot->created_at))  }} ~ @if(array_key_exists($key + 1, $employee->workshift_histories))  {{ date("d F Y", strtotime(json_decode($employee->workshift_histories[$key+1]->history_data)->pivot->created_at))  }} @else now @endif</td>
                                                @endforeach
                                                </tr>
                                            </table>
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
    