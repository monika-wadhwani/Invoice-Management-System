@extends('layouts.app_second')
<style>
    .card {
        margin-top: 60px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome to Invoice Management System') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Please click on &nbsp;<a href="/invoices">Create Invoice </a> &nbsp;to add your new business
                        invoices.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
