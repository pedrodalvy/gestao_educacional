@if(Session::has('message'))

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @php $message = Session::get('message'); @endphp

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "500",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        const type = "{{ $message['type-message'] }}";

        switch (type) {
            case 'info':
                toastr.info("{{ $message['message'] }}");
                break;

            case 'warning':
                toastr.warning("{{ $message['message'] }}");
                break;

            case 'success':
                toastr.success("{{ $message['message'] }}");
                break;

            case 'error':
                toastr.error("{{ $message['message'] }}");
                break;
        }


    </script>
@endif