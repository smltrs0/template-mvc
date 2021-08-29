<style>
    h2 {
        background-color: #d1d1d1;
        padding: 15px;
        margin-bottom: 1em;
    }

    .container {
        margin-top: 1em
    }

    .navbar-form {
        padding: 0;
        margin-right: 1em
    }

    .table {
        margin: 0
    }

    #newaccount {
        margin-top: 8px
    }

    .pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
  background-color: #066;
}

    .table.table-bordered {
        padding: 1em;
    }

    .table-bordered th {
        cursor: pointer;
    }

    .table-bordered .caret {
        position: relative;
        top: 10px;
        right: 5px;
        float: right;
        /*color: #bfbfc1;*/
    }

    #demo {
        cursor: pointer;
    }
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="container col-md-12" id="panel1">

        <h2>User Accounts</h2>

        <div class="col-md-8 form-group pull-left">
            <form class="navbar-form" role="search">
                <div class="form-group input-group col-md-12">
                    <input type="text" class="form-control" id="searchUsers" placeholder="Search users" name="searchUsers" autofocus>
                    <div class="input-group-btn">
                        <button class="btn btn-default btn" type="submit"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-3 pull-left mb-3">
            <button type="submit" class="btn btn-primary" id="newaccount">Create New Account</button>
        </div>

        <div class="form-group col-md-12">

            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="dropup">
                        <!--<th><input type="checkbox" unchecked></th>-->
                        <th>Nombre</th>
                        <th>Apellido <span class="caret"></span></th>
                        <th>Correo</th>
                        <th>Acción</th>                    
                    </tr>
                </thead>
                <tbody id="tablaUsuarios">
                    <tr>
                        <!--<td><input type="checkbox" unchecked></td>-->
                        <td>Susan</td>
                        <td>Alston</td>
                        <td>ALRMET</td>
                        <td>Alro Steel Corp.</td>
                    </tr>
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination pt-3">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>
<script>
    // document ready vanilla js
document.addEventListener('DOMContentLoaded', function() {

        let formData = new FormData();
       formData.append('action', 'getAll');       
       fetch('./Controller/UsersController.php', {
           method: 'POST',
           body: formData
       })
       .then((response) => response.json())
       .then((response) => { 
           renderizarTabla(response.data)
        });

    // keyup event for search
    document.querySelector('#searchUsers').addEventListener('keyup', function(e) {
       let formData = new FormData();
       formData.append('filtros', e.target.value);
       formData.append('action', 'getAll');       fetch('./Controller/UsersController.php', {
           method: 'POST',
           body: formData
       }).then(function(response) {
            return response.json();
        }).then(function(response) {
           renderizarTabla(response.data);
            // document.querySelector('#panel1').innerHTML = text;
        });
    });
    
});

function renderizarTabla(data){
            let tabla = document.querySelector('#tablaUsuarios');
            tabla.innerHTML = '';
            data.forEach(function(item){
                let fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${item.nombre}</td>
                    <td>${item.apellido}</td>
                    <td>${item.email}</td>
                    <td>${item.id}</td>
                `;
                tabla.appendChild(fila);
            });
        }
</script>