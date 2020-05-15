@if(Session::has('message'))

    @php $message = Session::get('message'); @endphp

    <script>
        window.onload = function () {
            Toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "500",
            }
            const type = "{{ $message['type-message'] }}";
            Toastr[type]("{{ $message['message'] }}");
        };
    </script>
@endif