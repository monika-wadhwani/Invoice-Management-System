<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 57px;
            left: 0px;
            background-color: #3e6099e6;
            overflow-x: hidden;
            transition: 0.5s;
            z-index: 1;
            padding-top: 10px;
        }

        .sidebar a {

            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            font-family: 'Times New Roman', Times, serif, Helvetica, sans-serif;
            transition: 0.3s;

        }

        .sidebar a:hover {
            background-color: #c6c6f8;

        }

        .open-btn {
            font-size: 20px;
            cursor: pointer;
            position: fixed;
            margin-left: 20px;
            margin-top: 13px;
            z-index: 5;
            top: 0;

        }

        .material-symbols-outlined {
            position: relative;
            top: 3px;
        }

        .content {
            margin-left: 0;
            transition: margin-left 0.5s;

        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar" id="sidebar">

        <a href="{{ url('/dashboard') }}"><span class="material-symbols-outlined">
                dashboard
            </span> Dashboard</a>
        <a href="{{ url('/invoices') }}"><span class="material-symbols-outlined">
                note_add
            </span> Create Invoice</a>
        <a href="{{ url('/manage_invoices') }}"><span class="material-symbols-outlined">
                settings
            </span> Manage Invoices</a>
    </div>

    <div class="content">
        <span class="open-btn" onclick="toggleSidebar()">&#9776;</span>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var isClose = sidebar.style.left === "-250px";

            if (isClose) {
                sidebar.style.left = "0px";
            } else {
                sidebar.style.left = "-250px";
            }

        }
    </script>

</body>

</html>
