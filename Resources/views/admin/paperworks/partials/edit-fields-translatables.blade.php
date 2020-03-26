@php
	$op = array('required' => 'required');
@endphp

<div class="box-body">

	<div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('ipaperwork::common.form.title')) !!}
        <?php $old = $paperwork->hasTranslation($lang) ? $paperwork->translate($lang)->title : '' ?>
        {!! Form::text("{$lang}[title]", old("{$lang}.title", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('ipaperwork::categories.form.title')]) !!}
        {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
    </div>
    
    <div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[slug]", trans('ipaperwork::common.form.slug')) !!}
        <?php $old = $paperwork->hasTranslation($lang) ? $paperwork->translate($lang)->slug : '' ?>
        {!! Form::text("{$lang}[slug]", old("{$lang}.slug",$old), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('ipaperwork::common.form.slug')]) !!}
        {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
    </div>

	{!! Form::i18nTextarea('summary', trans('ipaperwork::common.form.summary'),$errors,$lang,$paperwork,array('class'=>'form-control','rows'=>2)) !!} 

	{!! Form::i18nTextarea('description', trans('ipaperwork::common.form.description'),$errors,$lang,$paperwork) !!} 

    <div class="col-xs-12" style="padding-top: 35px;">
        <div class="panel box box-primary">
            <div class="box-header">
                <div class="box-tools pull-right">
                    <a href="#aditional{{$lang}}" class="btn btn-box-tool" data-target="#aditional{{$lang}}"
                       data-toggle="collapse"><i class="fa fa-minus"></i>
                    </a>
                </div>
                <label>{{ trans('ipaperwork::common.form.metadata')}}</label>
            </div>
            <div class="panel-collapse collapse" id="aditional{{$lang}}">
                <div class="box-body ">
                    <div class='form-group{{ $errors->has("{$lang}.meta_title") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[meta_title]", trans('ipaperwork::common.form.meta_title')) !!}
                        <?php $old = $paperwork->hasTranslation($lang) ? $paperwork->translate($lang)->meta_title : '' ?>
                        {!! Form::text("{$lang}[meta_title]", old("{$lang}.meta_title", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('ipaperwork::common.form.meta_title')]) !!}
                        {!! $errors->first("{$lang}.meta_title", '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class='form-group{{ $errors->has("{$lang}.meta_keywords") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[meta_keywords]", trans('ipaperwork::common.form.meta_keywords')) !!}
                        <?php $old = $paperwork->hasTranslation($lang) ? $paperwork->translate($lang)->meta_keywords : '' ?>
                        {!! Form::text("{$lang}[meta_keywords]", old("{$lang}.meta_keywords", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('ipaperwork::common.form.meta_keywords')]) !!}
                        {!! $errors->first("{$lang}.meta_keywords", '<span class="help-block">:message</span>') !!}
                    </div>

                    <?php $old = $paperwork->hasTranslation($lang) ? $paperwork->translate($lang)->meta_description : '' ?>
                    @editor('content', trans('ipaperwork::common.form.meta_description'), old("$lang.meta_description",$old), $lang)
                </div>
            </div>
        </div>
    </div>


</div>