<?php
/**
 * @Company: LUMUSOFT
 * @CompanyURI: https://lumusoft.com
 * @Description: Developed by LUMUSOFT Software team.
 * @Version: 1.0.0
 * @Date :    08.08.2021
 */
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/src/css/all.min.css">
    <link rel="stylesheet" href="/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="/src/css/style.css">
    @yield('css')
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="user bg-light">

                <div class="username">
                    <span style="font-weight: bold;">{{auth()->user()->name}}</span>
                    <span style="font-style: italic; color: #fd9f0b;">{{auth()->user()->department}}</span>
                </div>

                <button  onclick="event.preventDefault(); document.getElementById('logoutform').submit()"
                         class="btn" style="color: #800101;" type="submit">Çıxış</button>
                <form action="{{route('logout')}}" method="post" id="logoutform" style="display: none">
                    @csrf
                </form>
            </div>





       @yield('content')



</div>
</div>

</div>




<script src="/src/js/bootstrap.min.js"></script>
<script src="/src/js/jquery-3.6.0.min.js"></script>
@yield('js')
</body>

</html>
