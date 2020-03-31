{{-- Paperworks--}}
<div class="col-xs-12 ">
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
            </div>
            {{--
            <div class="form-group">
                <label>{{trans('ipaperwork::paperworks.plural')}}</label>
            </div>
            --}}
        </div>
    <div class="box-body">
        @include('ipaperwork::admin.fields.checklist.paperworks')
    </div>
    </div>
</div>