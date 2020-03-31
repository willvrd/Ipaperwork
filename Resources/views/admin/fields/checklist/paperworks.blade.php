<div class="row checkbox">

    <div class="col-xs-12">
        <div class="content-cat" style="max-height:490px;overflow-y: auto;">

            <label for="paperworks"><strong>{{trans('ipaperwork::paperworks.plural')}}</strong></label>

            @if(count($paperworks)>0)
                @php
                    if(isset($company->paperworks) && count($company->paperworks)>0){
                    $oldCat = array();
                        foreach ($company->paperworks as $cat){
                            array_push($oldCat,$cat->id);
                        }

                    }else{
                        $oldCat=old('paperworks');
                    }
                @endphp
                <ul class="checkbox" style="list-style: none;padding-left: 5px;">
                    @foreach ($paperworks as $paperwork)
                        
                        <li  style="padding-top: 5px">
                            <label>
                                <input type="checkbox" class="flat-blue jsInherit" name="paperworks[]"
                                           value="{{$paperwork->id}}"
                                           @isset($oldCat) @if(in_array($paperwork->id, $oldCat)) checked="checked" @endif @endisset> {{$paperwork->title}}
                            </label>
                        </li>
                       
                    @endforeach
                </ul>
            @endif

        </div>
    </div>

</div>