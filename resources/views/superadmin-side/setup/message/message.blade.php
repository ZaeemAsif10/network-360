<script>
    toastr.options.timeOut = 3000;
    @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
    @elseif (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
    @endif
</script>
