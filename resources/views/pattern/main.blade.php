<!doctype html>
<html lang="en">

@include('layouts.hearder')

<body>
@include('layouts.nav')
<main>
    <div class="container">
@yield('content')
    </div>
</main>
@include('layouts.footer')
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>

@yield('scripts')

</html>