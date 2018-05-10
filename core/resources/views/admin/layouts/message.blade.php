@if (session('success'))
<script type="text/javascript">
        swal("Success!", "{{ session('success') }}", "success");
</script>

<!-- <div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div> -->
@endif

@if (session('alert'))
<div class="alert alert-success">
    <strong>{{ session('alert') }}</strong>
</div>
@endif