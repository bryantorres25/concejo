@if($crear)
@php
				$idpersona = auth()->user()->persona_id;
					 $persona = DB::table('personas as p')
					->join('usuarios as u', 'p.id', '=', 'u.persona_id')
					->join('partidos as par', 'p.partido_id', '=', 'par.id')
					->select('p.nombres','p.apellidos','par.nombre')
					->where('u.persona_id', '=', $idpersona)->get();

                @endphp
                @foreach($persona as $per)
                <div class="form-group">
                    <label>Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required value="{{$per->nombres.' '.$per->apellidos}}"/>
                </div>





<div class="form-group">
    <label>Bancada</label>
    <input type="text" name="bancada" id="bancada" cols="1" rows="2" class="form-control" value="{{$per->nombre}}">
    </input>
</div>
@endforeach
<div class="form-group">
    <label>Archivo</label>
   <input type="file" name="ruta" id="ruta" class="form-control">
    </textarea>
</div>
<div class="form-group">
                    <label>Descripcion</label>
                    <textarea name="descripcion" id="descripcion" cols="1" rows="2" class="form-control">
                    </textarea>
                </div>


<input type="hidden" name="estado" value="1">


@endif

@if($editar)

<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required />
</div>


<div class="form-group">
    <label>Bancada</label>
    <textarea name="bancada" id="bancada_e" cols="1" rows="2" class="form-control">
    </textarea>
</div>


<div class="form-group">
    <label>Archivo</label>
   <input type="file" name="ruta" id="ruta_" class="form-control">
    </textarea>
</div>

<div class="form-group">
                    <label>Descripcion</label>
                    <textarea name="descripcion" id="descripcion_e" cols="1" rows="2" class="form-control">
                    </textarea>
                </div>
<input type="hidden" name="estado" value="1">

@endif
