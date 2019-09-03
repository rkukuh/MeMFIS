@if( isset($jobcards["additional"] ) ) 
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
                                        {{ $jobcards["cmr-awl"]["done"] / array_sum($jobcards["cmr-awl"]) }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards["cmr-awl"]['done'] / array_sum($jobcards["cmr-awl"]) * 100 }}%;" aria-valuenow="{{ $jobcards["cmr-awl"]['done'] / array_sum($jobcards["cmr-awl"]) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards["cmr-awl"]) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards["cmr-awl"]) ) }} Task
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
                                        {{ number_format($manhours["cmr-awl"]["actual"] / $manhours["cmr-awl"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["cmr-awl"]["actual"] / $manhours["cmr-awl"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["cmr-awl"]["actual"] / $manhours["cmr-awl"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["cmr-awl"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["cmr-awl"]["total"]) }} Mhrs
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
                                <td valign="top" width="24%" align="center">{{ $jobcards["cmr-awl"]["open"] }} Task ({{ number_format( ($jobcards["cmr-awl"]["open"] / array_sum($jobcards["cmr-awl"])) * 100, 2) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["cmr-awl"]["actual_manhour"]["open"] }} Mhrs ({{ number_format( ( $manhours["cmr-awl"]["actual_manhour"]["open"]  /  $manhours["cmr-awl"]["estimation_manhour"]["open"] ) * 100, 2) }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["cmr-awl"]["pending"] }} Task ({{ number_format( ($jobcards["cmr-awl"]["pending"] / array_sum($jobcards["cmr-awl"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["cmr-awl"]["actual_manhour"]["pending"] }} Mhrs ( {{ number_format( ( $manhours["cmr-awl"]["actual_manhour"]["pending"]  /  $manhours["cmr-awl"]["estimation_manhour"]["pending"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["cmr-awl"]["progress"] }} Task ({{ number_format( ($jobcards["cmr-awl"]["progress"] / array_sum($jobcards["cmr-awl"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["cmr-awl"]["actual_manhour"]["progress"] }} Mhrs ( {{ number_format( ( $manhours["cmr-awl"]["actual_manhour"]["progress"]  /  $manhours["cmr-awl"]["estimation_manhour"]["progress"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["cmr-awl"]["closed"] }} Task ({{ number_format( ($jobcards["cmr-awl"]["closed"] / array_sum($jobcards["cmr-awl"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["cmr-awl"]["actual_manhour"]["closed"] }} Mhrs ( {{ number_format( ( $manhours["cmr-awl"]["actual_manhour"]["closed"]  /  $manhours["cmr-awl"]["estimation_manhour"]["closed"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["cmr-awl"]["released"] + $jobcards["cmr-awl"]["rii-released"]) }} Task ({{ number_format( (($jobcards["cmr-awl"]["released"] + $jobcards["cmr-awl"]["rii-released"]) / array_sum($jobcards["cmr-awl"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["cmr-awl"]["actual_manhour"]["released"] }} Mhrs ( {{ number_format( ( $manhours["cmr-awl"]["actual_manhour"]["released"] + $manhours["cmr-awl"]["actual_manhour"]["rii-released"]  )/( $manhours["cmr-awl"]["estimation_manhour"]["released"] + $manhours["cmr-awl"]["estimation_manhour"]["rii-released"] ) * 100, 2) }}%)</td>
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
    