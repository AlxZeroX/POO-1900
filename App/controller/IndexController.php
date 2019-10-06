<?php
class IndexController
{
  public function index()
  {

    echo
      '<nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active"  href="?c=Index&a=index">Inicio</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=Mascota&a=list">Mascota <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Persona&a=list">Personas (Registro) <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?c=Curso&a=list">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?c=Instructor&a=list">Instructores</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?c=Calificaciones&a=list">Calificaciones</a>
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

                      <a href="?c=Persona&a=addform" class="btn btn-dark" role="button">INGRESAR</a>

                      <center><img src="image/Mantenimiento.jpg" alt="Momazo"></center><br><br>
                  </div>
              </div>
          </section>
            </div>
          </section>

        </main>';
  }
}
