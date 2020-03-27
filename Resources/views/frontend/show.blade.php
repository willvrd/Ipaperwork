@extends('layouts.master')

@section('meta')
    @include('ipaperwork::frontend.partials.paperwork.metas')
@stop

@section('title')
    {{ $paperwork->title }} | @parent
@stop

@section('content')

<div class="page ipaperwork ipaperwork-single">

    <div class="content pt-5 pb-2">
    <div class="container">

        <div class="row">

            <div class="col-12 column1">

                <div class="content">

                    <div class="title-center mb-5">
                        <div class="title-1">
                            <h2 class="sup font-weight-bold">{{$paperwork->title}}</h2>
                        </div>
                    </div>

                    <div class="paperwork-description text-gray-5">
                        <img class="image img-responsive float-md-right px-4 py-2" src="{{url($paperwork->mainimage->path)}}"
                                             alt="{{$paperwork->title}}"/>
                        {!! $paperwork->description !!}
                    </div>

                </div>
               
            </div>

        </div>
    </div>
    </div>
</div>
  
      
@stop

@section('scripts')
    @parent
    @include('ipaperwork::frontend.partials.paperwork.script')
@stop