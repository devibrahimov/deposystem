<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="src/css/all.min.css">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/loginPanel.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <div class="login-box d-flex justify-content-center align-items-center flex-column">
                <div class="logo py-2">Logo</div>

                <form action="{{route('logincontroller')}}" method="post" class="form my-3 flex-column d-flex justify-content-center align-items-center">

                    <span><i class="far fa-envelope"></i>
                        <input class="my-2 py-1 text-center" type="text" name="email" placeholder="İstifadəçi" required></span>
                    <span><i class="fas fa-lock"></i>
                        @csrf
                        <input class="my-2 py-1 text-center" type="password" name="password" placeholder="Şifrə" required></span>
                    <button type="submit">DAXİL OL</button>
                </form>

            </div>
        </div>
    </div>
</div>




<script src="src/js/bootstrap.min.js"></script>
</body>
</html>
