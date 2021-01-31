<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.css">

    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('vendors') }}/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css') }}/app.css">
    <link rel="shortcut icon" href="{{ asset('images') }}/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main">
            <header class='mb-3'>
                <a href="#" class='burger-btn d-block d-xl-none'>
                    <i class='bi bi-justify fs-3'></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>
                    @yield('page-heading')
                </h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendors') }}/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js') }}/main.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>

    <script src="{{ asset('vendors/toastify/toastify.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('.table').DataTable({
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [{
                        className: 'dtr-control',
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    }
                ]
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>

    @if(session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000
        }).showToast();
    </script>
    @endif
</body>

</html>