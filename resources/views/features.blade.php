@extends('layout.header')

@section('head-title')
   Features
@endsection
@section('content')
    <template>
        {{--TODO--}}
        <div class="text-xs-center mt-5">
            <p class="font-weight-bold display-2">What Web Can Do Today</p>
            <div>
                <gps>📡📡</gps>
            </div>
            <div>
                <vibrate></vibrate>
            </div>
            <div>
                <battery></battery>
            </div>
            <div>
                <memory></memory>
            </div>
            <div>
                <speed></speed>
            </div>
            <div>

            </div>
        </div>

    </template>

@endsection