@php
	$op = array('required' => 'required');

@endphp

<div class="row">

    <div class="col-xs-12">
        <div class="box box-primary">

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>

            <br>
            
            <div class="box-body ">

                {{-- Status --}}
                <div class='form-group row'>
                    <label for="company" class="col-sm-3 col-form-label text-right">Status </label>
                    <div class="col-sm-8">
                        <input name="status" value="{{$userpaperwork->present()->status}}" readonly class="form-control" type="text">
                        {{--
                        <select name="company_id" class="form-control" required readonly>
                            <option value=""> - Seleccione</option>
                            @foreach($statusUserPaperwork as $index=>$item)
                                <option value="{{$index}}" {{old('status',0) == $index ? 'selected' : '' }}>{{$item}}</option>
                            @endforeach
                        </select>
                        --}}
                    </div>
                </div>

                {{-- Created At --}}
                <div class="form-group row">
                    <label for="ciudad" class="col-sm-3 col-form-label text-right">Fecha</label>
                    <div class="col-sm-8">
                        <input name="city" value="{{$userpaperwork->created_at}}" readonly class="form-control" placeholder="Ciudad" required="required" type="text">
                    </div>
                </div>


            </div>
        </div>
    </div>

    
   

</div>

@push('js-stack')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'b', route: "<?= route('admin.iblog.post.index') ?>"}
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"], input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'

            });

            $('.btn-box-tool').click(function (e) {
                e.preventDefault();
            });
        });
    </script>
    <style>

        .nav-tabs-custom > .nav-tabs > li.active {
            border-top-color: white !important;
            border-bottom-color: #3c8dbc !important;
        }

        .nav-tabs-custom > .nav-tabs > li.active > a, .nav-tabs-custom > .nav-tabs > li.active:hover > a {
            border-left: 1px solid #e6e6fd !important;
            border-right: 1px solid #e6e6fd !important;

        }

        .input-asgard .box-body .form-group  label{
            display: none;
        }


    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                var bindDatePicker = function () {
                    $(".date").datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss',
                        //defaultDate: $(this).val(),
                        icons: {
                            time: "fa fa-clock-o",
                            date: "fa fa-calendar",
                            up: "fa fa-arrow-up",
                            down: "fa fa-arrow-down"
                        }
                    }).find('input:first').on("blur", function () {
                        // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
                        // update the format if it's yyyy-mm-dd
                        var date = parseDate($(this).val());

                        if (!isValidDate(date)) {
                            //create date based on momentjs (we have that)
                            date = moment().format('YYYY-MM-DD');
                        }

                        $(this).val(date);
                    }).datepicker('update', new Date());
                }

                var isValidDate = function (value, format) {
                    format = format || false;
                    // lets parse the date to the best of our knowledge
                    if (format) {
                        value = parseDate(value);
                    }

                    var timestamp = Date.parse(value);

                    return isNaN(timestamp) == false;
                }

                var parseDate = function (value) {
                    var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
                    if (m)
                        value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

                    return value;
                }

                bindDatePicker();
            });
        });
    </script>
@endpush