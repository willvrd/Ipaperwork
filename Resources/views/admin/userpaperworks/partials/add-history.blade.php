<div id="history-add">
    <div class="box box-primary">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i>
            </button>
        </div>
        <div class="box-header">
            <h3>{{ trans('ipaperwork::userpaperworkhistories.title.add') }}</h3>
        </div>
        {!! Form::open(['route' => ['admin.ipaperwork.userpaperworkhistory.store'], 'method' => 'post']) !!}
        <div class="box-body">
            {{-- STATUS --}}
            <div class="form-group">
                <label for="status">{{trans('ipaperwork::userpaperworkhistories.table.status')}}</label>
                <select class="form-control" id="newstatus" name="status">
                     @foreach ($statusUserPaperwork as $index => $ts)
                            <option value="{{$index}}" @if($index==$userpaperwork->status) selected @endif >{{$ts}}</option>
                    @endforeach
                </select>
            </div>
            {{-- COMMENT --}}
            <div class="form-group">
                <label for="comment">{{trans('ipaperwork::userpaperworkhistories.table.comment')}}</label>
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>

            <input type="hidden" name="user_paperwork_id" value="{{$userpaperwork->id}}">
            
            {{-- BTN --}}
            <button id="addhistory" type="submit" class="btn btn-primary pull-right" data-loading-text="Loading...">{{trans('ipaperwork::userpaperworkhistories.button.change')}}</button>   
        </div> 
        {!! Form::close() !!}   
    </div>   

</div>

@push('js-stack')

    
@endpush