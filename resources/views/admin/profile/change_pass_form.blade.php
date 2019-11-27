<div class="position-relative row form-group">
        {{ Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-7">
            {{Form::email("email",Auth::user()->email,
            ["class" => "form-control", "id" => "email", "maxlength" => "255", "value" => Auth::user()->email, "disabled" => "disabled"])}}
        </div>
    </div>
    <div class="position-relative row form-group">
            {{ Form::label('current_password', 'Current Password', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-7">
                <input name="current_password" id="current_password" placeholder="Enter Current Password" type="password" class="form-control">
            </div>
    </div>
    <div class="position-relative row form-group">
            {{ Form::label('new_password', 'New Password', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-7">
                <input name="new_password" id="new_password" placeholder="Enter New Password" type="password" class="form-control">
            </div>
    </div>
    <div class="position-relative row form-group">
            {{ Form::label('confirm_password', 'Confirm Password', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-7">
                <input name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" type="password" class="form-control">
            </div>
    </div>