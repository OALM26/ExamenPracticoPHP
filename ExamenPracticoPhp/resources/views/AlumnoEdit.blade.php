@extends('Layout')

@section('content')
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
                     <option value="{{$Alumno->GradoEscolarID}}">{{$Alumno->GradoEscolar}}</option>
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
                        <option value="{{$Alumno->SexoID}}">{{$Alumno->Genero}}</option>
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
                     <option value="{{$Alumno->EstatusID}}">{{$Alumno->Estatus_Alumno}}</option>
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
@endsection