{!!Form::open(array(
    'url' => route('ipaperwork.quotation.create'), 
    'method' => 'POST', 
    'enctype' => 'multipart/form-data',
    'id' => 'form-quotation',
    'class' => 'form-horizontal'))!!}


    <div class="form-group row">
        <label for="fullname" class="col-sm-4 col-form-label text-right">Nombres</label>
        <div class="col-sm-8">
            <input name="fullname" value="{{$user->present()->fullname}}" class="form-control" required="required" type="text" readonly>
        </div>
    </div>

    @php
        $identification = $fields['user_type_id']."-".$fields['identification'];
    @endphp

    <div class="form-group row">
        <label for="identification" class="col-sm-4 col-form-label text-right">Nro Documento</label>
        <div class="col-sm-8">
            <input name="identification" value="{{$identification}}" class="form-control" required="required" type="text" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="cellularPhone" class="col-sm-4 col-form-label text-right">Teléfono</label>
        <div class="col-sm-8">
            <input name="cellularPhone" value="{{$fields['cellularPhone']}}" class="form-control" required="required" type="text" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="paperwork" class="col-sm-4 col-form-label text-right">Tipo de Trámite</label>
        <div class="col-sm-8">
            <input name="paperwork" value="{{$paperwork->title}}" class="form-control" placeholder="paperwork" required="required" type="text" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="company" class="col-sm-4 col-form-label text-right">Entidad </label>
        <div class="col-sm-8">
          <select name="company_id" class="form-control" required>
            <option value=""> - Seleccione</option>
            @foreach($paperwork->companies as $company)
                <option value="{{$company->id}}">{{$company->title}}</option>
            @endforeach
          </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="ciudad" class="col-sm-4 col-form-label text-right">Ciudad</label>
        <div class="col-sm-8">
            <input name="city" class="form-control" placeholder="Ciudad" required="required" type="text">
        </div>
    </div>

    <div class="form-group row">
        <label for="comment" class="col-sm-4 col-form-label text-right">Comentario</label>
        <div class="col-sm-8">
            <textarea class="form-control" rows="2" placeholder="Comentario" required="required" name="comment" cols="50"></textarea>
        </div>
     </div>

    <input name="paperwork_id" value="{{$paperwork->id}}" type="hidden">

    {{-- FILE --}}
    <div class="form-group row">
        <label for="pfile" class="col-sm-4 col-form-label text-right">
           {{trans('ipaperwork::common.form.file')}} 
        </label>
        <div class="col-sm-8">
            <input type="file" class="form-control-file" id="pfile" name="pfile" aria-describedby="fileHelp">
            @php
                $maxsize = config('asgard.ipaperwork.config.files.maxsize.value');
                $maxsizeText = config('asgard.ipaperwork.config.files.maxsize.text');
            @endphp
            <input type="hidden" name="MAX_FILE_SIZE" value="{{$maxsize}}">
            <small id="fileHelp" class="form-text text-muted">
                {{trans('ipaperwork::common.file.formats')}}:
                @if(config('asgard.ipaperwork.config.files.formats'))
                    @foreach (config('asgard.ipaperwork.config.files.formats') as $format)
                        {{$format}} -
                    @endforeach
                @endif
                {{trans('ipaperwork::common.file.size max')}}: {{$maxsizeText}}
            </small>
        </div>
    </div>

    <div class="row justify-content-end">
        <button type="submit" class="btn btn-primary btn-send text-uppercase font-weight-bold">Enviar</button>
    </div>

{!!Form::close()!!}