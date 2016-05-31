<?php
    session_start();
    include_once 'stuff/config.php';

    //Incluir ficheiro de funções//
    include('stuff/funcs.php');

    //Chamar a função para registar uma visita//
    $IP = get_IP();
    Adicionar_Visita($IP);

?>
<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SevenBits</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" type="image/ico" href = "../stuff/img/favicon.png"/>

</head>

<body>
    
    <div id="Modal" class="modalDialog">
       <div>	
                   <a id="closemodal" href="#" title="Close" class="close">X</a>

                   <h2>Login</h2>

                   <form action="" method="POST">
                       <input type="text" name="user" id="user" class="form-control" placeholder="Username" style="margin-top:5px;"/>
                       <input type="password" name="password" id="password" class="form-control" placeholder="Password" style="margin-top:5px;"/>
                       <input type="submit" name="Entrar" id="Entrar" value="Entrar" class="form-control btn btn-success" style="margin-top:10px;" />
                   </form>
                   
                   <?php
                   
                    if (isset($_POST['Entrar'])) {
                        if (!empty($_POST['user']) && !empty($_POST['password'])) {
                            $sql = $con->prepare("SELECT * FROM Utilizador WHERE Utilizador=? AND Password=?");
                            $sql->execute(array($_POST['user'],md5($_POST['password'])));
                            
                            $i=0;
                            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                                $i++;
                                $details = $row;
                            }
                            
                            if ($i==1) {
                                $_SESSION['logged'] = true;
                                if (isset($details)) {
                                    $_SESSION['Utilizador'] = $details['Utilizador'];
                                    setcookie("Utilizador",$_SESSION['Utilizador'],time()+3600*9999);
                                    if ($details['Tipo'] == 'Administrador') {
                                        //É admin
                                        $_SESSION['admin'] = true;
                                    }
                                }
                            }
                            
                        }
                    }
                   
                   ?>
       </div>
   </div>
    
    <div id="ModalRegisto" class="modalDialog">
       <div>	
                   <a id="closemodalRegisto" href="#" title="Close" class="close">X</a>

                   <h2>Registo</h2>

                   <form action="" method="POST">
                       <input type="text" name="registo_user" id="registo_user" class="form-control" placeholder="Username" style="margin-top:5px;" />
                       <input type="password" name="registo_password" id="registo_password" class="form-control" placeholder="Password" style="margin-top:5px;" />
                       <input type="text" name="registo_morada" id="registo_morada" class="form-control" placeholder="Morada" style="margin-top:5px;" />
                       <input type="text" name="registo_telefone" id="registo_telefone" class="form-control" placeholder="Telefone" style="margin-top:5px;" />
                       
                       <input type="submit" name="Registo" id="Registo" value="Registo" class="form-control btn btn-success" style="margin-top:10px;" />
                   </form>
                   
                   <?php
                   
                    if (isset($_POST['Registo'])) {
                        if (!empty($_POST['registo_user']) && !empty($_POST['registo_password']) && !empty($_POST['registo_morada']) && !empty($_POST['registo_telefone'])) {
                            $sql = $con->prepare("INSERT INTO Utilizador (Utilizador,Password,Morada,Telefone,Tipo) VALUES (?,?,?,?,'Utilizador')");
                            $sql->execute(array($_POST['registo_user'],md5($_POST['registo_password']),$_POST['registo_morada'],$_POST['registo_telefone']));
                            var_dump($sql);
                        }
                    }
                   
                   ?>
       </div>
   </div>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SevenBits</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="shop.php">Loja</a>
                    </li>
                    <!--<li>
                        <a href="#">Services</a>
                    </li>-->
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    
                    
                </ul>
                
                
                <?php
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true):
                ?>
                <button type='button' class='btn btn-primary' style='float:right;margin-top:7px;margin-left:3px;' onclick='location.href="backoffice/"'>Backoffice</button>
                <?php
                    endif;
                    
                    if (!isset($_SESSION['logged'])):
                        
                 ?>
                <button type="button" class="btn btn-primary" style="float:right;margin-top:7px;margin-left:3px;" id="btnRegistar">Registar</button>
                <button type="button" class="btn btn-primary" style="float:right;margin-top:7px;" id="btnLogin">Login</button>
                <?php
                    else:
                ?>
                
                <button type='button' class='btn btn-primary' style='float:right;margin-top:7px;margin-left:3px;' onclick='location.href="logout.php"'>Logout</button>
                
                <?php
                        if (isset($_SESSION['Utilizador'])) {
                            echo "<p style='color:white;float:right;margin-top:13px;margin-right:3px;font-size:16px;'>Bem Vindo: ".$_SESSION['Utilizador']."</p>";
                        }
                    endif;
                ?>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>SevenBits</h1>
            <p>Sejam bem-vindos á nossa loja online! Aqui poderá realizar as suas compras de forma comoda.</p>
            <!--<p><a class="btn btn-primary btn-large">Call to action!</a>-->
            </p>
        </header>

        <hr>
        
        <?php
            $FourProds = $con->prepare("SELECT * FROM Produto ORDER BY ID DESC LIMIT 4");
            $FourProds->execute();
            $FourProds = $FourProds->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Ultimas Novidades</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            
            <?php
                for($i=0;$i<count($FourProds);$i++) {
                    
                    echo '<div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <img src="http://placehold.it/800x500" alt="">
                        <div class="caption">
                            <h3>'.$FourProds[$i]["Produto"].'</h3>
                            <p>'.$FourProds[$i]["Descricao"].'</p>
                            <p>
                                <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">Ver mais</a>
                            </p>
                        </div>
                    </div>
                </div>';
                    
                }
            ?>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; SevenBits 2016 - <?php echo date('Y'); ?></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script>
    $(document).ready(function () {
        $('#btnLogin').click(function () {
            document.getElementById('Modal').style.opacity = '1';
            document.getElementById('Modal').style.pointerEvents = 'auto';
        }); 
        
        $('#btnRegistar').click(function () {
            document.getElementById('ModalRegisto').style.opacity = '1';
            document.getElementById('ModalRegisto').style.pointerEvents = 'auto';
        });
        
        $('#closemodalRegisto').click(function () {
            document.getElementById('ModalRegisto').style.opacity = '0';
            document.getElementById('ModalRegisto').style.pointerEvents = 'none';
        });
        
        $('#closemodal').click(function () {
            document.getElementById('Modal').style.opacity = '0';
            document.getElementById('Modal').style.pointerEvents = 'none';
        });
    });
    </script>

</body>

</html>
