<div class="modal fade" id="modal_transaction_overtime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalPriceList">Overtime Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="PriceListForm">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <fieldset class="border p-1">
                                    <legend class="w-auto font-weight-bold text-primary" id="overtime_employee">Employee Name - 160416122</legend>
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <table border="1" bordercolor="#f2f2f2" width="100%" cellpadding="4">
                                                <tr style="background:#1f71f2;color:white;font-weight: bold">
                                                    <td align="center" width="20%">Overview No.</td>
                                                    <td align="center" width="15%">Status</td>
                                                    <td align="center" width="15%">Approved By</td>
                                                    <td align="center" width="15%">Job Title</td>
                                                    <td align="center" width="35%">Remark</td>
                                                </tr>
                                                <tr class="text-dark">
                                                    <td valign="top" align="center" width="20%" id="overtime_uuid">Isinya UUID</td>
                                                    <td valign="top" align="center" width="15%" id="overtime_status">Approve</td>
                                                    <td valign="top" align="center" width="15%" id="overtime_approved_by">Name;Timestamp</td>
                                                    <td valign="top" align="center" width="15%" id="overtime_job">Job Title User approve</td>
                                                    <td valign="top" align="center" width="35%" id="overtime_remark"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <table class="table table-striped table-bordered table-hover table-checkable" widtd="100%" cellpadding="4">
                                            <tr>
                                                <td width="25%" class="text-primary font-weight-bold">Date</td>
                                                <td align="center" width="75%" id="overtime_date">22/15/2019</td>
                                            </tr>
                                            <tr>
                                                <td width="20%" class="text-primary font-weight-bold">Start Time</td>
                                                <td align="center" width="75%" id="overtime_start">16:00:00</td>
                                            </tr>
                                            <tr>
                                                <td width="20%" class="text-primary font-weight-bold">End Time</td>
                                                <td align="center" width="75%" id="overtime_end">17:00:00</td>
                                            </tr>
                                            <tr>
                                                <td width="20%" class="text-primary font-weight-bold">Overtime Total</td>
                                                <td align="center" width="75%" id="overtime_total">3 Hours 5 Minutes</td>
                                                {{-- <td align="center" width="75%" id="overtime_total">{{ isset($overtime) ? $overtime->total." (".$overtime->total->diffForHumans() : "3 Hours 5 Minutes" }}</td> --}}
                                            </tr>
                                            <tr>
                                                <td width="20%" class="text-primary font-weight-bold">Overtime Description</td>
                                                <td align="center" width="75%" id="overtime_desc">Deskripsi Disini</td>
                                            </tr>
                                            <tr>
                                                <td width="20%" class="text-primary font-weight-bold">Created</td>
                                                <td align="center" width="75%" id="overtime_created_at">Created_at Disini</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        
    