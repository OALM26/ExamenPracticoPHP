<!doctype html>
<html lang="en">
   <head>
      <title>Title</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body>
      <div class="container">
         <br>
         <br>
         <form action="{{ url('/Alumno-Update/'.$Matricula)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field()}}
            <div class="row align-items-center">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="Nombre" class="control-label">Nombre del Alumno</label>
                     <input type="text" value="{{$Alumno->Nombre}}" name='Nombre' 
                        class="form-control {{ $errors->has('Nombre') ? ' is-invalid' : '' }}" placeholder="Nombre">
                     @if ($errors->has('Nombre'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('Nombre') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="Grado_Escolar" class="control-label">Grado Escolar</label>
                     <br>
                     <select class="form-control selcls" name="Grado_Escolar" id="Grado_Escolar">
                     <option value="Default">{{$Alumno->GradoEscolar}}</option>
                        @foreach($GradosEscolar as $Grado_Escolar)
                        @if($Grado_Escolar->Descripcion != $Alumno->GradoEscolar)
                        <option value="{{$Grado_Escolar->Id}}">{{$Grado_Escolar->Descripcion}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="Genero_Alumno" class="control-label">Genero</label>
                     <br>
                     <select class="form-control selcls" name="Genero_Alumno" id="Genero_Alumno">
                        <option value="Default">{{$Alumno->Genero}}</option>
                        @foreach($Generos_Alumno as $Genero_Alumno)
                        @if($Genero_Alumno->Descripcion!=$Alumno->Genero)
                        <option value="{{$Genero_Alumno->Id}}">{{$Genero_Alumno->Descripcion}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="FNacimiento" class="control-label">Fecha de Nacimiento</label>&nbsp;&nbsp;&nbsp;
                     <input type="date" name="FNacimiento" id="FNacimiento" value="{{ Carbon\Carbon::parse($Alumno->FNacimiento)->format('Y-m-d') }}" 
                        class="{{ $errors->has('FNacimiento') ? ' is-invalid' : '' }}">
                     @if ($errors->has('FNacimiento'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('FNacimiento') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="Estatu_Alumno" class="control-label">Estatus de Alumno</label>
                     <br>
                     <select class="form-control selcls" name="Estatu_Alumno" id="Estatu_Alumno">
                     <option value="Default">{{$Alumno->Estatus_Alumno}}</option>
                        @foreach($Estatus_Alumno as $Estatu_Alumno)
                        @if($Estatu_Alumno->Descripcion != $Alumno->Estatus_Alumno)
                        <option value="{{$Estatu_Alumno->Id}}">{{$Estatu_Alumno->Descripcion}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
               <button type="submit" class="btn btn-danger btn-block">Guardar</button>
            </div>
         </form>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>