<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Custom Form Elements - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="index.html"></a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                    aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-file-text"></i><span
                        class="app-menu__label">Unidades de Atendimento</span></a></li>


    </ul>
</aside>
<main class="app-content">
    @yield('content')
</main>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/select2.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    function getUnitsJson(field) {


        // Recupera o value do input cep
        let units = document.getElementById('unit').value

        // Inicia requisição AJAX com o axios
        axios.post(`http://localhost:8080/units`, {units: units, keyword: field})
            .then(response => {
                showResults(response.data)
            })
            .catch(error => {
                // console.log(error)

                // Mostra a div com o erro
                document.getElementById('results').style.display = 'block'

                // Mostra a mensagem
                document.getElementById('results').innerHTML = 'Erro inesperado'
            })
    }

    function showResults(unit) {

        // Mostra a div com o resultado
        document.getElementById('results').style.display = 'block'


        // Mostra os resultados:
        var html = document.getElementById('results').innerHTML = `
            <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-responsive-md  table-responsive-sm table-responsive-xl ble-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                   <th scope="col">Unidade</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cep</th>
                  </tr>
                </thead>
                <tbody>`;

        for (var k in unit) {

            html +=
                `
                  <tr>
                    <td>${unit[k].name}</td>
                    <td>${unit[k].place}</td>
                    <td>${unit[k].neighborhood}</td>
                    <td>${unit[k].city}</td>
                    <td>${unit[k].state}</td>
                    <td>${unit[k].zipcode}</td>
                  </tr>`;
        }
        html += `
                </tbody>
              </table>
        `;

        if (unit.length <= 0) {
            html += `<tr>
                    <td colspan="6">Nenhum registro encontrado</td>
                  </tr>`;
        }

        document.getElementById("results").innerHTML = html;
    }

</script>

</body>
</html>