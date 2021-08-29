<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #fc4a1a;
    background: -webkit-linear-gradient(to right, #f7b733, #fc4a1a);
    background: linear-gradient(to right, #f7b733, #fc4a1a)
}

.card {
    border-radius: 10px;
    padding: 35px 26px;
    width: 400px
}

.abt {
    font-size: 14px
}

.inputbox {
    margin-top: 12px;
    position: relative
}

.inputbox input {
    border: 2px solid #eee;
    padding: 0 10px
}

.inputbox input:focus {
    color: #495057;
    background-color: #fff;
    border-color: none;
    outline: 0;
    box-shadow: none;
    border: 2px solid #0d6efd
}

.input-tag {
    position: absolute;
    top: 27px;
    left: 7px;
    width: 32px
}

.proceed button {
    height: 50px;
    font-size: 15px
}

.form-check-label {
    font-size: 12px
}

.btn-primary:focus {
    color: #fff;
    background-color: #025ce2;
    border-color: #0257d5;
    box-shadow: none
}

.form-check-input {
    width: 16px;
    height: 16px;
    margin-top: 6px
}
</style>    
<div class="card">
    <div class="text-center">
        <h3>Crea una cuenta</h3> <span class="abt">Ya posees una cuenta? <a href="#">Ingresa</a></span>
    </div>
    <div class="form mt-3">
        <div class="inputbox"> <input type="text" name="username" class="form-control" placeholder="Nombre de usuario"> </div>
        <div class="input-group inputbox"> <input type="text" name="first_name" placeholder="Primer nombre" class="form-control"> 
        <input type="text" name="last_name" placeholder="Primer apellido" class="form-control"> </div>
        <div class="inputbox"> <input type="text" name="email" class="form-control" placeholder="Correo"></div>
        <div class="inputbox"> <input type="text" name="password" class="form-control" placeholder="Contraseña"></div>
        <div class="inputbox"> <input type="text" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña"></div>
    </div>
    <div class="mt-4 proceed"> 
        <button class="btn btn-primary btn-block d-flex flex-row justify-content-between align-items-center">
            <div class="text-right">
                <span>Crear cuenta</span>
            </div>
            <!-- <div class="text-right"> <span><i class="fa fa-long-arrow-right align-items-center"></i></span> </div> -->
        </button> </div>
    <div class="mt-1">
        <div class="form-check"> <input class="form-check-input" type="checkbox" name="accept_terms" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> E leído y acepto los<a href="#">Términos de servicio</a> </label> </div>
    </div>
</div>
</body>
<script>
    // document ready js vanilla
    document.addEventListener('DOMContentLoaded', function() {
        // detectar click en el boton
        document.querySelector('.btn-primary').addEventListener('click', function(e) {
            // e.preventDefault();
            // console.log('click');
            let formData = new FormData();
            formData.append('username', document.querySelector('input[name="username"]').value);
            formData.append('first_name', document.querySelector('input[name="first_name"]').value);
            formData.append('last_name', document.querySelector('input[name="last_name"]').value);
            formData.append('email', document.querySelector('input[name="email"]').value);
            formData.append('password', document.querySelector('input[name="password"]').value);
            formData.append('password_confirmation', document.querySelector('input[name="password_confirmation"]').value);
            formData.append('accept_terms', document.querySelector('input[name="accept_terms"]').checked);
            formData.append('action', 'register');
            // console.log(formData);
            // fetch
            fetch('./Controller/UsersController.php', {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
                alert(data.msg);
                // redireccion js
                if(data.status == true) window.location.href = './panel-principal';
            })
            .catch(function(error) {
                console.log(error);
            });
        });
    });
</script>