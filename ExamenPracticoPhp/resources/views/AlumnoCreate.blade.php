@extends('Layout')

@section('content')
      <div class="container">
         <br>
         <br>
         <form action="{{ url('/Alumno-Save')}}" method="POST" enctype="multipart/form-data">
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
@endsection