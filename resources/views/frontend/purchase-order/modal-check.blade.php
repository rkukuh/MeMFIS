<div class="modal fade show" id="modal_check" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TitleModalCheck">Check Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="CheckForm">
                        <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group m-form__group row ">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            @component('frontend.common.input.select2')
                                                @slot('text', 'Warehouse Location')
                                                @slot('name','item_storage_id')
                                                @slot('id','item_storage_id')
                                            @endcomponent
                                        </div>
                                    </div>

                                    <table class="table table-striped table-bordered table-hover table-checkable" widtd="100%" cellpadding="4">
                                        <tr>
                                            <td align="center">Part Number</td>
                                            <td align="center">Item Description</td>
                                            <td align="center">Qty</td>
                                            <td align="center">Expired Date</td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top"></td>
                                            <td align="center" valign="top"></td>
                                            <td align="center" valign="top"></td>
                                            <td align="center" valign="top"></td>
                                        </tr>
                                    </table>
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
