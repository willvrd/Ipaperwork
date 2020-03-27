@extends('layouts.master')

@section('title')
    {{ trans('ipaperwork::paperworks.title.paperworks') }} | @parent
@stop
@section('content')

<div class="page ipaperwork ipaperwork-index  ">

    
    <div class="container">
        <div class="content pt-5 pb-2 text-gray-5">

            <div class="row paperworks">
            @if (count($paperworks))
                @foreach($paperworks as $paperwork)
                    <div class="col-md-6 col-lg-4">

                    <a href="{{$paperwork->url}}" class="d-block position-relative">
                        <div class="paperwork mb-5 bg-white">

                            <div class="paperwork-img position-relative">

                                <img class="img-responsive" src="{{$paperwork->mainimage->path}}" alt="image-{{$paperwork->slug}}">

                                <h3 class="font-weight-bold">{{$paperwork->title}}</h3>
                               
                            </div>

                
                            <div class="summary text-gray-5 px-2 pb-4">
                                {{$paperwork->summary}}
                            </div>

                            <div class="btn btn-primary">
                                más informacion
                                <i class="fa fa-long-arrow-right " aria-hidden="true"></i>
                            </div>
                        </div>
                    </a>
                    </div>   
                 @endforeach

                 <!-- Pagination -->
                <div class="pagination justify-content-center mb-4 pagination paginacion-blog row">
                    <div class="pull-right">
                        {{$paperworks->links('pagination::bootstrap-4')}}
                    </div>
                </div>

             @else

                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                      No existen tramites disponibles
                    </div>     
                </div>

            @endif
            </div>

        </div>
    </div>

</div>
 
@stop
