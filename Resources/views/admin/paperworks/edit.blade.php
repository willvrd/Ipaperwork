@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('ipaperwork::paperworks.title.edit paperwork') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.ipaperwork.paperwork.index') }}">{{ trans('ipaperwork::paperworks.title.paperworks') }}</a></li>
        <li class="active">{{ trans('ipaperwork::paperworks.title.edit paperwork') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.ipaperwork.paperwork.update', $paperwork->id], 'method' => 'put']) !!}
    <div class="row">

        {{-- Fields Left and Translatables and Not translatables --}}
        <div class="col-xs-12 col-md-9">
            <div class="row">

                {{-- BASE FIELDS TRANSLATABLES LEFT --}}
                <div class="col-xs-12">
                    <div class="box box-primary">

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>

                        <div class="nav-tabs-custom">
                            @include('partials.form-tab-headers')
                            <div class="tab-content">
                                <?php $i = 0; ?>
                                @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                    <?php $i++; ?>
                                    <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                        @include('ipaperwork::admin.paperworks.partials.edit-fields-translatables', ['lang' => $locale])
                                    </div>
                                @endforeach

                            </div>
                           
                        </div>

                    </div>

                </div> 

                {{-- Fields No Translatables --}}
                @include('ipaperwork::admin.paperworks.partials.edit-fields')

                {{-- BTN SUBMIT--}}
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                            <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.ipaperwork.paperwork.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                        </div>    
                    </div>
                </div>

            </div>
        </div>

        {{-- Fields Right --}}
        <div class="col-xs-12 col-md-3">
            @include('ipaperwork::admin.paperworks.partials.edit-fields-right') 
        </div>


    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.ipaperwork.paperwork.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
