<div id="modal-update" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">
            <strong>{{ trans('core::core.button.update') }}</strong> <br>
            <span>
              {{ trans('ipaperwork::paperworks.singular') }}: {{$paperwork->title}}
            </span>
          </h3>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12 col-md-8">
                
                <div class="form-group ">
                    <label for="userFullNameModal">{{trans('ipaperwork::userpaperworks.form.user')}}</label>
                    <input type="text"  class="form-control" name="userFullNameModal" id="userFullNameModal"  value=""  readonly>
                </div>

                <div class="form-group ">
                    <label for="userEmailModal">Email</label>
                    <input type="text"  class="form-control" name="userEmailModal" id="userEmailModal"  value=""  readonly>
                </div>
                
                <div class="form-group ">
                    <label for="commentModal">{{trans('ipaperwork::userpaperworks.form.comment')}}</label>
                    <textarea rows="2" cols="10" name="commentModal" id="commentModal" class="form-control"></textarea>
                </div>
                
            </div>
            <div class="col-xs-12 col-md-4">

              <div class="form-group">
                <label for="statusModal">{{trans('iblog::common.status_text')}}</label>
                <select class="form-control" id="statusModal" name="statusModal">
                    @foreach ($statusUserPaperwork as $index => $ts)
                        <option value="{{$index}}">{{$ts}}</option>
                    @endforeach
                </select>
              </div>

            </div>
          </div>
        </div>
        <div class="modal-footer mx-auto">
          <button type="button" class="btn btn-success" onclick="updateUserPaperwork()" name="button">{{ trans('core::core.button.update') }}</button>
          <button type="button" class="btn btn-default" onclick="cancelUserPaperwork()" data-dismiss="modal">{{ trans('core::core.button.cancel') }}</button>
        </div>
      </div>
  
    </div>
</div>