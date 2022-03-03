<!DOCTYPE html>
<html>

<head>
    @head
    @include('layouts.meta')
    @include('layouts.css')
</head>
<body>

    <div class="header-wrapper">

        @include('layouts.header')

    </div>

    @yield('content')

    @include('layouts.footer')

</body>

@footer

@include('layouts.js')
@include('layouts.script')

</html>