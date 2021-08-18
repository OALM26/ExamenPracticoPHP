<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Title</title>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
   </head>
   <body>
      <br>
<br>
      <div class="container">
         <div class="row">
            <div class="col-sm-5 col-md-10 col-lg-12">
               <a href="{{url('/Alumno-Create')}}" class="btn btn-danger">
               <i class="fa fa-plus"></i>
               Añadir nuevo Alumno
               </a>
            </div>
         </div>
         <br>
         <div class="row align-items-center">
            <div class="table table-secondary table-hover table-striped table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Genero</th>
                        <th>Grado Escolar</th>
                        <th>Estatus</th>
                        <th></th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($Alumnos as $Alumno)
                     <tr>
                        <th>{{$Alumno->Matricula}}</th>
                        <td>{{$Alumno->Nombre}}</td>
                        <td>{{Carbon\Carbon::parse($Alumno->FNacimiento)->format('d-m-Y')}}</td>
                        <td>{{$Alumno->Genero}}</td>
                        <td>{{$Alumno->GradoEscolar}}</td>
                        <td>{{$Alumno->Estatus_Alumno}}</td>
                        <td>
                           <a href="{{url('/Alumno-Edit/'.$Alumno->Matricula)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                        </td>
                        <td>
                           <a href="" data-target="#modal-delete-{{$Alumno->Matricula}}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i>   Eliminar</a>
                        </td>
                     </tr>
                     @include('modaleliminar')
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <!-- Optional JavaScript -->
      <script>
    var exist = '{{Session::has('alert_alumno')}}';
    if(exist){
        alert('Alumno Actualizado Correctamente');
    }
    
  </script>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   </body>
</html>