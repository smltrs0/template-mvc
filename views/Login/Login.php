
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Ingreso al sistema</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
  </head>
  <body class="text-center">
        <style>
            html,
            body {
            height: 100%;
            }

            body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            }

            .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            }
            .form-signin .checkbox {
            font-weight: 400;
            }
            .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
            }
            .form-signin .form-control:focus {
            z-index: 2;
            }
            .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            }
        </style>
    <form class="form-signin">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Por favor, ingrese</h1>
      <label for="inputEmail" class="sr-only">Correo</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Correo" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" id="remember"> Recuérdate
        </label>
      </div>
      <button id="btnIngresar" class="btn btn-lg btn-primary btn-block" onclick="ingresar(event)" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted" id="year-actual"></p>
    </form>
  </body>
  <script>
      (function(){
          let fecha = new Date();
          let anio = fecha.getFullYear();
            document.getElementById('year-actual').innerHTML = "&copy;"+anio;
      })();

      function ingresar(event) {
        event.preventDefault();

        let btnIngresar = document.getElementById('btnIngresar');
        btnIngresar.innerHTML = "Ingresando";
        btnIngresar.disabled = true;

        const formData = new FormData();

        formData.append('email', document.getElementById('inputEmail').value);
        formData.append('password', document.getElementById('inputPassword').value);
        formData.append('remember', document.getElementById('remember').checked);
        formData.append('action', 'login');

          fetch('./Controller/LoginController.php', {
              method: 'POST',
              body: formData
          })
          .then(res => res.json())
          .then(data => {
              if (data.status == true) {
                  window.location.href = '/Panel';
                  alert(data.msg);
              } else {
                  alert('Usuario o contraseña incorrectos');
                  btnIngresar.disabled = false;
                  btnIngresar.innerHTML = "Ingresar";
              }
          })
          .catch(err => console.log(err));
      }
  </script>
</html>
