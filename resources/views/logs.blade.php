@extends('index')

@section('css')
@endsection


@section('content')

    <div class="main-content mt-5">
        <div class="responsiveTable p-1">
            <table class="table mt-3 table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col" style="width: 5%;">Log №</th>
                    <th scope="col" style="width: 20%;">İstifadəçi</th>
                    <th scope="col" style="width: 10%;">log</th>
                    <th scope="col" style="width: 20%;">Tarix Saat</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <th scope="row">{{$log->id}}</th>
                        <td>{{$log->user->name}}</td>
                        <td>{{$log->message}}</td>
                        <td>{{$log->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
                {{$logs->links()}}
            </table>
        </div>
    </div>


@endsection


@section('js')
@endsection
