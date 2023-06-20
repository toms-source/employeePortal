@extends('layouts.app')
@livewireStyles
@section('content')
    <div class="d-flex">
        @Include('layouts.sidebar')
        <div class="col-10">
            <div class="mt-5 container-fluid" style="width: 100%; height: 100vh;">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <h3 class="px-4"><i class="fa-solid fa-chart-bar mr-3"></i>
                        {{ __('Approved') }}
                    </h3>
                    {{-- grid --}}
                    <div class="col">
                        {{-- Document Request --}}
                        <div class="card my-4 shadow-sm">
                            <div class="card-body">
                                <h5>Leave Request</h5>

                                <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:600px;'>
                                    <div class="dhx_cal_navline">
                                        <div class="dhx_cal_prev_button">&nbsp;</div>
                                        <div class="dhx_cal_next_button">&nbsp;</div>
                                        <div class="dhx_cal_today_button"></div>
                                        <div class="dhx_cal_date"></div>
                                        <div class="dhx_cal_tab" name="day_tab"></div>
                                        <div class="dhx_cal_tab" name="week_tab"></div>
                                        <div class="dhx_cal_tab" name="month_tab"></div>
                                    </div>
                                    <div class="dhx_cal_header"></div>
                                    <div class="dhx_cal_data"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@livewireScripts

