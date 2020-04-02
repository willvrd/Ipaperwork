<div id="history" >
    <div class="box box-primary">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i>
            </button>
        </div>
        <div class="box-header">
            <h3>{{ trans('ipaperwork::userpaperworkhistories.single') }}</h3>
        </div>
        <div class="box-body">

            <table class="data-table table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{trans('ipaperwork::userpaperworkhistories.table.date')}}</th>
                        <th>{{trans('ipaperwork::userpaperworkhistories.table.comment')}}</th>
                        <th>{{trans('ipaperwork::userpaperworkhistories.table.status')}}</th>
                    </tr>   
                </thead>
                <tbody>
                <?php if (isset($userpaperwork)): ?>
                <?php foreach ($userpaperwork->histories as $history): ?>
               
                    <tr>
                        <td>{{$history->created_at}}</td>
                        <td>{{$history->comment}}</td>
                        <td>{{$history->present()->status}}</td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>{{trans('ipaperwork::userpaperworkhistories.table.date')}}</th>
                        <th>{{trans('ipaperwork::userpaperworkhistories.table.comment')}}</th>
                        <th>{{trans('ipaperwork::userpaperworkhistories.table.status')}}</th>
                    </tr>
                </tfoot>
            </table>

        </div>    
    </div>   

</div>

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