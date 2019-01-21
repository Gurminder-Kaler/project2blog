@extends('layouts.app')
@section('styles')
    <style>
        .main {
            font-size: 120%;
            color: red;
        }
    </style>
    @endsection
@section('content')


    <button>Toggle class "main" for p elements</button>

    <p>This is a paragraph.</p>
    <p>This is another paragraph.</p>
    <p><b>Note:</b> Click the button more than once to see the toggle effect.</p>


@endsection
@section('scripts')
    {{--<script src="{{asset('js/test.js')}}"></script>--}}
    <script>$(document).ready(function(){
            $("button").click(function(){
                $("p").toggleClass("main");
            });
        });</script>
    @endsection