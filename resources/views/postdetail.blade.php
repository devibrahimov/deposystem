@extends('index')

@section('css')
    <link rel="stylesheet" href=" /imagegallery/simple-lightbox.css?v2.8.0" />
@endsection


@section('content')

    <div class="viewPage">
        <div class="medium d-flex justify-content-between align-items-center">
            <div class="d-flex flex-column justify-content-between" style="width: 300px;">
                <a class="btn btn-outline-info" style="width: 7.8rem;"   href="{{route('account')}}">  Sifarişlər</a>
                <a class="btn btn-outline-success mt-1" style="width: 7.8rem;" href="{{route('addnewproduct')}}"><i
                        class="fas fa-plus pe-2"></i>Yeni  Sifariş</a>
                <table class="table mt-3 table-bordered text-center">
                    <thead">
                    <th scope="col">№</th>
                    <th scope="col">{{$post->id}}</th>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="col">Layhiə</th>
                        <td>{{$post->project_name}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Tarix</th>
                        <td>{{$post->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Status</th>
                        <td>{{poststatus($post->status)}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @if(auth()->user()->role != 1)
                <div class="comment pb-2 pb-md-0" style="width: 250px;">
                    <form action="{{route('comment')}}" method="post" >
                        @csrf
                        <input type="hidden" value="{{$post->id}}" name="postid">
                        <textarea style="border-radius:4px 4px 0 0;" class="form-control" placeholder="Rəy və qeydlər" name="comment" rows="4"></textarea>
                        <button class="btn form-control btn-success" style="border-radius: 0 0 4px 4px;" type="submit">Əlavə et</button>
                    </form>
                </div>
            @endif
            @if(auth()->user()->role == 1)
                <div class="sound pb-3 pb-md-0">
                    <button type="submit"><i class="fas fa-microphone"></i></button>
                </div>
            @endif

            <div class="allButton d-flex flex-md-col flex-column justify-content-end align-items-end">
                @if(auth()->user()->role !=2)
                <a class="btn btn-warning mb-1" style="width: 7.5rem; border: 1px solid #494949;border-radius: 4px;" href="{{route('approve',['id'=>$post->id])}}"><i class="fas fa-check"></i> Təsdiqlə</a>
                <a style="width: 7.5rem;border: 1px solid #494949;border-radius: 4px;" class="btn btn-outline-success mb-1"
                   href="{{route('addstorenewproduct',$post->id)}}"><i class="far fa-edit"></i>
                    Düzəliş  et</a>
                @endif

                <div class="button-group d-flex justify-content-center align-items-center flex-row">
                    <button class="btn btn-outline-primary me-1" style="width: 7.5rem;border: 1px solid #494949;border-radius: 4px;" type="submit"><i class="fas fa-print"></i> Çap et</button>
                    <a class="btn btn-outline-danger" style="width: 7.5rem;border: 1px solid #494949;border-radius: 4px;" href="{{route('cancel',$post->id)}}"><i class="fas fa-times"></i> Ləğv
                        et</a>
                </div>
            </div>

        </div>
        <div class="responsiveTable p-1">
            <table class="table mt-3 table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col" style="width: 5%;">S/S</th>
                    <th scope="col" style="width: 25%;">Mal-materialın tam adı</th>
                    <th scope="col" style="width: 15%;">Təyinat</th>
                    <th scope="col" style="width: 15%;">Ölçü vahidi</th>
                    <th scope="col" style="width: 20%;">Miqdar</th>
                    @if($post->status <1)
                    <th scope="col" style="width: 20%;">Anbarda Olan</th>
                    @endif
                    <th scope="col" style="width: 20%;">Şəkil</th>
                </tr>
                </thead>
                <tbody >
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->destination}}</td>
                        <td>{{$product->valley_of_measure}}</td>
                        <td>{{$product->quantity}}</td>
                        @if($post->status < 1)
                        <td> {{$product->quantity_in_stock}} </td>
                         @endif
                        <td>
                            <a href="/{{$product->image}}" class="btn btn-success image"
                                    style="padding: 0 20px;">Bax</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        Rəy
        <table class="table mt-3 table-bordered text-center">
            <tbody>
            <tr class="d-flex justify-content-center align-items-center">
                <td style="width: 20%;">02.08.2021 09:37</td>
                <td style="width: 15%;">Rəis</td>
                <td style="width: 75%;"><i class="far fa-play-circle text-success" style="font-size: 25px;"></i></td>
            </tr>
            @foreach($comments as $comment)
            <tr class="d-flex justify-content-center align-items-center">
                <td style="width: 20%;">{{$comment->created_at}}</td>
                <td style="width: 15%;">{{$comment->user->department}}</td>
                <td style="width: 15%;">{{$comment->user->name}}</td>
                <td style="width: 75%;" > {{$comment->content}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
@section('js')
    <script src="/imagegallery/simple-lightbox.js?v2.8.0"></script>
    <script>
        (function(){
            var $gallery = new SimpleLightbox('tbody a.image', {});
        })();
    </script>
@endsection
