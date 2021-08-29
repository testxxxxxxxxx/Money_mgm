@extends('layouts.app')

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('style.css')?>">

</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <a href="/home/ShowResults"> ShowResults</a>
                <a href="/home/AddReceiptForms"> Add Receipt</a>
                <a href="/home/getUpdateReceiptForm"> Update Receipt </a>

            </div>
        </div>
    </div>
</div>
@endsection
