@php
	$op = array('required' => 'required');
@endphp


<div class="col-xs-12">
    <div class="box box-primary">

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i>
            </button>
        </div>

        <br>

        <div class="box-body">
            {!! Form::normalInput('title',trans('ipaperwork::common.form.title'), $errors,null,$op) !!}
        </div>

        <br>


    </div>
</div>
