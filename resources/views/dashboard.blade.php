@extends('layouts.app_second')

@section('content')
    <style>
        .main {
            display: flex;
            height: 25vh;
            justify-content: center;
            position: relative;
            top: 48px;

            margin-left: 20px;

        }

        .main2 {
            display: flex;
            height: 25vh;
            justify-content: center;
            position: relative;
            top: 46px;
            margin-left: 20px;
        }

        .box1 {
            border: 1px solid black;
            margin: 10px;
            padding: 5px;
            border-radius: 15px;
            background-color: #d6d39f;
            width: 20%;
            box-shadow: 0 8px 2px rgba(0, 0, 0, 0.12), 0 3px 4px rgba(0, 0, 0, 0.24)
        }

        .box2 {
            border: 1px solid black;
            margin: 10px;
            border-radius: 15px;
            padding: 5px;
            background-color: #d0b5d0;
            width: 20%;
            box-shadow: 0 8px 2px rgba(0, 0, 0, 0.12), 0 3px 4px rgba(0, 0, 0, 0.24)
        }

        .box3 {
            border: 1px solid black;
            margin: 10px;
            padding: 5px;
            border-radius: 15px;
            background-color: #a0dbaf;
            width: 20%;
            box-shadow: 0 8px 2px rgba(0, 0, 0, 0.12), 0 3px 4px rgba(0, 0, 0, 0.24)
        }

        .box4 {
            border: 1px solid black;
            margin: 10px;
            padding: 5px;
            border-radius: 15px;
            width: 20%;
            background-color: #dba0a3;
            box-shadow: 0 8px 2px rgba(0, 0, 0, 0.12), 0 3px 4px rgba(0, 0, 0, 0.24)
        }

        h1 {
            text-align: center;
            top: 30px;
            position: relative;
            right: 323px;
            top: 42px;
            font-weight: bold;
            font-family: sans-serif;
        }

        h4 {
            font-size: 17px;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            position: relative;
            top: 20px;
            left: 4px;
            ;
        }

        h2 {
            font-size: 65px;
            position: relative;
            top: 15px;
            left: 40px;
        }
        .printt{
            font-size: 70px !important;
            position: absolute;
            top:55px;
            left: 600px;
            z-index: 1;
           
        }
        .users{
            font-size: 70px !important;
            position: absolute;
            top:55px;
            left: 63%;
            z-index: 1;
        }
        .paid{
            font-size: 70px !important;
            position: absolute;
            top:55px;
            left: 597px;
            z-index: 1;
        }
        .incomplete{
             font-size: 70px !important;
            position: absolute;
            top:53px;
            left: 63%;
            z-index: 1;
        }
    </style>
    <h1>My Dashboard</h1>
    <div>


        <div class="main">
            <div class="box1">
                <h4>Total Invoices</h4>
                <h2>{{ $invoice_count }}</h2>
                <span class="material-symbols-outlined printt">
                    print
                    </span>
            </div>
            <div class="box2">
                <h4>Total Users</h4>
                <h2>{{ $total_users }}</h2>
                <span class="material-symbols-outlined users">
                    group
                    </span>
            </div>
        </div>
        <div class="main2">
            <div class="box3">
                <h4>Paid Invoices</h4>
                <h2>{{ $paid_invoices }}</h2>
                <span class="material-symbols-outlined paid">
                    payments
                    </span>
            </div>
            <div class="box4">
                <h4>Pending Invoices</h4>
                <h2>{{ $pending_invoices }}</h2>
                <span class="material-symbols-outlined incomplete">
                    pending
                    </span>
            </div>
        </div>
    @endsection
