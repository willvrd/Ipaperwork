<div id="modal-paperwork" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header py-2">
        <h6 class="modal-title">
            ID: @{{this.userpaperwork.id}} - @{{this.paperwork.title}}<br>
            Status Actual: @{{this.userpaperwork.statusName}}
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        
        <h5>{{ trans('ipaperwork::userpaperworkhistories.single') }}:</h5>
        <div class="histories" v-if="histories.length>0">
          
          <div class="d-flex flex-column-reverse">
            <div class="card bg-light mb-3"  v-for="(history, index) in histories" :key="index">
              <div class="card-header text-uppercase font-weight-bold py-2">
                @{{history.statusName}}
                <span class="float-right font-weight-normal">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  @{{history.createdAt}}
                </span>
              </div>
              <div class="card-body py-2">
                <p class="card-text">@{{history.comment}}</p>
              </div>
            </div>
          </div>

        </div>
        <div v-else>
          <div class="alert alert-danger" role="alert">
            {{ trans('ipaperwork::common.messages.not infor') }}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button @click="cleanVars()" type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>