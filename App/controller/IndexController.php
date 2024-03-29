<?php
class IndexController{
  public function index(){

    echo
      '<nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active"  href="?c=Index&a=index">Inicio</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=Prueba&a=list">Prueba<span class="sr-only">(current)</span></a>
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
          <h1>Inicio</h1>
          <section class="row text-center placeholders" >
            <div class="col-12 placeholder">
            <h1>Bienvenidos</h1>
              <h4>SOMOS LA EMPRESA APRENDAMOS</h4>
              <span class="text-muted">Contamos con una gran variedad de cursos</span>
              <div class="bg-details">
                  <div class="details"> 

                      <a href="?c=Persona&a=addform" class="btn btn-primary" role="button">REGISTRAR</a>
                      <a href="?c=Login&a=index" class="btn btn-dark" role="button">INGRESAR</a>
                  </div>
              </div>
          </section>
            </div>
          </section>

        </main>';
		
	}
} ?>
