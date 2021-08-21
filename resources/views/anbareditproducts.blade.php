@extends('index')

@section('css')
@endsection


@section('content')

    <form action="{{route('updateproducts',$post->id)}}" method="post" enctype="multipart/form-data">
        <input class="ms-4 py-2 text-center" style="border:1px solid #1a1a1a;border-radius: 4px;" name="project_name"
               type="text" placeholder="{{$post->project_name}}" disabled required>

        @csrf
        <div class="addPage mt-5 p-3 bg-light h-auto">
            <div class="responsiveTable p-1">
                <table>
                    <tbody id="tablebody">
                      @foreach($products as $product)
                    <tr>
                        <td style="width:25%;">
                            <input style="width:90%;" type="text" {{-- name="name[]"--}} disabled
                                   required placeholder="{{$product->name}}"></td>
                        <td style="width:20%;">
                            <input style="width:90%;" type="text"   {{--name="destination[]"--}}
                               disabled    required placeholder="{{$product->destination}}">
                        </td>
                        <td style="width:10%;">
                            <input style="width:90%;" type="text"  {{--name="valley_of_measure[]"--}}
                                 disabled  required placeholder="{{$product->valley_of_measure}}">
                        </td>
                        <td style="width:10%;">
                            <input style="width:90%;" type="text"   {{--name="quantity[]"--}}
                                disabled   required  placeholder="{{$product->quantity}}">
                        </td>
                        <td style="width:10%;">
                            <input style="width:90%;" type="text" name="quantity_in_stock_{{$product->id}}" placeholder="Anbarda olan" >
                        </td>
{{--                        <td style="width:10%;">--}}
{{--                            <input type="checkbox" name="instock_{{$product->id}}"> Anbarda yoxdur</td>--}}

                        <td style="width:10%;" class="position-relative">
                            <img src="/{{$product->image}}" alt="" width="70px">
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{--        <button id="addnewrow" class="btn btn-success mt-3" type="submit"><i class="fas fa-plus pe-2"></i>Yeni sətir</button>--}}

        <div class="operation m-3 d-flex justify-content-end align-items-end">
            <button class="btn btn-success mt-3 me-2" type="submit">Göndər</button>
            <a class="btn btn-outline-danger mt-3" href="{{ redirect()->getUrlGenerator()->previous() }}">
                <i class="fas fa-left"></i>  Geri Qayıt</a>
        </div>

    </form>
@endsection


@section('js')
{{--    <script>--}}
{{--        $(document).ready(function () {--}}

{{--            $('#addnewrow').on('click',function () {--}}

{{--                let content ='<tr>'+' <td style="width:30%;"> <input style="width:90%;" type="text" name="name[]" required placeholder="Mal-materialın tam adı"></td>'+--}}
{{--                    '<td style="width:20%;"><input style="width:90%;" type="text"  name="destination[]" required placeholder="Təyinatı"></td>'+--}}
{{--                    '<td style="width:20%;"> <input style="width:90%;" type="text" name="valley_of_measure[]" required placeholder="Ölçü vahidi"></td>'+--}}
{{--                    '<td style="width:10%;"><input style="width:90%;" type="text"  name="quantity[]" required  placeholder="Miqdar"></td>'+--}}
{{--                    '<td style="width:10%;" class="position-relative"><label style="width: 90%;" class="custom-file-upload"><input type="file" accept="image/*" name="image[]" /> Şəkil Seç</label></td>'+--}}
{{--                    '<td style="width:10%;"><button class="btn btn-outline-danger   removeRow"  ><i class="fas fa-times"></i> Sil</button></td>'+'</tr>';--}}
{{--                $('#tablebody').append(content);--}}
{{--            });--}}

{{--            $(this).on('click','.removeRow',function () {--}}
{{--                //  alert();--}}
{{--                $(this).parent().parent().remove();--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
@endsection
