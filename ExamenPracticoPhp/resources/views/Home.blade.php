@extends('Layout')
@section('content')
<form action="{{ url('/Alumnos')}}" method="POST" enctype="multipart/form-data">
   {{ csrf_field()}}
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-9 col-lg-12">
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-9 col-lg-6">
                  <label for="Grado_Escolar" class="control-label">Seleccione un Grado Escolar:</label>
                  <br>
                  <select class="form-control selcls" name="Grado_Escolar" id="Grado_Escolar">
                     <option value="Default">Seleccionar</option>
                     @foreach($GradosEscolar as $Grado_Escolar)
                     <option value="{{$Grado_Escolar->Id}}">{{$Grado_Escolar->Descripcion}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            @if ($errors->has('Grado_Escolar'))
                     <div class="text-danger">
                        <a>{{ $errors->first('Grado_Escolar') }}</a>
                     </div>
                     @endif
            <br>
            <br>
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-9 col-lg-6">
                  <div class="form-group">
                    <label for="Grado_Escolar" class="control-label">¿Cual Listado de Alumnos desea obtener?</label>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-6">
                            <label class="radio-inline">
                            <input type="radio" name="tipo" value="activos">Alumnos Activos</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-6">
                        <label class="radio-inline">
                        <input type="radio" name="tipo" value="ambos">Alumnos Activos e Inactivos</label>
                        </div>
                        @if ($errors->has('tipo'))
                     <div class="text-danger">
                        <a>{{ $errors->first('tipo') }}</a>
                     </div>
                     @endif
                    </div>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                  <br>
                  <button type="submit" class="btn btn-danger btn-block">Buscar</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>

      <!-- Optional JavaScript -->
      <script>
    var exist = '{{Session::has('alert_alumno')}}';
    if(exist){
        alert('{{Session::get('alert_alumno')}}');
    }
    
  </script>
@endsection