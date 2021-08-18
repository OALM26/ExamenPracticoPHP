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
         <form action="{{ url('/Alumno-Save/')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field()}}
            <div class="row align-items-center">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="Nombre" class="control-label">Nombre del Alumno</label>
                     <input type="text" name='Nombre' 
                        class="form-control {{ $errors->has('Nombre') ? ' is-invalid' : '' }}" placeholder="Nombre" value="{{ old('Nombre') }}" required>
                     @if ($errors->has('Nombre'))
                     <div class="text-danger">
                     <a>{{ $errors->first('Nombre') }}</a>
                     </div>
                     @endif
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="Grado_Escolar" class="control-label">Grado Escolar</label>
                     <br>
                     <select class="form-control selcls" name="Grado_Escolar" id="Grado_Escolar" required>
                        <option value="Default">Seleccionar</option>
                        @foreach($GradosEscolar as $Grado_Escolar)
                        <option value="{{$Grado_Escolar->Id}}">{{$Grado_Escolar->Descripcion}}</option>
                        @endforeach
                     </select>
                     @if ($errors->has('Grado_Escolar'))
                     <div class="text-danger">
                        <a>{{ $errors->first('Grado_Escolar') }}</a>
                     </div>
                     @endif
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="Genero_Alumno" class="control-label">Genero</label>
                     <br>
                     <select class="form-control selcls" name="Genero_Alumno" id="Genero_Alumno" required>
                        <option value="Default">Seleccionar</option>
                        @foreach($Generos_Alumno as $Genero_Alumno)
                        <option value="{{$Genero_Alumno->Id}}">{{$Genero_Alumno->Descripcion}}</option>
                        @endforeach
                     </select>
                     @if ($errors->has('Genero_Alumno'))
                     <div class="text-danger">
                        <a>{{ $errors->first('Genero_Alumno') }}</a>
                     </div>
                     @endif
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="FNacimiento" class="control-label">Fecha de Nacimiento</label>&nbsp;&nbsp;&nbsp;
                     <input type="date" name="FNacimiento" id="FNacimiento" value="{{ Carbon\Carbon::parse(new DateTime(date('d-m-y')))->format('Y-m-d') }}" 
                        class="{{ $errors->has('FNacimiento') ? ' is-invalid' : '' }}" required>
                     @if ($errors->has('FNacimiento'))
                     <div class="text-danger">
                        <a>{{ $errors->first('FNacimiento') }}</a>
                     </div>
                     @endif
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                     <label for="Estatu_Alumno" class="control-label">Estatus de Alumno</label>
                     <br>
                     <select class="form-control selcls" name="Estatu_Alumno" id="Estatu_Alumno" required>
                        <option value="Default">Seleccionar</option>
                        @foreach($Estatus_Alumno as $Estatu_Alumno)
                        <option value="{{$Estatu_Alumno->Id}}">{{$Estatu_Alumno->Descripcion}}</option>
                        @endforeach
                     </select>
                     @if ($errors->has('Estatu_Alumno'))
                     <div class="text-danger">
                        <a>{{ $errors->first('Estatu_Alumno') }}</a>
                     </div>
                     @endif
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