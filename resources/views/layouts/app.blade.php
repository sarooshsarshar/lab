<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{config('app.name','Account System')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/vendor/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/dore.light.blue.min.css') }}" />
    <link rel="stylesheet" href="{{asset('css/main.css') }}" />
    <script src="{{asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
</head>

<body id="app-container" class="menu-default show-spinner">
    @include('shared.nav')
    @include('shared.menu')
    <main>
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
    <footer class="page-footer">
        <div class="footer-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted">{{config('app.name','Account System')}} 2020</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/vendor/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('js/vendor/mousetrap.min.js')}}"></script>
    <script src="{{asset('js/vendor/select2.full.js')}}"></script>
    <script src="{{asset('js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('js/dore.script.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/ajax_request.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script>
         $('form').submit(function() {
             if (!this.checkValidity || this.checkValidity()) {
                $(this).find('button[type=submit]').attr('disabled', 'disabled')   
             }
            // $(this).attr('disabled', 'disabled');
            // $(this).closest('form').submit();
        });
    </script>
    @if (session('message'))
    <script type="text/javascript">
       
        $.notify({
            title: '{{session("status") == 1?"Success":"Error"}}',
            message: '{{session("message")}}',
            target: "_blank"
        }, {
            element: "body",
            position: null,
            type: '{{session("status") == 1?"success":"danger"}}',
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: 'top',
                align: 'right'
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 4000,
            timer: 2000,
            url_target: "_blank",
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp"
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template: '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>"
        });
    </script>
    @endif