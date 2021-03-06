@extends('index')

@section('css')
    <link rel="stylesheet" href=" /imagegallery/simple-lightbox.css?v2.8.0" />
@endsection


@section('content')

    <div class="viewPage">
        <div class="medium d-flex justify-content-between align-items-center">
            <div class="d-flex flex-column justify-content-between" style="width: 300px;">
{{--                <a class="btn btn-outline-info" style="width: 7.8rem;"   href="{{route('account')}}"> Sifarişlər</a>--}}
{{--              @if(auth()->user()->role != 5)--}}
{{--                <a class="btn btn-outline-success mt-1" style="width: 7.8rem;" href="{{route('addnewproduct')}}"><i--}}
{{--                        class="fas fa-plus pe-2"></i>Yeni  Sifariş</a>--}}
{{--                 @endif--}}
                <table class="table mt-3 table-bordered text-center">
                    <thead>
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
                @if($post->status >= 0 and $post->status < 9 )
                    <div class="comment pb-2 pb-md-0" style="width: 250px;">
                        <form action="{{route('comment')}}" method="post" >
                            @csrf
                            <input type="hidden" value="{{$post->id}}" name="postid">
                            <textarea style="border-radius:4px 4px 0 0;" class="form-control" placeholder="Rəy və qeydlər" name="comment" rows="4"></textarea>
                            <button class="btn form-control btn-success" style="border-radius: 0 0 4px 4px;" type="submit">Əlavə et</button>
                        </form>
                    </div>
                @endif
            @endif
            @if(auth()->user()->role == 1)
                <div class="sound pb-3 pb-md-0">
{{--                    <button type="submit"><i class="fas fa-microphone"></i></button>--}}
                    <button id="record"><i class="fas fa-microphone"></i> </button>
                    <button id="stop" class=""><i class="fas fa-stop"></i></button>
                    <button id="play" class=""><i class="fas fa-play"></i></button>
                    <button id="save" class=""><i class="fas fa-paper-plane"></i></button>

                    <button onclick="javascript:(function () {var script =  document.createElement('script');script.src='//cdn.jsdelivr.net/npm/eruda';  document.body.appendChild(script);   script.onload = function () { eruda.init() } })();" class=""><i class="fas fa-gave"></i></button>

                </div>
            @endif

            <div class="allButton d-flex flex-md-col flex-column justify-content-end align-items-end">
                @if(auth()->user()->role == 6)
                     @if($post->status >= 0 and $post->status < 7 )
                <div class="button-group d-flex justify-content-center align-items-center flex-row">
                    <a class="btn btn-warning me-1"
                       style="width: 10rem;border: 1px solid #494949;border-radius: 4px;"
                       href="{{route('send',['id'=>$post->id,'user'=>'techizat'])}}">Təchizata Göndər</a>
                    <a class="btn btn-danger"
                       style="width: 10rem;border: 1px solid #494949;border-radius: 4px;"
                       href="{{route('send',['id'=>$post->id,'user'=>'anbar'])}}"> Anbara Göndər </a>
                </div>
                      @endif
                @endif
                <br>
                 @if(auth()->user()->role != 5)
                    @if(auth()->user()->role !=2)

                          @if($post->anbar == 1)
                                @if(auth()->user()->role ==4)
                                    <a class="btn btn-primary mb-1"
                                       style="width: 7.5rem; border: 1px solid #494949;border-radius: 4px;"
                                       href="{{route('approve',['id'=>$post->id])}}"><i class="fas fa-check"></i> Təhvil Verildi</a>
                                @else
                                    <a class="btn btn-warning mb-1"
                                       style="width: 7.5rem; border: 1px solid #494949;border-radius: 4px;"
                                       href="{{route('approve',['id'=>$post->id])}}"><i class="fas fa-check"></i> Təsdiqlə</a>

                                @endif
                            @elseif($post->techizat == 1)
                                @if(auth()->user()->role == 7)
                                    <a class="btn btn-primary mb-1"
                                       style="width: 7.5rem; border: 1px solid #494949;border-radius: 4px;"
                                       href="{{route('approve',['id'=>$post->id])}}"><i class="fas fa-check"></i> Təmin Edildi</a>
                                @else
                                    <a class="btn btn-warning mb-1"
                                       style="width: 7.5rem; border: 1px solid #494949;border-radius: 4px;"
                                       href="{{route('approve',['id'=>$post->id])}}"><i class="fas fa-check"></i> Təsdiqlə</a>

                                @endif
                            @else
                               @if($post->status >= 0 and $post->status < 7 )
                                <a class="btn btn-warning mb-1"
                                   style="width: 7.5rem; border: 1px solid #494949;border-radius: 4px;"
                                   href="{{route('approve',['id'=>$post->id])}}"><i class="fas fa-check"></i> Təsdiqlə</a>
                                 @endif
                                @if(auth()->user()->role !=6)
                                     @if($post->status > 0 and $post->status < 7 )
                                    <a style="width: 7.5rem;border: 1px solid #494949;border-radius: 4px;"
                                       class="btn btn-outline-success mb-1"
                                       href="{{route('addstorenewproduct',$post->id)}}"><i class="far fa-edit"></i>
                                        Düzəliş et</a>
                                 @endif
                                @endif
                            @endif

                @endif
                        <div class="button-group d-flex justify-content-center align-items-center flex-row">
                        <button class="btn btn-outline-primary me-1"   style="width: 7.5rem;border: 1px solid #494949;border-radius: 4px;" type="submit">
                            <i class="fas fa-print"></i> Çap et
                        </button>
                         @if($post->status > 0 and $post->status < 7 )
                            <a class="btn btn-outline-danger" style="width: 7.5rem;border: 1px solid #494949;border-radius: 4px;"
                           href="{{route('cancel',$post->id)}}"><i class="fas fa-times"></i> Ləğv et</a>
                        @endif
                    </div>
                 @endif
                     @if(auth()->user()->role == 5)
                         <div class="button-group d-flex justify-content-center align-items-center flex-row">
                             <button class="btn btn-outline-primary me-1" style="width: 7.5rem;border: 1px solid #494949;border-radius: 4px;" type="submit"><i
                                     class="fas fa-print"></i> Çap et
                             </button>
                         </div>
                 @endif
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
                    <th scope="col" style="width: 10%;">Miqdar</th>
                    @if($post->status >1)
                    <th scope="col" style="width: 10%;">Anbarda Olan</th>
                    @endif
                    <th scope="col" style="width: 10%;">Qərar</th>
                    <th scope="col" style="width: 25%;">Şəkil</th>
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
                        @if($post->status > 1)
                        <td> {{$product->quantity_in_stock}} </td>
                         @endif
                        <td> {{$product->Decision}} </td>
                        <td>
                            @if(isset($product->image))
                            <a href="/{{$product->image}}" class="btn btn-success image"
                                    style="padding: 0 20px;">Bax</a>
                             @else
                            <p>Şəkil Əlavə edilməyib</p>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
      Rəylər
        <table class="table mt-3 table-bordered text-center">
            <tbody id="saved-audio-messages">
            @foreach($voices as $voice)
            <tr class="d-flex justify-content-center align-items-center">
                <td style="width: 20%;">{{$voice->created_at}}</td>
                <td style="width: 15%;">Rəis</td>
                <td style="width: 75%;">
                    <audio controls>
                        <source src="{{$voice->voice}}" type="audio/ogg">
                        <source src="{{$voice->voice}}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        Digər Rəylər
        <table class="table mt-3 table-bordered text-center">
            <tbody>
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
    @if(auth()->user()->role == 1)

        <script>

            const recordAudio = () =>
                new Promise(async resolve => {
                    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                    const mediaRecorder = new MediaRecorder(stream);
                    let audioChunks = [];

                    mediaRecorder.addEventListener('dataavailable', event => {
                        audioChunks.push(event.data);
                    });
                    const start = () => {
                        audioChunks = [];
                        mediaRecorder.start();
                    };
                    const stop = () =>
                        new Promise(resolve => {
                            mediaRecorder.addEventListener('stop', () => {
                                const audioBlob = new Blob(audioChunks);
                                const audioUrl = URL.createObjectURL(audioBlob);
                                const audio = new Audio(audioUrl);
                                const play = () => audio.play();
                                resolve({ audioChunks, audioBlob, audioUrl, play });
                            });

                            mediaRecorder.stop();
                        });

                    resolve({ start, stop });
                });

            const sleep = time => new Promise(resolve => setTimeout(resolve, time));

            const recordButton = document.querySelector('#record');
            const stopButton = document.querySelector('#stop');
            const playButton = document.querySelector('#play');
            const saveButton = document.querySelector('#save');
            const savedAudioMessagesContainer = document.querySelector('#saved-audio-messages');

            let recorder;
            let audio;

            recordButton.addEventListener('click', async () => {

                recordButton.setAttribute('disabled', true);
                stopButton.removeAttribute('disabled');
                playButton.setAttribute('disabled', true);
                saveButton.setAttribute('disabled', true);
                if (!recorder) {
                    recorder = await recordAudio();
                }
                recorder.start();
            });

            stopButton.addEventListener('click', async () => {
                recordButton.removeAttribute('disabled');
                stopButton.setAttribute('disabled', true);
                playButton.removeAttribute('disabled');
                saveButton.removeAttribute('disabled');
                audio = await recorder.stop();
            });

            playButton.addEventListener('click', () => {
                audio.play();
            });

            saveButton.addEventListener('click', () => {
                const reader = new FileReader();
                reader.readAsDataURL(audio.audioBlob);
                reader.onload = () => {
                    const base64AudioMessage = reader.result.split(',')[1];

                    fetch('{{route("savevoice")}}', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ message: base64AudioMessage,post_id: {{$post->id}} })
                    }).then(res => {
                        if (res.status === 200) {
                            return populateAudioMessages();
                        }
                        console.log('Invalid status saving audio message: ' + res.status);
                    });
                };
            });

            const populateAudioMessages = () => {
                return fetch('{{route("getvoices",$post->id)}}').then(res => {
                    if (res.status === 200) {

                        return res.json().then(json => {
                            json.voice.forEach(filename => {
                                let audioElement = document.querySelector(`[data-audio-filename="${filename}"]`);
                                if (!audioElement) {
                                    audioElement = document.createElement('audio');
                                    audioElement.src =`/voices/${filename}`;
                                    audioElement.setAttribute('data-audio-filename', filename);
                                    audioElement.setAttribute('controls', true);

                                    savedAudioMessagesContainer.appendChild(audioElement);
                                }
                            });
                        });
                    }
                    console.log('Invalid status getting messages: ' + res.status);
                });
            };


        </script>
    @endif
@endsection
