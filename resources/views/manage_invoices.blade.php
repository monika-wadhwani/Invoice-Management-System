@extends('layouts.app_second')

@section('content')
    <style>
        div.dataTables_wrapper {
            position: absolute;
            top: 180px;

            margin-left: 300px;
            width: 70vw;

        }

        input[type=text] {
            position: absolute;
            top: 94px;
            border: 2px solid #a4b0c6e6;
            border-radius: 4px;
            margin-left: 455px;
            padding: 10px;
            background-color: #c0c0fa;
            outline: #3e6099e6;

        }

        .label {
            position: absolute;
            top: 101px;
            font-weight: bold;
            margin-left: 300px;

            text-align: center;
            color: #3e6099e6;
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            font-weight: 1200;

        }

        input {
            outline: #3e6099e6;
        }

        input[type=search]:focus {
            border: 3px solid #3e6099e6 !important;
        }

        input[type=text]:focus {
            border: 3px solid #3e6099e6;
        }

        table {

            border-radius: 10px;
            overflow: scroll;
        }

        form button:hover {
            transition-property: transform .2s;
            transform: scale(107%);
            border: 3px solid #3e6099e6;
        }

        th {
            background-color: #3e6099e6;

        }

        .material-symbols-outlined {
            font-size: 22px !important;
        }

        button[type=submit] {
            position: absolute;
            top: 98px;
            font-weight: bold;
            margin-left: 664px;
            padding: 5px;
            border: 2px solid #a4b0c6e6;
            background-color: #c0c0fa;
            border-radius: 4px;
            text-align: center;
            color: #3e6099e6;
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            width: 100px;
        }

        table,
        th,
        td {
            border: 1px solid #a4b0c6e6;
            text-align: center !important;
        }
    </style>
    <form action="/get_invoice_data" method="post">
        @csrf
        <span class="label">Select Date Range:-</span>

        <input type="text" name="daterange" value="02/01/2024 - 02/15/2024" />

        <button type="submit">
            Submit
        </button>



        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Invoice ID</th>
                    <th>Invoice User Name</th>
                    <th>Invoice Description</th>
                    <th>Address</th>
                    <th>Payment Status</th>
                    <th>Payment date</th>
                    <th>Invoice Item ID</th>
                    <th>Invoice Item Description</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($final_data as $key => $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ url('/delete/' . $value['invoice_id']) }}" onclick="delete_confirm()">
                                <span class="material-symbols-outlined">
                                    delete
                                </span></a>
                            <a href="{{ url('/edit/' . $value['invoice_id']) }}">
                                <span class="material-symbols-outlined">
                                    edit_square
                                </span>
                            </a>

                        </td>
                        <td>{{ $value['invoice_id'] }}</td>
                        <td>{{ $value['invoice_user'] }}</td>
                        <td>{{ $value['invoice_description'] }}</td>
                        <td>{{ $value['address'] }}</td>
                        <td>{{ $value['payment_status'] }}</td>
                        <td>{{ $value['payment_date'] }}</td>
                        <td>{{ $value['invoice_item_id'] }}</td>
                        <td>{{ $value['invoice_item_description'] }}</td>
                        <td>{{ $value['quantity'] }}</td>
                        <td>{{ $value['amount'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
@endsection

<script type="text/javascript">
    function delete_confirm() {
        var x = confirm("Are you sure you want to delete?");
        if (x) {
            return true;
        } else {
            event.preventDefault();
            return false;
        }
    }
</script>

{{-- datepicker js --}}

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>

<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'right'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                .format('YYYY-MM-DD'));
        });
    });
</script>

{{-- datatable js --}}

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'copy',
                title: 'Invoice'
            }, {
                extend: 'csv',
                title: 'Invoice'
            }, {
                extend: 'excel',
                title: 'Invoice'
            }, {
                extend: 'pdf',
                title: 'Invoice'
            }, {
                extend: 'print',
                title: 'Invoice'
            }]
            scrollX: true
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            scrollX: true
        });

    });
</script>
