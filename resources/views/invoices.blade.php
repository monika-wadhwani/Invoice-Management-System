@extends('layouts.app_second')

@section('content')
    <style>
        .form-container {
            background-color: #bfc7d8e9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            width: 75vw;
            height: 100%;
            margin-left: 290px;
        }

        .form-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: inline-block;
            padding: 10px;
            align-items: center;
            color: #333;
            font-weight: 100;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid black;
            border-radius: 4px;
            background-color: #d9d9e8;

        }


        .col-25 {
            float: left;
            width: 15%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 85%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */


        .form-group button {
            background-color: #3e6099e6;
            color: #fff;
            padding: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 80px;
        }

        .form-group button:hover {
            background-color: #3e6099e6;
            transition-property: transform .2s;
            transform: scale(102%);

        }

        h2 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
            margin-bottom: 20px;
            text-decoration: underline;
        }
    </style>

    <form action="/invoice_data" method="post">
        @csrf
        <div class="form-container">

            <div class="form-body">

                <h2>Create New Invoice</h2>
                <div class="row">
                    <div class="form-group">
                        <div class="col-25">
                            <label for="name">Invoice User Name:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group">

                        <div class="col-25">
                            <label for="payment_date">Payment Date:</label>
                        </div>
                        <div class="col-75">
                            <input type="date" id="payment_date" name="payment_date" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">

                        <div class="col-25">
                            <label for="payment_status">Payment Status:</label>
                        </div>
                        <div class="col-75">
                            <select id="payment_status" name="payment_status">
                                <option value="">Select one</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Failed">Failed</option>
                                <option value="Refunded">Refunded</option>
                                <option value="Abandoned">Abandoned</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Revoked">Revoked</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-25">
                            <label for="invoice_description">Invoice Description:</label>
                        </div>
                        <div class="col-75">
                            <textarea id="invoice_description" name="invoice_description" required style="height:100px"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-25">
                            <label for="address">Address:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="address" name="address" required>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-25">
                            <label for="invoice_item_description">Invoice Item Description:</label>
                        </div>
                        <div class="col-75">
                            <textarea id="invoice_item_description" name="invoice_item_description" required style="height:100px"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-25">
                            <label for="quantity">Quantity:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="quantity" name="quantity" min="1" required>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-25">
                            <label for="amount">Amount: ₹</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="amount" name="amount" required> 
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
