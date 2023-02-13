<header>
    <div class="div">
        <img src="book-png.png" alt="logo" class="logo" witdth="125px" height="125px">
        <?php
        if(!isset($_SESSION['rol'])){
            ?><div class="headerAll">
                    <a class="header" href="index.php?controller=admin&action=SignInAdmin">Inicar Sessión como administrador</a><br>
                    <a class="header" href="index.php?controller=student&action=SignIn">Inicar Sessión como alumno</a><br>
                    <a class="header" href="index.php?controller=professor&action=SignInProfessor">Inicar Sessión Como profesor</a><br>
                    <a class="header" href="index.php?controller=student&action=SignUpForm">Registrarse</a><br>
                    <div class="header2">No has iniciado sessión</div>
                </div>
            <?php
        }else if($_SESSION['rol']=='admin'){
            ?>
            <div class="DivMenu">
                <div class="inicioSession">Eres administrador, bienvenido</div>
                <nav>
                    <ul class="generalAll">
                        <li><a href="index.php?controller=user&action=mostrarHome" class="general">Inicio</a></li>
                        <li><a href="index.php?controller=admin&action=AdminProfesor" class="general">Profesores</a></li>
                        <li><a href="index.php?controller=admin&action=AdminCurso" class="general">Cursos</a></li>
                    </ul>
                </nav>
            </div>
            
            <a href="index.php?controller=user&action=SignOut" class="SignOut">Salir</a>
                
            <?php
        }else if($_SESSION['rol']=='alumno'){
            ?>
            <div class="DivMenu">
                <div class="inicioSession">Hola <?php echo($_SESSION['NombreHeader'])  ?>, bienvenido</div>
                <nav>
                    <ul class="generalAll">
                        <li><a href="index.php?controller=student&action=mostrarHome" class="general">Inicio</a></li>
                        <li><a href="index.php?controller=student&action=YourCourses" class="general">Mis Cursos</a></li>
                        <li><a href="index.php?controller=student&action=AvailableCourses" class="general">Cursos Disponibles</a></li>
                    </ul>
                </nav>
            </div>
            <div class="headerFinal">
                <a href="index.php?controller=student&action=EditSelfForm" class="SignOut"><img src="<?php echo ($_SESSION['fotoPerfil']) ?>" alt="usuario" class="SignOut" witdth="100px" height="100px"></a>
                <a href="index.php?controller=user&action=SignOut" class="SignOut">Salir</a>
            </div>
            <?php
        }else if($_SESSION['rol']=='profesor'){
            ?>
            <div class="DivMenu">
                <div class="inicioSession">Hola <?php echo($_SESSION['NombreHeader'])  ?>, bienvenido</div>
                <nav>
                    <ul class="generalAll">
                        <li><a href="index.php?controller=professor&action=mostrarHome" class="general">Inicio</a></li>
                        <li><a href="index.php?controller=professor&action=ShowCourses" class="general">Curso</a></li>                                
                    </ul>
                </nav>
            </div>
            <a href="index.php?controller=user&action=SignOut" class="SignOut">Salir</a>
            <?php
        }
        ?>
    </div>
</header>