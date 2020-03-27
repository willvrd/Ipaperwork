@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('ipaperwork::paperworks.title.paperworks') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('ipaperwork::paperworks.title.paperworks') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.ipaperwork.paperwork.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('ipaperwork::paperworks.button.create paperwork') }}
                    </a>
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
                                <th>{{ trans('ipaperwork::common.table.title') }}</th>
                                <th>{{ trans('ipaperwork::common.table.slug') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($paperworks)): ?>
                            <?php foreach ($paperworks as $paperwork): ?>
                            <tr>
                                <td>
                                    {{ $paperwork->id }}
                                </td>
                                <td>
                                    {{ $paperwork->title }}
                                </td>
                                <td>
                                    {{ $paperwork->slug }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.ipaperwork.paperwork.edit', [$paperwork->id]) }}">
                                        {{ $paperwork->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.ipaperwork.paperwork.edit', [$paperwork->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>

                                        <a href="{{ route('admin.ipaperwork.userpaperwork.index', [$paperwork->id]) }}" class="btn btn-default btn-flat btn-success" title="{{trans('ipaperwork::userpaperworks.title.userpaperworks')}}"><i class="fa fa-users fa-inverse"></i></a>

                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.ipaperwork.paperwork.destroy', [$paperwork->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>{{ trans('ipaperwork::common.table.title') }}</th>
                                <th>{{ trans('ipaperwork::common.table.slug') }}</th>
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
        <dd>{{ trans('ipaperwork::paperworks.title.create paperwork') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.ipaperwork.paperwork.create') ?>" }
                ]
            });
        });
    </script>
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
