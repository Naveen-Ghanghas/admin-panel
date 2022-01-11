@php
$adminid = session('uid');
@endphp

@if(empty($adminid)))
<script>
    location.href="{{url('/admin')}}";
</script>
@endif
<!DOCTYPE html>
<html>
    <head>
        @include('/admin/includes/top')
    </head>
    <body>
        <main>
        @include('/admin/includes/nav')
        <section class="container row">
            <div class="col-sm-4">
            @include('/admin/includes/sidebar')
            </div>
            <div class="col-sm-8">
                @yield('container')
            </div>
        </section>
        @include('/admin/includes/footer')
        </main>
    </body>
</html>
