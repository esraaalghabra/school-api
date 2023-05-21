@extends('layouts.master')

@section('css')
    @livewireStyles
@stop
<!-- -->
@section('title')
    empty
@stop
<!-- -->
@section('page-header')
    empty
@stop
<!-- -->
@section('PageTitle')
    empty
@stop
<!-- -->
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <livewire:counter/>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@stop
<!-- -->
@section('js')
    @livewireScripts
@stop
