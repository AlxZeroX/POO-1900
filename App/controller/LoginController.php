<?php
class LoginController
{
  public function index()
  {

    echo
      '<nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link"  href="?c=Index&a=index">Inicio</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="?c=Prueba&a=list">Prueba<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Persona&a=list">Personas (Registro)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Curso&a=list">Cursos</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=Instructores&a=list">Instructores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Area&a=list">Asignar area a los cursos</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=Calificaciones&a=list">Boletas Calificaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Imprimir&a=list">Imprimir</a>
            </li>
          </ul>

        </nav>
        



        <main  role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Login</h1>
          
          
          
          
    			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 well">
				<form action="" name="f1" method="post">
                    <h4>Usuario: </h4>
                    <div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" id="usuario" class="form-control">
					</div><br/> 
                    <h4>Contraseña: </h4>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" id="contrasena" class="form-control">
					</div><br/>
					<div class="input-group">
                        <input type="submit" class="btn btn-success"  value="Iniciar" >
					</div>            
					<div class="input-group">
						<button type="button" class="btn btn-danger" id="Iniciar">Iniciar Sesión 2</button>
					</div>
				</form>

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="mensaje">
				
				</div>
			</div>
          
          
    <!–-
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
            </div>
            <div class="panel-body">                
                <h4>Usuario: </h4>
                <input id="usuario" type="text" class="form-control" placeholder="Usuario"><br>
                <span id ="usuario" class="etiqueta-error"></span>

                <h4>Contraseña: </h4>
                <input id="password" type="password" class="form-control" placeholder="Password" required><br>
                <span id="contrasena" class="etiqueta-error"></span>
                <br><br>
                
                <div class="panel-footer">
                <button type="button" class="btn btn-default" id="Iniciar">Iniciar Sesión</button>
                <button class="btn btn-primary">Actualizar</button>
                <button type="button" class="btn btn-warning" id="button">Registrar</button>
                </div>
					<div class="input-group">
						<button type="button" class="btn btn-default" id="Iniciar">Login</button>
					</div>
            </div>
        </div>
    </div>
    -–>
       </main>';
		
	}
} ?>