@extends('layouts.master')

@section('meta')
    @include('ipaperwork::frontend.partials.paperwork.metas')
@stop

@section('title')
    {{trans('ipaperwork::common.quotation.title')}} | @parent
@stop

@section('content')

<div class="page ipaperwork ipaperwork-quotation">

    {{-- BANNER --}}
    <div class="page-banner position-relative">
        <h1 class="font-family-secondary font-weight-bold position-absolute text-white text-uppercase text-center al-center">
            {{trans('ipaperwork::common.quotation.title')}}
        </h1>
        <img class="img-fluid w-100" src="{{ Theme::url('img/banner-page.jpg') }}" alt="img-search">
    </div>

    <div class="content pt-5 pb-2">
    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-8 pt-2 offset-sm-2">

                <div class="content">

                   @include('ipaperwork::frontend.partials.form')

                </div>
               
            </div>

        </div>
    </div>
    </div>
</div>
  
      
@stop