@extends('index')


@section('css')
@endsection


@section('content')
    <div class="main-content">
        <a href="{{route('addnewproduct')}}" class="btn btn-outline-success" type="submit">
            <i class="fas fa-plus pe-2"></i>Yeni Sifariş</a>
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

                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->project_name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{poststatus($post->status)}} </td>
                        <td style="width:15%; background-color: #c7ffe1;">
                            <a style="text-decoration: none;"  href="{{route('postdetail',$post->id)}}">Bax</a>
                        </td>
                        <td style=" background-color: #ffcccc;"><a style="text-decoration: none;"  href="">Ləğv et</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                {{$posts->links()}}
                </tfoot>
            </table>
        </div>
    </div>
@endsection


@section('js')
@endsection
