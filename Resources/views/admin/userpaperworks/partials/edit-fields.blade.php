<div class="col-xs-12">
    <div class="box box-primary">

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i>
            </button>
        </div>

        <br>

        <div class="box-body">

            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label text-right">Identificador(ID)</label>
                <div class="col-sm-8">
                    <input name="id" value="{{$userpaperwork->id}}" class="form-control" required="required" type="text" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="fullname" class="col-sm-3 col-form-label text-right">Nombres</label>
                <div class="col-sm-8">
                    <input name="fullname" value="{{$userpaperwork->user->present()->fullname}}" class="form-control" required="required" type="text" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="fullname" class="col-sm-3 col-form-label text-right">Email</label>
                <div class="col-sm-8">
                    <input name="fullname" value="{{$userpaperwork->user->email}}" class="form-control" required="required" type="text" readonly>
                </div>
            </div>

            @php
                $identification = $fields['user_type_id']."-".$fields['identification'];
            @endphp

            <div class="form-group row">
                <label for="identification" class="col-sm-3 col-form-label text-right">Nro Documento</label>
                <div class="col-sm-8">
                    <input name="identification" value="{{$identification}}" class="form-control" required="required" type="text" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="cellularPhone" class="col-sm-3 col-form-label text-right">Teléfono</label>
                <div class="col-sm-8">
                    <input name="cellularPhone" value="{{$fields['cellularPhone']}}" class="form-control" required="required" type="text" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="paperwork" class="col-sm-3 col-form-label text-right">{{trans('ipaperwork::paperworks.singular')}}</label>
                <div class="col-sm-8">
                    <input name="paperwork" value="{{$userpaperwork->paperwork->title}}" class="form-control" placeholder="paperwork" required="required" type="text" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="company" class="col-sm-3 col-form-label text-right">Entidad </label>
                <div class="col-sm-8">
                    <input name="paperwork" value="{{$userpaperwork->company->title}}" class="form-control" placeholder="paperwork" required="required" type="text" readonly>
                   {{--
                  <select name="company_id" class="form-control" required readonly>
                    <option value=""> - Seleccione</option>
                    @foreach($userpaperwork->paperwork->companies as $company)
                        <option value="{{$company->id}}" @if($company->id==$userpaperwork->company_id) selected @endif>{{$company->title}}</option>
                    @endforeach
                  </select>
                  --}}
                </div>
            </div>

            <div class="form-group row">
                <label for="comment" class="col-sm-3 col-form-label text-right">Comentario</label>
                <div class="col-sm-8">
                <textarea class="form-control" rows="2" readonly required="required" name="comment" cols="50">{{$userpaperwork->comment}}</textarea>
                </div>
            </div>

        </div>

    </div>
</div>