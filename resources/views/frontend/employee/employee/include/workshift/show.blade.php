<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <fieldset class="border p-2">
            <legend class="w-auto"><b>Workshift</b></legend>
            <div class="form-group m-form__group row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <label class="form-control-label">
                        Workshift Name 
                    </label>

                    @php
                        $workshift_name = null;
                        if(isset($workshift_current['name'])){
                            $workshift_name = $workshift_current['name'];
                        }
                    @endphp
                    @component('frontend.common.label.data-info')
                        @slot('text', $workshift_name)
                    @endcomponent
                </div>
            </div>

            @if (count($workshift_current) != 0)

            <div class="form-group m-form__group row mt-5">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <table widt="100%" class="table table-striped table-bordered second">
                        <tr>
                            <td align="center" width="20%"><b>Day</b></td>
                            <td align="center" width="18%"><b>In</b></td>
                            <td align="center" width="18%"><b>Break In</b></td>
                            <td align="center" width="18%"><b>Break Out</b></td>
                            <td align="center" width="18%"><b>Out</b></td>
                            <td align="center" width="8%"></td>
                        </tr>

                        @for ($i = 0; $i < count($workshift_current['data']); $i++)

                        <tr>
                            <td align="center" width="20%" style="backgroud:#e3e3e3;" class="pt-4">
                            <span style="font-weight: bold;color:#6d85c2" valign="middle">{{ $workshift_current['data'][$i]['days'] }}</span>
                            </td>
                            <td align="center" width="18%">
                                @component('frontend.common.input.timepicker')
                                    @slot('class','m_timepicker_1 text-center')
                                    @slot('placeholder', $workshift_current['data'][$i]['in'] )
                                    @slot('disabled','disabled')
                                @endcomponent
                            <td align="center" width="18%">
                                @component('frontend.common.input.timepicker')
                                    @slot('class','m_timepicker_1 text-center')
                                    @slot('placeholder', $workshift_current['data'][$i]['break_in'])
                                    @slot('disabled','disabled')
                                @endcomponent
                            <td align="center" width="18%">
                                @component('frontend.common.input.timepicker')
                                    @slot('class','m_timepicker_1 text-center')
                                    @slot('placeholder', $workshift_current['data'][$i]['break_out'])
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                            <td align="center" width="18%">
                                @component('frontend.common.input.timepicker')
                                    @slot('class','m_timepicker_1 text-center')
                                    @slot('placeholder',$workshift_current['data'][$i]['out'])
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                            <td align="center" width="8%">
                                @component('frontend.common.input.checkbox')
                                    @slot('checked', 'checked')
                                    @slot('size', '12')
                                    @slot('class','ml-4')
                                    @slot('disabled','disabled')
                                @endcomponent
                            </td>
                        </tr>
                       
                        @endfor

                    </table>
                </div>
            </div>

            @endif

        </fieldset>
    </div>
</div>


<div class="form-group m-form__group row mt-5">
    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
        @component('frontend.common.buttons.create-new')
            @slot('text', 'View History/Past Data')
            @slot('data_target', '#modal_history_workshift')
            @slot('icon','la la-history')
        @endcomponent
    </div>
</div>