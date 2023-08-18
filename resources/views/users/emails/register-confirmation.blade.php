<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="card">
            @section('title', 'Home')
        <div class="card-header">
                <p class="h3 text-primary fw-bold text-center">Thank you for registering.</p>
        </div>
        <div class="card-body text-center">
                     <i class="fa-solid fa-hippo icon-5x text-center text-primary"></i>
                <p>Hello{{ $name }}</p>

                <p>To start, please access the website <a href="{{ $app_url }}">here</a></p>
                
                <p>Thank you!</p>
        </div>
        <hr>
        <div class="row text-center">
          
            <div class="col">
                <i class="fa-brands fa-facebook me-2"></i>
                <i class="fa-brands fa-instagram me-2"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
     
        </div>
        <div class="card-footer bg-secondary">
            <p class="text-white text-center">insta.inc</p>
            <p></p>
        </div>
    </div>
    
</body>
</html>