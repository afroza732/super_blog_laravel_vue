@include('backend.includes.header')
@include('backend.includes.sidebar')
@include('backend.includes.nav')
@yield('content') 
@if(session()->has('success'))
<script type="text/javascript">
    $(function () {
        $.notify("{{session()->get('success')}}", {globalPosition: 'top right', className: 'success'});
    });
</script>
@endif    
@if(session()->has('error'))
<script type="text/javascript">
    $(function () {
        $.notify("{{session()->get('error')}}", {globalPosition: 'top right', className: 'error'});
    });
</script>
@endif    
@include('backend.includes.footer')