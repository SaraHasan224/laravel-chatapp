    <div class="tab-content">
        <div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
            <div class="position-relative row form-group">
                {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-7">
                    {{Form::text("name",Auth::user()->name,
                    ["class" => "form-control", "id" => "name", "maxlength" => "255", "value" => Auth::user()->name])}}
                </div>
            </div>
            <div class="position-relative row form-group">
                {{ Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-7">
                    {{Form::email("email",Auth::user()->email,
                    ["class" => "form-control", "id" => "email", "maxlength" => "255", "value" => Auth::user()->email])}}
                </div>
            </div>

            <div class="position-relative row form-group">
                {{ Form::label('image', 'Image', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{Form::file("image",old("image"),["class" => "form-control-file", "id" => "image",])}}
                    @if(!empty(Auth::user()->image))
                        <img src="{{ getImagePath('uploads/users/',Auth::user()->image,'users') }}" style="width:50px"/>
                    @endif
                </div>
            </div>
            <div class="position-relative row form-group">
                {{ Form::label('phone', 'Phone', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{Form::hidden("phone_code",old("phone_code") ? old("phone_code") : (!empty(Auth::user()) ? Auth::user()->phone_code : NULL),
               ["class" => "form-control", "id" => "phone_code", "maxlength" => "6", "placeholder" => "Enter Phone Code",])}}

                    {{Form::text("phone",old("phone") ? old("phone") : (!empty(Auth::user()->phone) ? Auth::user()->phone : NULL),
                    ["class" => "form-control input-mask-trigger selectpicker countrypicker". ( $errors->has('phone_no2') ? ' is-invalid' : '' ),
                    "id" => "phone", "placeholder" => "Enter Phone Number",])}}

                    {{Form::hidden("phone_no",old("phone_no") ? old("phone_no") : (!empty(Auth::user()->phone) ? Auth::user()->phone : NULL),
                    ["class" => "form-control",
                    "id" => "phone_no", "placeholder" => "Enter Phone Number",])}}
                    @if($errors->has('phone_no'))
                        <em id="lastname-error" class="error invalid-feedback">Please enter additional phone number</em>
                    @endif
                </div>
            </div>

            <div class="position-relative row form-group">
                {{ Form::label('national_id', 'National Id', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{Form::text("national_id",old("national_id") ? old("national_id") : (!empty(Auth::user()->national_id) ? Auth::user()->national_id : NULL),
                    ["class" => "form-control", "id" => "national_id", "maxlength" => "255", "placeholder" => "Enter National Id",])}}
                </div>
            </div>
            <div class="position-relative row form-group">
                {{ Form::label('dob', 'Date of Birth', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{Form::text("dob",old("dob") ? old("dob") : (!empty(Auth::user()->dob) ? Carbon\Carbon::parse(Auth::user()->dob)->format('m/d/Y') : NULL),
                    ["class" => "form-control", "id" => "dob", "data-toggle" => "datepicker", "placeholder" => "Enter Date of Birth",])}}
                </div>
            </div>
            <div class="position-relative row form-group required">
                {{ Form::label('status', 'Status', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{Form::select("status",$status, old('status',Auth::user()->status),
                         [
                            "class" => "form-control". ( $errors->has('status') ? ' is-invalid' : '' ),
                            "id" => "status",
                            "placeholder" => "Select Status",
                         ])
                    }}
                    @if($errors->has('status'))
                        <em id="lastname-error" class="error invalid-feedback">Status field is required</em>
                    @endif
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab-eg5-1" role="tabpanel">
            @include('admin.includes.address')
        </div>
    </div>