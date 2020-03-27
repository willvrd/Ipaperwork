@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('ipaperwork::userpaperworks.title.userpaperworks') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('ipaperwork::userpaperworks.title.userpaperworks') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="main-title">
                        {{ trans('ipaperwork::paperworks.singular') }}:
                        {{$paperwork->title}}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                        <a href="{{ route('admin.ipaperwork.paperwork.index') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                            <i class="fa fa-arrow-left"></i> Volver a {{ trans('ipaperwork::paperworks.title.paperworks') }}
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($userpaperworks)): ?>
                            <?php foreach ($userpaperworks as $userpaperwork): ?>
                            <tr>
                                <td>
                                    {{$userpaperworks->id}}
                                </td>
                                <td>
                                    {{$userpaperworks->status}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.ipaperwork.userpaperwork.edit', [$userpaperwork->id]) }}">
                                        {{ $userpaperwork->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.ipaperwork.userpaperwork.edit', [$userpaperwork->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.ipaperwork.userpaperwork.destroy', [$userpaperwork->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('ipaperwork::userpaperworks.title.create userpaperwork') }}</dd>
    </dl>
@stop

@section('styles')

<style type="text/css">
    .main-title{
        margin-top: 0px;
    }
</style>

@stop

@push('js-stack')

    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
