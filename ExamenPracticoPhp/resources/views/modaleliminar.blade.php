<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$Alumno->Matricula}}">
	<!-- La forma tendra los valores y variables declaradas en el foreach del index.blade.php-->
	<form action="{{url('/Alumno-Delete/'.$Alumno->Matricula)}}" method="GET" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>¿Desea eliminar al Estudiante?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger">Confirmar</button>
				</div>
			</div>
		</div>
	</form>
</div>