<div class="user-paperwork" id="userPaperworks">
  @include('ipaperwork.partials.modal-paperwork')

<div id="cap" v-if="loading">
    <div class="loading-del">
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span>
    </div>
</div>
  
  @php
      $options = array('users' =>[$currentUser->id]);
      $userpaperworks = ipaperworks_get_userpaperworks($options);
  @endphp
	<table id="table-cotizaciones" class="table table-striped">
	    <thead class="thead-dark">
	        <tr>
	            <th>ID</th>
              <th>{{trans('ipaperwork::paperworks.singular')}}</th>
              <th>Status</th>
              <th>{{ trans('core::core.table.created at') }}</th>
              <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
	        </tr>
	    </thead>
	    <tbody>
          @if(count($userpaperworks)>0)
            @foreach ($userpaperworks as $up)
              <tr>
                  <td>{{$up->id}}</td>
                  <td>{{$up->paperwork->title}}</td>
                  <td>{{$up->present()->status}}</td>
                  <td>{{$up->created_at}}</td>
                  <td>
                    <button @click = "getPaperwork({{$up->id}})"
                    title="Ver"
                    type="button" class="btn btn-sm bg-secondary btn-show">
                      <i class="fa fa-eye"></i>
                    </button>
                   
                  </td>
              </tr>
            @endforeach
          @endif
	    </tbody>
	</table>

</div>

<style>
  #table-cotizaciones .btn-show i{
    color:white;
  }
  #cap{
    	background: rgba(255,255,255,0.5);
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

{!! Theme::script('js/app.js?v='.config('app.version')) !!}

@section('scripts')
@parent

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


<script type="text/javascript">

	
$(document).ready(function() {
    $('#table-cotizaciones').DataTable({
      "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      },
      "order": [[ 0, "desc" ]]
    });

});

</script>

<script type="text/javascript">
const vue_profile_partial_user_paperwork = new Vue({
  el: '#userPaperworks',
  data: {
    userpaperwork:'',
    paperwork:'',
    histories:'',
    loading: false,
  },
  methods: {

    init(){
      console.warn("VUE READY")
    },

    getPaperwork(idUP){

      this.loading = true

      //let rut = "{{route(locale().'api.ipaperwork.userpaperworks.index')}}"
      let url = '{{ url('api/ipaperwork/v1/userpaperworks') }}' + '/' + idUP;

      let paramsBase = {
        include: 'paperwork,histories'
      }
      
      axios.get(url,{params: paramsBase}).then(response=> {

        this.userpaperwork = response.data.data
      
        if(this.userpaperwork.paperwork)
          this.paperwork = this.userpaperwork.paperwork
        if(this.userpaperwork.histories)
          this.histories = this.userpaperwork.histories

        this.loading = false

        $('#modal-paperwork').modal();

      }).catch(function (error) {
        console.log(error);
        alert("HA OCURRIDO UN ERROR")

        this.loading = false
      });

    },

    cleanVars(){
      this.userpaperwork = ''
      this.paperwork = ''
      this.histories = ''
    }

  },
  mounted: function () {
    this.$nextTick(function () {
      this.init()
    })
  }

});
</script>

@stop