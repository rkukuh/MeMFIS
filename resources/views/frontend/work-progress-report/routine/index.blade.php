@if( isset($jobcards["routine"]) )
<div class="form-group m-form__group row">

    @if( isset($jobcards["basic"]) )
    <div class="col-sm-{{$col['routine']}} col-md-{{$col['routine']}} col-lg-{{$col['routine']}}">
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
                            Basic
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
                                        {{ $jobcards["basic"]["done"] / array_sum($jobcards["basic"]) * 100 }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards['basic']['done'] / array_sum($jobcards['basic']) * 100 }}%;" aria-valuenow="{{ $jobcards['routine']['done'] / array_sum($jobcards['routine']) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards['basic']) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards['basic']) ) }} Task
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
                                        {{ number_format($manhours["basic"]["actual"] / $manhours["basic"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["basic"]["actual"] / $manhours["basic"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["basic"]["actual"] / $manhours["basic"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["basic"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["basic"]["total"]) }} Mhrs
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
                                <td valign="top" width="24%" align="center">{{ $jobcards["basic"]["open"] }} Task ({{ number_format( ($jobcards["basic"]["open"] / array_sum($jobcards['basic'])) * 100) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["basic"]["actual_manhour"]["open"] }} Mhrs ({{ ( $manhours["basic"]["actual_manhour"]["open"]  /  $manhours["basic"]["estimation_manhour"]["open"] ) * 100 }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["basic"]["pending"] }} Task ({{ number_format( ($jobcards["basic"]["pending"] / array_sum($jobcards['basic'])) * 100) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["basic"]["actual_manhour"]["pending"] }} Mhrs ( {{ ( $manhours["basic"]["actual_manhour"]["pending"]  /  $manhours["basic"]["estimation_manhour"]["pending"] ) * 100 }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["basic"]["progress"] }} Task ({{ number_format( ($jobcards["basic"]["progress"] / array_sum($jobcards['basic'])) * 100) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["basic"]["actual_manhour"]["progress"] }} Mhrs ( {{ ( $manhours["basic"]["actual_manhour"]["progress"]  /  $manhours["basic"]["estimation_manhour"]["progress"] ) * 100 }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["basic"]["closed"] }} Task ({{ number_format( ($jobcards["basic"]["closed"] / array_sum($jobcards['basic'])) * 100) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["basic"]["actual_manhour"]["closed"] }} Mhrs ( {{ ( $manhours["basic"]["actual_manhour"]["closed"]  /  $manhours["basic"]["estimation_manhour"]["closed"] ) * 100 }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["basic"]["released"] + $jobcards["basic"]["rii-released"]) }} Task ({{ number_format( (($jobcards["basic"]["released"] + $jobcards["basic"]["rii-released"]) / array_sum($jobcards['basic'])) * 100) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["basic"]["actual_manhour"]["released"] }} Mhrs ( {{ ( ($manhours["basic"]["actual_manhour"]["released"] + $manhours["basic"]["actual_manhour"]["rii-released"]  )/( $manhours["basic"]["estimation_manhour"]["released"] + $manhours["basic"]["estimation_manhour"]["rii-released"] )) * 100 }}%)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if( isset($jobcards["sip"]) )
    <div class="col-sm-{{$col['routine']}} col-md-{{$col['routine']}} col-lg-{{$col['routine']}}">
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
                            Structure Inspection Program
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
                                            {{ $jobcards["sip"]["done"] / array_sum($jobcards["sip"]) * 100 }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards['sip']['done'] / array_sum($jobcards['sip']) * 100 }}%;" aria-valuenow="{{ $jobcards['basic']['done'] / array_sum($jobcards['basic']) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards['sip']) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards['sip']) ) }} Task
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
                                            {{ number_format($manhours["sip"]["actual"] / $manhours["sip"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["sip"]["actual"] / $manhours["sip"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["sip"]["actual"] / $manhours["sip"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["sip"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["sip"]["total"]) }} Mhrs
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
                                <td valign="top" width="24%" align="center">{{ $jobcards["sip"]["open"] }} Task ({{ number_format( ($jobcards["sip"]["open"] / array_sum($jobcards['sip'])) * 100) }}%)</td>
                                <td valign="top" width="24%" align="center">{{ $manhours["sip"]["actual_manhour"]["open"] }} Mhrs ({{ ( $manhours["sip"]["actual_manhour"]["open"]  /  $manhours["sip"]["estimation_manhour"]["open"] ) * 100 }} %)</td>
                            </tr>
                            <tr>
                                <td valign="top">Pending</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["sip"]["pending"] }} Task ({{ number_format( ($jobcards["sip"]["pending"] / array_sum($jobcards['sip'])) * 100) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["sip"]["actual_manhour"]["pending"] }} Mhrs ( {{ ( $manhours["sip"]["actual_manhour"]["pending"]  /  $manhours["sip"]["estimation_manhour"]["pending"] ) * 100 }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">In Progress</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["sip"]["progress"] }} Task ({{ number_format( ($jobcards["sip"]["progress"] / array_sum($jobcards['sip'])) * 100) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["sip"]["actual_manhour"]["progress"] }} Mhrs ( {{ ( $manhours["sip"]["actual_manhour"]["progress"]  /  $manhours["sip"]["estimation_manhour"]["progress"] ) * 100 }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">Waiting for RII</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ $jobcards["sip"]["closed"] }} Task ({{ number_format( ($jobcards["sip"]["closed"] / array_sum($jobcards['sip'])) * 100) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["sip"]["actual_manhour"]["closed"] }} Mhrs ( {{ ( $manhours["sip"]["actual_manhour"]["closed"]  /  $manhours["sip"]["estimation_manhour"]["closed"] ) * 100 }}%)</td>
                            </tr>
                            <tr>
                                <td valign="top">released</td>
                                <td valign="top">:</td>
                                <td valign="top" width="24%" align="center">{{ ($jobcards["sip"]["released"] + $jobcards["sip"]["rii-released"]) }} Task ({{ number_format( (($jobcards["sip"]["released"] + $jobcards["sip"]["rii-released"]) / array_sum($jobcards['sip'])) * 100) }}%)</td>
                                <td valign="top" align="center">{{ $manhours["sip"]["actual_manhour"]["released"] }} Mhrs ( {{ ( ($manhours["sip"]["actual_manhour"]["released"] + $manhours["sip"]["actual_manhour"]["rii-released"]  )/( $manhours["sip"]["estimation_manhour"]["released"] + $manhours["sip"]["estimation_manhour"]["rii-released"] )) * 100 }}%)</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif

    @if( isset($jobcards["cpcp"]) )
    <div class="col-sm-{{$col['routine']}} col-md-{{$col['routine']}} col-lg-{{$col['routine']}}">
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
                            Corrotion Prevention and Control Programs
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
                                            {{ $jobcards["cpcp"]["done"] / array_sum($jobcards["cpcp"]) * 100 }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jobcards['cpcp']['done'] / array_sum($jobcards['cpcp']) * 100 }}%;" aria-valuenow="{{ $jobcards['cpcp']['done'] / array_sum($jobcards['cpcp']) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format( array_sum($jobcards['cpcp']) / 2 ) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format( array_sum($jobcards['cpcp']) ) }} Task
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
                                        {{ number_format($manhours["cpcp"]["actual"] / $manhours["cpcp"]["total"] * 100)  }}%
                                    </span>		
                                </div>
                            </div>               	 
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format($manhours["cpcp"]["actual"] / $manhours["cpcp"]["total"] * 100)  }}%;" aria-valuenow="{{ number_format($manhours["cpcp"]["actual"] / $manhours["cpcp"]["total"] * 100)  }}" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        {{ number_format($manhours["cpcp"]["total"] / 2) }}
                                    </span>
                                </div>
                                <div class="col" align="right">
                                    <span class="m-widget15__stats">
                                        {{ number_format($manhours["cpcp"]["total"]) }} Mhrs
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
                                    <td valign="top" width="24%" align="center">{{ $jobcards["cpcp"]["open"] }} Task ({{ number_format( ($jobcards["cpcp"]["open"] / array_sum($jobcards['cpcp'])) * 100) }}%)</td>
                                    <td valign="top" width="24%" align="center">{{ $manhours["cpcp"]["actual_manhour"]["open"] }} Mhrs ({{ ( $manhours["cpcp"]["actual_manhour"]["open"]  /  $manhours["cpcp"]["estimation_manhour"]["open"] ) * 100 }} %)</td>
                                </tr>
                                <tr>
                                    <td valign="top">Pending</td>
                                    <td valign="top">:</td>
                                    <td valign="top" width="24%" align="center">{{ $jobcards["cpcp"]["pending"] }} Task ({{ number_format( ($jobcards["cpcp"]["pending"] / array_sum($jobcards['cpcp'])) * 100) }}%)</td>
                                    <td valign="top" align="center">{{ $manhours["cpcp"]["actual_manhour"]["pending"] }} Mhrs ( {{ ( $manhours["cpcp"]["actual_manhour"]["pending"]  /  $manhours["cpcp"]["estimation_manhour"]["pending"] ) * 100 }}%)</td>
                                </tr>
                                <tr>
                                    <td valign="top">In Progress</td>
                                    <td valign="top">:</td>
                                    <td valign="top" width="24%" align="center">{{ $jobcards["cpcp"]["progress"] }} Task ({{ number_format( ($jobcards["cpcp"]["progress"] / array_sum($jobcards['cpcp'])) * 100) }}%)</td>
                                    <td valign="top" align="center">{{ $manhours["cpcp"]["actual_manhour"]["progress"] }} Mhrs ( {{ ( $manhours["cpcp"]["actual_manhour"]["progress"]  /  $manhours["cpcp"]["estimation_manhour"]["progress"] ) * 100 }}%)</td>
                                </tr>
                                <tr>
                                    <td valign="top">Waiting for RII</td>
                                    <td valign="top">:</td>
                                    <td valign="top" width="24%" align="center">{{ $jobcards["cpcp"]["closed"] }} Task ({{ number_format( ($jobcards["cpcp"]["closed"] / array_sum($jobcards['cpcp'])) * 100) }}%)</td>
                                    <td valign="top" align="center">{{ $manhours["cpcp"]["actual_manhour"]["closed"] }} Mhrs ( {{ ( $manhours["cpcp"]["actual_manhour"]["closed"]  /  $manhours["cpcp"]["estimation_manhour"]["closed"] ) * 100 }}%)</td>
                                </tr>
                                <tr>
                                    <td valign="top">released</td>
                                    <td valign="top">:</td>
                                    <td valign="top" width="24%" align="center">{{ ($jobcards["cpcp"]["released"] + $jobcards["cpcp"]["rii-released"]) }} Task ({{ number_format( (($jobcards["cpcp"]["released"] + $jobcards["cpcp"]["rii-released"]) / array_sum($jobcards['cpcp'])) * 100) }}%)</td>
                                    <td valign="top" align="center">{{ $manhours["cpcp"]["actual_manhour"]["released"] }} Mhrs ( {{ ( ($manhours["cpcp"]["actual_manhour"]["released"] + $manhours["cpcp"]["actual_manhour"]["rii-released"]  )/( $manhours["cpcp"]["estimation_manhour"]["released"] + $manhours["cpcp"]["estimation_manhour"]["rii-released"] )) * 100 }}%)</td>
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
            <i>No routine taskcard availables in this projects.</i>
        </div>
    </div>
</div>
@endif