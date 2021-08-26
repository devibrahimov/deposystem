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


<div class="main-content mb-3">

    @if(auth()->user()->role == 4)
        @if(isset($anbarposts))
        @if(!$anbarposts->isEmpty() )
            <div class="responsiveTable p-1">
                <table class="table mt-3 table-bordered text-center">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 5%;">№</th>
                        <th scope="col" style="width: 20%;">Layhiə</th>
                        <th scope="col" style="width: 15%;">Tarix</th>
                        <th colspan="2" style="width: 30%;">Redaktə</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($anbarposts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->project_name}}</td>
                            <td>{{$post->created_at}}</td>

                            <td style="width:15%; background-color: #c7ffe1;">
                                <a style="text-decoration: none;"  href="{{route('postdetail',$post->id)}}">Bax</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    {{$posts->links()}}
                    </tfoot>
                </table>
            </div>
        @endif
        @endif
    @endif
    @if(auth()->user()->role == 7)
        @if(isset($techizatposts))
            @if(!$techizatposts->isEmpty())

                <div class="responsiveTable p-1">
                    <table class="table mt-3 table-bordered text-center">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 5%;">№</th>
                            <th scope="col" style="width: 20%;">Layhiə</th>
                            <th scope="col" style="width: 15%;">Tarix</th>
                            <th scope="col" style="width: 30%;">Status</th>
                            <th colspan="2" style="width: 30%;">Redaktə</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($techizatposts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->project_name}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{poststatus($post->status)}} </td>
                                <td style="width:15%; background-color: #c7ffe1;">
                                    <a style="text-decoration: none;"  href="{{route('postdetail',$post->id)}}">Bax</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        {{$posts->links()}}
                        </tfoot>
                    </table>
                </div>

            @endif
        @endif
    @endif


    @if(auth()->user()->role == 2 or auth()->user()->role == 4)

        <a href="{{route('addnewproduct')}}" class="btn btn-outline-success" type="submit">
            <i class="fas fa-plus pe-2"></i>Yeni Sifariş</a>

    @endif
    <a class="btn btn-outline-secondary" style="width: 7.8rem;"   href="{{route('account')}}"> Sifarişlər</a>
    @if(auth()->user()->role == 1 or auth()->user()->role == 6)


        <a href="{{route('cancelposts')}}" class="btn btn-outline-danger" type="submit">
            <i class="fas fa-times pe-2"></i>Ləğv Edilmiş Sifarişlər</a>

        <a href="{{route('userslogs')}}" class="btn btn-outline-info" type="submit">
            <i class="fas fa-users pe-2"></i>İstifadəçi Hərəkətləri</a>

        <a href="{{route('archive')}}" class="btn btn-outline-primary" type="submit">
            <i class="fas fa-archive pe-2"></i>Arşiv</a>
    @endif

</div>


       @yield('content')



</div>
</div>

</div>




<script src="/src/js/bootstrap.min.js"></script>
<script src="/src/js/jquery-3.6.0.min.js"></script>
@yield('js')

<script src="/sweetalert.min.js"></script>
@if(session()->has('feedback'))
    @php $feedback =  session()->get('feedback') ;
    @endphp
    <script>

        swal({
            title: "{{ $feedback['title']}}",
            text: "{{ $feedback['text']}}",
            icon: "{{ $feedback['icon']}}",
            button: "{{ $feedback['button']}}",

        });
    </script>
@endif
</body>

</html>
