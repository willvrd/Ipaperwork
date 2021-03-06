@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('ipaperwork::companies.title.create company') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.ipaperwork.company.index') }}">{{ trans('ipaperwork::companies.title.companies') }}</a></li>
        <li class="active">{{ trans('ipaperwork::companies.title.create company') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.ipaperwork.company.store'], 'method' => 'post']) !!}
    <div class="row">

        {{-- Fields Left and Translatables and Not translatables --}}
        <div class="col-xs-12 col-md-8">
            <div class="row">

                {{-- Fields No Translatables --}}
                @include('ipaperwork::admin.companies.partials.create-fields')

                {{-- BTN SUBMIT--}}
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                                    <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.ipaperwork.company.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                        </div>        
                    </div>
                </div>

            </div>
        </div> 
        
         {{-- Fields Right --}}
        <div class="col-xs-12 col-md-4">
            @include('ipaperwork::admin.companies.partials.create-fields-right') 
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
                    { key: 'b', route: "<?= route('admin.ipaperwork.company.index') ?>" }
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
