@if( isset($jobcards["non-routine"] ) ) 
<div class="form-group m-form__group row">
    @if( isset($jobcards["adsb"]) )
    <div class="col-sm-{{$col['non-routine']}} col-md-{{$col['non-routine']}} col-lg-{{$col['non-routine']}}">
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
                            AD/SB
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
                                        {{ $jobcards["adsb"]["done"] / array_sum($jobcards["adsb"]) * 100 }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards['adsb']['done'] / array_sum($jobcards['adsb']) * 100 }}%;" aria-valuenow="{{ $jobcards['adsb']['done'] / array_sum($jobcards['adsb']) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards['adsb']) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards['adsb']) ) }} Task
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
                                        {{ number_format($manhours["adsb"]["actual"] / $manhours["adsb"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["adsb"]["actual"] / $manhours["adsb"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["adsb"]["actual"] / $manhours["adsb"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["adsb"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["adsb"]["total"]) }} Mhrs
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
                                <td valign="top" width="24%" align="center">{{ $jobcards["adsb"]["open"] }} Task ({{ number_format( ($jobcards["adsb"]["open"] / array_sum($jobcards['adsb'])) * 100, 2) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["adsb"]["actual_manhour"]["open"] }} Mhrs ({{ number_format((( $manhours["adsb"]["actual_manhour"]["open"]  /  $manhours["adsb"]["estimation_manhour"]["open"] ) * 100), 2) }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["adsb"]["pending"] }} Task ({{ number_format( ($jobcards["adsb"]["pending"] / array_sum($jobcards['adsb']) * 100), 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["adsb"]["actual_manhour"]["pending"] }} Mhrs ( {{ number_format((( $manhours["adsb"]["actual_manhour"]["pending"]  /  $manhours["adsb"]["estimation_manhour"]["pending"] ) * 100), 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["adsb"]["progress"] }} Task ({{ number_format( ($jobcards["adsb"]["progress"] / array_sum($jobcards['adsb'])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["adsb"]["actual_manhour"]["progress"] }} Mhrs ( {{ number_format((( $manhours["adsb"]["actual_manhour"]["progress"]  /  $manhours["adsb"]["estimation_manhour"]["progress"] ) * 100), 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["adsb"]["closed"] }} Task ({{ number_format( ($jobcards["adsb"]["closed"] / array_sum($jobcards['adsb'])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["adsb"]["actual_manhour"]["closed"] }} Mhrs ( {{ number_format((( $manhours["adsb"]["actual_manhour"]["closed"]  /  $manhours["adsb"]["estimation_manhour"]["closed"] ) * 100), 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["adsb"]["released"] + $jobcards["adsb"]["rii-released"]) }} Task ({{ number_format( (($jobcards["adsb"]["released"] + $jobcards["adsb"]["rii-released"]) / array_sum($jobcards['adsb'])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["adsb"]["actual_manhour"]["released"] }} Mhrs ( {{ number_format( ( ( ($manhours["adsb"]["actual_manhour"]["released"] + $manhours["adsb"]["actual_manhour"]["rii-released"]  )/( $manhours["adsb"]["estimation_manhour"]["released"] + $manhours["adsb"]["estimation_manhour"]["rii-released"] )) * 100), 2) }}%)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if( isset($jobcards["cmr-awl"]) )
    <div class="col-sm-{{$col['non-routine']}} col-md-{{$col['non-routine']}} col-lg-{{$col['non-routine']}}">
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
                            CMR/AWL
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
    @endif

    @if( isset($jobcards["si"]) )
    <div class="col-sm-{{$col['non-routine']}} col-md-{{$col['non-routine']}} col-lg-{{$col['non-routine']}}">
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
                            Special Instruction
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
                                        {{ $jobcards["si"]["done"] / array_sum($jobcards["si"]) }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards["si"]['done'] / array_sum($jobcards["si"]) * 100 }}%;" aria-valuenow="{{ $jobcards["si"]['done'] / array_sum($jobcards["si"]) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards["si"]) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards["si"]) ) }} Task
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
                                        {{ number_format($manhours["si"]["actual"] / $manhours["si"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["si"]["actual"] / $manhours["si"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["si"]["actual"] / $manhours["si"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["si"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["si"]["total"]) }} Mhrs
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
                                <td valign="top" width="24%" align="center">{{ $jobcards["si"]["open"] }} Task ({{ number_format( ($jobcards["si"]["open"] / array_sum($jobcards["si"])) * 100, 2) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["si"]["actual_manhour"]["open"] }} Mhrs ({{ number_format( ( $manhours["si"]["actual_manhour"]["open"]  /  $manhours["si"]["estimation_manhour"]["open"] ) * 100, 2) }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["si"]["pending"] }} Task ({{ number_format( ($jobcards["si"]["pending"] / array_sum($jobcards["si"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["si"]["actual_manhour"]["pending"] }} Mhrs ( {{ number_format( ( $manhours["si"]["actual_manhour"]["pending"]  /  $manhours["si"]["estimation_manhour"]["pending"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["si"]["progress"] }} Task ({{ number_format( ($jobcards["si"]["progress"] / array_sum($jobcards["si"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["si"]["actual_manhour"]["progress"] }} Mhrs ( {{ number_format( ( $manhours["si"]["actual_manhour"]["progress"]  /  $manhours["si"]["estimation_manhour"]["progress"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["si"]["closed"] }} Task ({{ number_format( ($jobcards["si"]["closed"] / array_sum($jobcards["si"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["si"]["actual_manhour"]["closed"] }} Mhrs ( {{ number_format( ( $manhours["si"]["actual_manhour"]["closed"]  /  $manhours["si"]["estimation_manhour"]["closed"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["si"]["released"] + $jobcards["si"]["rii-released"]) }} Task ({{ number_format( (($jobcards["si"]["released"] + $jobcards["si"]["rii-released"]) / array_sum($jobcards["si"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["si"]["actual_manhour"]["released"] }} Mhrs ( {{ number_format( ( $manhours["si"]["actual_manhour"]["released"] + $manhours["si"]["actual_manhour"]["rii-released"]  )/( $manhours["si"]["estimation_manhour"]["released"] + $manhours["si"]["estimation_manhour"]["rii-released"] ) * 100, 2) }}%)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if( isset($jobcards["ea"]) )
    <div class="col-sm-{{$col['non-routine']}} col-md-{{$col['non-routine']}} col-lg-{{$col['non-routine']}}">
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
                            Engineering Authorization
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
                                        {{ $jobcards["ea"]["done"] / array_sum($jobcards["ea"]) }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards["ea"]['done'] / array_sum($jobcards["ea"]) * 100 }}%;" aria-valuenow="{{ $jobcards["ea"]['done'] / array_sum($jobcards["ea"]) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards["ea"]) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards["ea"]) ) }} Task
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
                                        {{ number_format($manhours["ea"]["actual"] / $manhours["ea"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["ea"]["actual"] / $manhours["ea"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["ea"]["actual"] / $manhours["ea"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["ea"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["ea"]["total"]) }} Mhrs
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
                                <td valign="top" width="24%" align="center">{{ $jobcards["ea"]["open"] }} Task ({{ number_format( ($jobcards["ea"]["open"] / array_sum($jobcards["ea"])) * 100, 2) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["ea"]["actual_manhour"]["open"] }} Mhrs ({{ number_format( ( $manhours["ea"]["actual_manhour"]["open"]  /  $manhours["ea"]["estimation_manhour"]["open"] ) * 100, 2) }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["ea"]["pending"] }} Task ({{ number_format( ($jobcards["ea"]["pending"] / array_sum($jobcards["ea"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["ea"]["actual_manhour"]["pending"] }} Mhrs ( {{ number_format( ( $manhours["ea"]["actual_manhour"]["pending"]  /  $manhours["ea"]["estimation_manhour"]["pending"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["ea"]["progress"] }} Task ({{ number_format( ($jobcards["ea"]["progress"] / array_sum($jobcards["ea"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["ea"]["actual_manhour"]["progress"] }} Mhrs ( {{ number_format( ( $manhours["ea"]["actual_manhour"]["progress"]  /  $manhours["ea"]["estimation_manhour"]["progress"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["ea"]["closed"] }} Task ({{ number_format( ($jobcards["ea"]["closed"] / array_sum($jobcards["ea"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["ea"]["actual_manhour"]["closed"] }} Mhrs ( {{ number_format( ( $manhours["ea"]["actual_manhour"]["closed"]  /  $manhours["ea"]["estimation_manhour"]["closed"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["ea"]["released"] + $jobcards["ea"]["rii-released"]) }} Task ({{ number_format( (($jobcards["ea"]["released"] + $jobcards["ea"]["rii-released"]) / array_sum($jobcards["ea"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["ea"]["actual_manhour"]["released"] }} Mhrs ( {{ number_format( ( $manhours["ea"]["actual_manhour"]["released"] + $manhours["ea"]["actual_manhour"]["rii-released"]  )/( $manhours["ea"]["estimation_manhour"]["released"] + $manhours["ea"]["estimation_manhour"]["rii-released"] ) * 100, 2) }}%)</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif

    @if( isset($jobcards["eo"]) )
    <div class="col-sm-{{$col['non-routine']}} col-md-{{$col['non-routine']}} col-lg-{{$col['non-routine']}}">
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
                            Engineering Order
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
                                        {{ $jobcards["eo"]["done"] / array_sum($jobcards["eo"]) }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards["eo"]['done'] / array_sum($jobcards["eo"]) * 100 }}%;" aria-valuenow="{{ $jobcards["eo"]['done'] / array_sum($jobcards["eo"]) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards["eo"]) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards["eo"]) ) }} Task
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
                                        {{ number_format($manhours["eo"]["actual"] / $manhours["eo"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["eo"]["actual"] / $manhours["eo"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["eo"]["actual"] / $manhours["eo"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["eo"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["eo"]["total"]) }} Mhrs
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
                                <td valign="top" width="24%" align="center">{{ $jobcards["eo"]["open"] }} Task ({{ number_format( ($jobcards["eo"]["open"] / array_sum($jobcards["eo"])) * 100, 2) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["eo"]["actual_manhour"]["open"] }} Mhrs ({{ number_format( ( $manhours["eo"]["actual_manhour"]["open"]  /  $manhours["eo"]["estimation_manhour"]["open"] ) * 100, 2) }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["eo"]["pending"] }} Task ({{ number_format( ($jobcards["eo"]["pending"] / array_sum($jobcards["eo"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["eo"]["actual_manhour"]["pending"] }} Mhrs ( {{ number_format( ( $manhours["eo"]["actual_manhour"]["pending"]  /  $manhours["eo"]["estimation_manhour"]["pending"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["eo"]["progress"] }} Task ({{ number_format( ($jobcards["eo"]["progress"] / array_sum($jobcards["eo"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["eo"]["actual_manhour"]["progress"] }} Mhrs ( {{ number_format( ( $manhours["eo"]["actual_manhour"]["progress"]  /  $manhours["eo"]["estimation_manhour"]["progress"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["eo"]["closed"] }} Task ({{ number_format( ($jobcards["eo"]["closed"] / array_sum($jobcards["eo"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["eo"]["actual_manhour"]["closed"] }} Mhrs ( {{ number_format( ( $manhours["eo"]["actual_manhour"]["closed"]  /  $manhours["eo"]["estimation_manhour"]["closed"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["eo"]["released"] + $jobcards["eo"]["rii-released"]) }} Task ({{ number_format( (($jobcards["eo"]["released"] + $jobcards["eo"]["rii-released"]) / array_sum($jobcards["eo"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["eo"]["actual_manhour"]["released"] }} Mhrs ( {{ number_format( ( $manhours["eo"]["actual_manhour"]["released"] + $manhours["eo"]["actual_manhour"]["rii-released"]  )/( $manhours["eo"]["estimation_manhour"]["released"] + $manhours["eo"]["estimation_manhour"]["rii-released"] ) * 100, 2) }}%)</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif

    @if( isset($jobcards["ht-crr"]) )
    <div class="col-sm-{{$col['non-routine']}} col-md-{{$col['non-routine']}} col-lg-{{$col['non-routine']}}">
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
                            HT / CRR
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
                                        {{ $jobcards["ht-crr"]["done"] / array_sum($jobcards["ht-crr"]) }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards["ht-crr"]['done'] / array_sum($jobcards["ht-crr"]) * 100 }}%;" aria-valuenow="{{ $jobcards["ht-crr"]['done'] / array_sum($jobcards["ht-crr"]) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards["ht-crr"]) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards["ht-crr"]) ) }} Task
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
                                        {{ number_format($manhours["htcrr"]["actual"] / $manhours["htcrr"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["htcrr"]["actual"] / $manhours["htcrr"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["htcrr"]["actual"] / $manhours["htcrr"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["htcrr"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["htcrr"]["total"]) }} Mhrs
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
                                <td valign="top" width="24%" align="center">{{ $jobcards["ht-crr"]["open"] }} Task ({{ number_format( ($jobcards["ht-crr"]["open"] / array_sum($jobcards["ht-crr"])) * 100, 2) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["htcrr"]["actual_manhour"]["open"] }} Mhrs ({{ number_format( ( $manhours["htcrr"]["actual_manhour"]["open"]  /  $manhours["htcrr"]["estimation_manhour"]["open"] ) * 100, 2) }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["ht-crr"]["pending"] }} Task ({{ number_format( ($jobcards["ht-crr"]["pending"] / array_sum($jobcards["ht-crr"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["htcrr"]["actual_manhour"]["pending"] }} Mhrs ( {{ number_format( ( $manhours["htcrr"]["actual_manhour"]["pending"]  /  $manhours["htcrr"]["estimation_manhour"]["pending"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["ht-crr"]["progress"] }} Task ({{ number_format( ($jobcards["ht-crr"]["progress"] / array_sum($jobcards["ht-crr"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["htcrr"]["actual_manhour"]["progress"] }} Mhrs ( {{ number_format( ( $manhours["htcrr"]["actual_manhour"]["progress"]  /  $manhours["htcrr"]["estimation_manhour"]["progress"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["ht-crr"]["closed"] }} Task ({{ number_format( ($jobcards["ht-crr"]["closed"] / array_sum($jobcards["ht-crr"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["htcrr"]["actual_manhour"]["closed"] }} Mhrs ( {{ number_format( ( $manhours["htcrr"]["actual_manhour"]["closed"]  /  $manhours["htcrr"]["estimation_manhour"]["closed"] ) * 100, 2) }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["ht-crr"]["released"] + $jobcards["ht-crr"]["rii-released"]) }} Task ({{ number_format( (($jobcards["ht-crr"]["released"] + $jobcards["ht-crr"]["rii-released"]) / array_sum($jobcards["ht-crr"])) * 100, 2) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["htcrr"]["actual_manhour"]["released"] }} Mhrs ( {{ number_format( ( $manhours["htcrr"]["actual_manhour"]["released"] + $manhours["htcrr"]["actual_manhour"]["rii-released"]  )/( $manhours["htcrr"]["estimation_manhour"]["released"] + $manhours["htcrr"]["estimation_manhour"]["rii-released"] ) * 100, 2) }}%)</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif
</div>
@else 
<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="m-portlet  m-portlet--full-height ">
        <div class="m-portlet__body text-center">
            <i>No non-routine taskcard availables in this projects.</i>
        </div>
    </div>
</div>
@endif
        