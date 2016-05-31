<?php

//Verificar se o utilizador não está logado//
if(!isset($_COOKIE['Utilizador'])){

    //Redirecionar para a pagina anterior//
    Header('Location: ../');

}

//Incluir ficheiro de funções//
include('../stuff/funcs.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SevenBits-BackOffice</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href = "img/favicon.ico"/>

    <!--Icons-->
    <script src="js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->



</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span>SevenBits</span>BackOffice</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php session_start(); echo $_COOKIE['Utilizador']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="../"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Voltar</a></li>
                        <li><a href="../logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
            </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
        <li><a href="adicionarprod.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Produtos</a></li>
        <li class = "active"><a href="adicionarcategoria.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Categorias</a></li>
        <li role="presentation" class="divider"></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div style="clear:both;"></div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Adicionar Categoria</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="worker_adicionarcategoria.php" method="post">
                        <fieldset>
                            <!-- Categoria -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Categoria</label>
                                <div class="col-md-9">
                                    <input id="categoria" name="categoria" type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 widget-right">
                                    <button type="submit" class="btn btn-default btn-md pull-right">Inserir</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

        </div><!--/.col-->

    </div><!--/.row-->
</div>	<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div style="clear:both;"></div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Remover Categoria</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="worker_removercategoria.php" method="post">
                        <fieldset>
                            <!-- Categoria -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Categoria</label>
                                <div class="col-md-9">

                                    <select name = "categoria">

                                            <?php

                                            get_Categorias();

                                            ?>

                                    </select>

                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 widget-right">
                                    <button type="submit" class="btn btn-danger btn-md pull-right">Remover</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

        </div><!--/.col-->

    </div><!--/.row-->
</div>	<!--/.main-->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
