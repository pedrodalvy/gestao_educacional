@if(Session::has('message'))

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @php $message = Session::get('message'); @endphp

    <script>
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