<div class="position-relative row form-group">
    {{ Form::label('title', 'Title', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{Form::text("title",old("title") ? old("title") : (!empty($notification) ? $notification->title : NULL),
        ["class" => "form-control", "id" => "title", "maxlength" => "255", "placeholder" => 'Enter title'])}}
    </div>
</div>
<div class="position-relative row form-group">
    {{ Form::label('channel_id', 'Channel Id', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{Form::text("channel_id",old("channel_id") ? old("channel_id") : (!empty($notification) ? $notification->channel_id : NULL),
        ["class" => "form-control", "id" => "channel_id", "maxlength" => "255", "placeholder" => 'Enter Channel Id'])}}
    </div>
</div>
<div class="position-relative row form-group">
    {{ Form::label('to', 'Send To', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{Form::select("to", $users, old('to[]',!empty($driver->to) ? $driver->to : NULL),
             [
                 'multiple'=>'multiple',
                "class" => "form-control",
                "id" => "trip_id",
                "placeholder" => "Select Users",
             ])
        }}
    </div>
</div>
<div class="position-relative row form-group">
    {{ Form::label('body', 'Message Body', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-7">
        {{Form::textarea("body",old("body") ? old("body") : (!empty($notification) ? $notification->body : NULL),
        ["class" => "form-control", "id" => "body", "maxlength" => "255", "placeholder" => 'Enter Message Body'])}}
    </div>
</div>
<div class="row">
    <div class="col-md-6 text-left">
        <button onclick="location.href='{{ url("/") }}'" type="button"  class="btn btn-primary">Back</button>
    </div>
    <div class="text-right col-md-6">
        <button type="submit" class="btn btn-secondary">@yield('button_name')</button>
    </div>
</div>