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
{{--
@include('ipaperwork::admin.userpaperworks.partials.modal-update')
--}}

<div id="cap" style="display: none;">
    <div class="loading-del">
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span>
    </div>
</div>

    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    {{--
                    <a href="{{ route('admin.ipaperwork.paperwork.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('ipaperwork::paperworks.button.create paperwork') }}
                    </a>
                    --}}
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
                                <th>{{trans('ipaperwork::paperworks.singular')}}</th>
                                <th>Email</th>
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
                                    {{$userpaperwork->id}}
                                </td>
                                <td>
                                    {{$userpaperwork->paperwork->title}}
                                </td>
                                <td>
                                    {{$userpaperwork->user->email}}
                                </td>
                                <td>
                                    <span class="label {{ $userpaperwork->present()->statusLabelClass}}">
                                        {{ $userpaperwork->present()->status}}
                                    </span>
                                </td>
                                <td>
                                    {{ $userpaperwork->created_at }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        
                                        <a href="{{ route('admin.ipaperwork.userpaperwork.edit', [$userpaperwork->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                       
                                        {{--
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.ipaperwork.userpaperwork.destroy', [$userpaperwork->id]) }}"><i class="fa fa-trash"></i></button>
                                        --}}
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('ipaperwork::paperworks.singular')}}</th>
                                <th>Email</th>
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
    #cap{
    	background: rgba(255,71,0,0.13);
    	position: absolute;
    	width: 100%;
    	height: 100%;
    	z-index: 9999;
    	top: 0;
    	left: 0;
    }

    #cap .loading-del{
    	position: absolute;
    	top: 50%;
    	left: 50%;
    	transform: translate(-50%, -50%);
    }
</style>

@stop

@push('js-stack')

    <?php $locale = locale(); ?>
    <script type="text/javascript">

        var userPaperworkId = "";

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

        function editUserPaperwork(id){
            
            userPaperworkId = id
            var url = '{{ url('api/ipaperwork/v1/userpaperworks') }}' + '/' + userPaperworkId;
            
            $.ajax({
                url:url,
                type:'GET',
                headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"},
                dataType:"json",
                data:{'include':'user'},
                beforeSend: function(){ 
                    $("#cap").css("display","block");
                },
                success:function(result){
                   
                    if(result){
                        
                        $('#userFullNameModal').val(result.data.user.fullName);
                        $('#userEmailModal').val(result.data.user.email);
                        $('#commentModal').val(result.data.comment);
                        $('#statusModal').val(result.data.status);
                        $('#createdAtModal').val(result.data.createdAt);
                        $('#modal-update').modal();
                        
                    }else{
                        alert("{{trans('ipaperwork::common.messages.error')}}")
                        console.log('ERROR - GET USER PAPERWORK');
                    }
                    $("#cap").css("display","none");
                    
                },
                error:function(error){
                    $("#cap").css("display","none");
                    alert("{{trans('ipaperwork::common.messages.error')}}")
                    console.log(error);
                }
            });//ajax
            
        }

        function updateUserPaperwork(){

            var url = '{{ url('api/ipaperwork/v1/userpaperworks') }}' + '/' + userPaperworkId;

            var attUpdate = {};
            attUpdate["comment"] = $('#commentModal').val();
            attUpdate["status"] = $('#statusModal').val();

            $.ajax({
                url:url,
                type:'PUT',
                headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"},
                dataType:"json",
                data:{'attributes':attUpdate},
                beforeSend: function(){ 
                    $("#cap").css("display","block");
                },
                success:function(result){
                    if(result){
                        
                        cleanVars();
                        $('#modal-update').modal("hide");
                        location.reload();
                        
                    }else{
                        alert("{{trans('ipaperwork::common.messages.error')}}")
                        console.log('ERROR - PUT USER PAPERWORK');
                    }
                    $("#cap").css("display","none");
                },
                error:function(error){
                    $("#cap").css("display","none");
                    alert("{{trans('ipaperwork::common.messages.error')}}")
                    console.log(error);
                }
            });//ajax
            
        }

        function cancelUserPaperwork(){
           cleanVars();
        }

        function cleanVars(){
            $('#userFullNameModal').val("");
            $('#userEmailModal').val("");
            $('#commentModal').val("");
            $('#statusModal').val("");
            $('#createdAtModal').val("");
        }


    </script>
@endpush
