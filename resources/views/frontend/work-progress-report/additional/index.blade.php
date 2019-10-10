@if( isset($jobcards["additionals"] ) ) 
<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="m-portlet  m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>

                        @component('frontend.common.label.show')
                            @slot('text','Progress Report')
                            @slot('icon','la la-bar-chart')
                        @endcomponent

                        <h2 class="m-portlet__head-text">
                            Defect Card
                        </h2>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col">
                        <div class="m-widget15__item">
                            <div class="row">
                                <div class="col">
                                    <span class="m-widget15__stats">
                                        Taskcard(s)
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__text">
                                        {{ $jobcards["additionals"]["done"] / array_sum($jobcards["additionals"]) }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards["additionals"]['done'] / array_sum($jobcards["additionals"]) * 100 }}%;" aria-valuenow="{{ $jobcards["additionals"]['done'] / array_sum($jobcards["additionals"]) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="m-widget15__item">
                            <div class="row">
                                <div class="col">
                                    <span class="m-widget15__stats">
                                        0
                                    </span>
                                </div>
                                <div class="col" align="center">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards["additionals"]) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards["additionals"]) ) }} Task
                                    </span>
                                </div>
                            </div>			                	 
                        </div>
                    </div>
                </div>

                <div class="form-group m-form__group row mt-4">
                    <div class="col">
                        <div class="m-widget15__item">
                            <div class="row">
                                <div class="col">
                                    <span class="m-widget15__stats">
                                        Manhour(s)
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__text">
                                        {{ number_format($manhours["additionals"]["actual"] / $manhours["additionals"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["additionals"]["actual"] / $manhours["additionals"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["additionals"]["actual"] / $manhours["additionals"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="m-widget15__item">
                            <div class="row">
                                <div class="col">
                                    <span class="m-widget15__stats">
                                        0
                                    </span>
                                </div>
                                <div class="col" align="center">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["additionals"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["additionals"]["total"]) }} Mhrs
                                    </span>
                                </div>
                            </div>			                	 
                        </div>
                    </div>
                </div>
    
                <div class="form-group m-form__group row mt-5">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <table width="100%" cellpadding="4">
                            <tr>
                                <td valign="top" width="30%">Open</td>
                                <td valign="top" width="2%">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["additionals"]["open"] }} Task ({{ number_format( ($jobcards["additionals"]["open"] / array_sum($jobcards["additionals"])) * 100, 2) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["additionals"]["actual_manhour"]["open"] }} Mhrs ({{ number_format( ( $manhours["additionals"]["actual_manhour"]["open"]  /  $manhours["additionals"]["estimation_manhour"]["open"] ) * 100, 2) }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["additionals"]["pending"] }} Task ({{ number_format( ($jobcards["additionals"]["pending"] / array_sum($jobcards["additionals"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["additionals"]["actual_manhour"]["pending"] }} Mhrs ( {{ number_format( ( $manhours["additionals"]["actual_manhour"]["pending"]  /  $manhours["additionals"]["estimation_manhour"]["pending"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["additionals"]["progress"] }} Task ({{ number_format( ($jobcards["additionals"]["progress"] / array_sum($jobcards["additionals"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["additionals"]["actual_manhour"]["progress"] }} Mhrs ( {{ number_format( ( $manhours["additionals"]["actual_manhour"]["progress"]  /  $manhours["additionals"]["estimation_manhour"]["progress"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["additionals"]["closed"] }} Task ({{ number_format( ($jobcards["additionals"]["closed"] / array_sum($jobcards["additionals"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["additionals"]["actual_manhour"]["closed"] }} Mhrs ( {{ number_format( ( $manhours["additionals"]["actual_manhour"]["closed"]  /  $manhours["additionals"]["estimation_manhour"]["closed"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["additionals"]["released"] + $jobcards["additionals"]["rii-released"]) }} Task ({{ number_format( (($jobcards["additionals"]["released"] + $jobcards["additionals"]["rii-released"]) / array_sum($jobcards["additionals"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["additionals"]["actual_manhour"]["released"] }} Mhrs ( {{ number_format( ( $manhours["additionals"]["actual_manhour"]["released"] + $manhours["additionals"]["actual_manhour"]["rii-released"]  )/( $manhours["additionals"]["estimation_manhour"]["released"] + $manhours["additionals"]["estimation_manhour"]["rii-released"] ) * 100, 2) }}%)</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@else 
<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="m-portlet  m-portlet--full-height ">
        <div class="m-portlet__body text-center">
            <i>No additionals taskcard availables in this projects.</i>
        </div>
    </div>
</div>
@endif
    