<nav class="navbar navbar-expand-lg" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="index.php">Inicio</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="sobreNosotros" class="nav-link">Sobre Nosotros</a></li>
                <li class="nav-item"><a href="contactanos.php" class="nav-link">Contactanos</a></li>
                <li class="nav-item"><a href="encuentranos.php" class="nav-link">Encuentranos</a></li>
                <?php if(!empty($_SESSION["email"])) echo '<li class="nav-item"><a href="contrataciones.php" class="nav-link">Contrataciones</a></li>'; ?>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                <li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle"><?php echo (empty($_SESSION["email"]))? "Login" : $_SESSION["firstName"] ; ?><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                        <?php if(empty($_SESSION["email"])) { ?>
                        <form class="px-4 py-3" action="login.php" method="post">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail1" name="email" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword1" name="passwd" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalPassword">New around here? Sign up</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="perfil.php" >Perfil</a>
                            <a class="dropdown-item" href="logout.php" >Cerrar sesion</a>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
 
<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Registro</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form" role="form" action="registro.php" method="post">
            <div class="modal-body">
            
                <p><input type="text" name="firstName" placeholder="first name" required> </p>
                <p><input type="text" name="lastName" placeholder="last name" required> </p>
                <input type="text" style="display:none">
                <input type="password" style="display:none">
                <p><input type="email" name="email" pattern="^.+@.+\..+$" placeholder="email@example.com" required> </p>
                <p><input type="password" name="passwd" placeholder="Password" required> </p>
             
                
            </div>
            <div class="modal-footer">                
                <div class="form-group">                  
                  <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
               </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
