@extends('index')

@section('css')
@endsection


@section('content')

    <form action="{{route('addnewproduct')}}" method="post" enctype="multipart/form-data">
        <input class="ms-4 py-2 text-center" style="border:1px solid #1a1a1a;border-radius: 4px;" name="project_name"
               type="text" placeholder="Layhiə adı və kodu" required>

            @csrf
        <div class="addPage mt-5 p-3 bg-light h-auto">
            <div class="responsiveTable p-1">
                <table>
                    <tbody id="tablebody">

                    <tr>
                        <td style="width:30%;">
                            <input style="width:90%;" type="text" name="name[]"
                                   required placeholder="Mal-materialın tam adı"></td>
                        <td style="width:20%;">
                            <input style="width:90%;" type="text"  name="destination[]"
                                   required placeholder="Təyinatı">
                        </td>
                        <td style="width:20%;">
                            <input style="width:90%;" type="text" name="valley_of_measure[]"
                                   required placeholder="Ölçü vahidi">
                        </td>
                        <td style="width:15%;">
                            <input style="width:90%;" type="text"  name="quantity[]"
                                   required  placeholder="Miqdar">
                        </td>
                        <td style="width:15%;" class="position-relative">
                            <form action="">
                                <label style="width: 90%;" class="custom-file-upload">
                                    <input type="file" accept="image/*" name="image[]" />
                                  Şəkil Seç
                                </label>
                            </form>
                        </td>

                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <button id="addnewrow" class="btn btn-success mt-3" type="submit"><i class="fas fa-plus pe-2"></i>Yeni sətir</button>

        <div class="operation m-3 d-flex justify-content-end align-items-end">
            <button class="btn btn-success mt-3 me-2" type="submit">Göndər</button>
            <button class="btn btn-outline-danger mt-3" type="submit"><i class="fas fa-times"></i> Ləğv
                et</button>
        </div>

    </form>
@endsection


@section('js')
    <script>
        $(document).ready(function () {

        $('#addnewrow').on('click',function () {

            let content ='<tr>'+' <td style="width:30%;"> <input style="width:90%;" type="text" name="name[]" required placeholder="Mal-materialın tam adı"></td>'+
            '<td style="width:20%;"><input style="width:90%;" type="text"  name="destination[]" required placeholder="Təyinatı"></td>'+
            '<td style="width:20%;"> <input style="width:90%;" type="text" name="valley_of_measure[]" required placeholder="Ölçü vahidi"></td>'+
            '<td style="width:10%;"><input style="width:90%;" type="text"  name="quantity[]" required  placeholder="Miqdar"></td>'+
            '<td style="width:10%;" class="position-relative"><label style="width: 90%;" class="custom-file-upload"><input type="file" accept="image/*" name="image[]" /> Şəkil Seç</label></td>'+
            '<td style="width:10%;"><button class="btn btn-outline-danger   removeRow"  ><i class="fas fa-times"></i> Sil</button></td>'+'</tr>';
            $('#tablebody').append(content);
        });

    $(this).on('click','.removeRow',function () {
      //  alert();
         $(this).parent().parent().remove();
    });

        });
    </script>
@endsection
