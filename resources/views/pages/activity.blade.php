@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">

                    <input type="text" id="dt" placeholder="Click to view the calendar">
                    <div id="dd"></div>
                </div>
                <div class="col-6">
                    <ol class="days">
                        @foreach ($dates as $date)
                            @php
                                // Assuming $date is in the format 'Y-m-d' (e.g., '2023-07-11')
                                $reserved = $reservedDates->contains($date);
                                $class = $reserved ? 'reserved' : '';
                            @endphp
                            <li style="width:40px;height:40px;line-height:40px" class="{{ $class }}" data-calendar-day="{{ $date }}">{{ date('j', strtotime($date)) }}</li>
                        @endforeach
                    </ol>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


