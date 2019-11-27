@foreach($addresses as $key => $addr)
    <div class="card mb-3">
        <div class="card-header pr-0 pl-0">
            <div class="row no-gutters align-items-center w-100">
                <div class="col font-weight-bold pl-3 app-sidebar__heading" style="font-size: 20px;">{{$addr}}</div>
            </div>
        </div>
        {{Form::hidden("label[]",old("label[]") ? old("label[]") : (!empty($address[$key]->label) ? $address[$key]->label : $addr),
                        [
                            "class" => "form-control form-control-sm". ( $errors->has('label[]') ? ' is-invalid' : '' ),
                            "maxlength" => "30",
                            "placeholder" => "Enter Label",

                        ])}}
        <div class="card-body py-3">
            <div class="row">
                <div class="position-relative row form-group col-md-6">
                    {{ Form::label('house_no[]', 'House Number ', ['class' => 'col-sm-4 col-form-label']) }}
                    <div class="col-sm-12">
                        {{Form::text("house_no[]",old("house_no[]") ? old("house_no[]") : (!empty($address[$key]) ? $address[$key]->house_no : NULL),
                        [
                            "class" => "form-control form-control-sm". ( $errors->has('house_no[]') ? ' is-invalid' : '' ),
                            "maxlength" => "255",
                            "placeholder" => "Enter House Number",
                        ])}}
                        @if($errors->has('house_no[]'))
                            <em id="lastname-error" class="error invalid-feedback">House number should not exceed 255 characters</em>
                        @endif
                    </div>
                </div>
                <div class="position-relative row form-group col-md-3">
                    {{ Form::label('block[]', 'Block ', ['class' => 'col-sm-12 col-form-label']) }}
                    <div class="col-sm-12">
                        {{Form::text("block[]",old("block[]") ? old("block[]") : (!empty($address[$key]) ? $address[$key]->block : NULL),
                        [
                            "class" => "form-control form-control-sm col-sm-12". ( $errors->has('block[]') ? ' is-invalid' : '' ),
                            "maxlength" => "255",
                            "placeholder" => "Enter Block",])}}
                        @if($errors->has('block[]'))
                            <em id="lastname-error" class="error invalid-feedback">Block field is required</em>
                        @endif
                    </div>
                </div>
                <div class="position-relative row form-group col-md-3">
                    {{ Form::label('building[]', 'Building ', ['class' => 'col-sm-12 col-form-label']) }}
                    <div class="col-sm-12">
                        {{Form::text("building[]",old("building[]") ? old("building[]") : (!empty($address[$key]) ? $address[$key]->building : NULL),
                        [
                            "class" => "form-control form-control-sm". ( $errors->has('building[]') ? ' is-invalid' : '' ),
                            "maxlength" => "255",
                            "placeholder" => "Enter Building",
                        ])}}

                        @if($errors->has('building[]'))
                            <em id="lastname-error" class="error invalid-feedback">Building field is required</em>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="position-relative row form-group col-md-6">
                    {{ Form::label('street[]', 'Street ', ['class' => 'col-sm-3 col-form-label']) }}
                    <div class="col-sm-12">
                        {{Form::text("street[]",old("street[]") ? old("street[]") : (!empty($address[$key]) ? $address[$key]->street : NULL),
                        [
                            "class" => "form-control form-control-sm". ( $errors->has('street[]') ? ' is-invalid' : '' ),
                            "maxlength" => "255",
                            "placeholder" => "Enter Street",
                        ])}}
                        @if($errors->has('street[]'))
                            <em id="lastname-error" class="error invalid-feedback">Street field is required</em>
                        @endif
                    </div>
                </div>
                <div class="position-relative row form-group col-md-3">
                    {{ Form::label('landmark[]', 'Landmark ', ['class' => 'col-sm-12 col-form-label']) }}
                    <div class="col-sm-12">
                        {{Form::text("landmark[]",old("landmark[]") ? old("landmark[]") : (!empty($address[$key]) ? $address[$key]->landmark : NULL),
                        [
                            "class" => "form-control form-control-sm". ( $errors->has('landmark[]') ? ' is-invalid' : '' ),
                            "maxlength" => "255",
                            "placeholder" => "Enter Landmark",
                        ])}}
                        @if($errors->has('landmark[]'))
                            <em id="lastname-error" class="error invalid-feedback">Landmark is required</em>
                        @endif
                    </div>
                </div>
                <div class="position-relative row form-group col-md-3">
                    {{ Form::label('lat_lng[]', 'Latitude & Longitude ', ['class' => 'col-sm-12 col-form-label']) }}
                    <div class="col-sm-6">
                        {{Form::text("latitude[]",old("latitude[]") ? old("latitude[]") : (!empty($address[$key]) ? $address[$key]->latitude : NULL),
                        [
                            "class" => "form-control form-control-sm". ( $errors->has('latitude[]') ? ' is-invalid' : '' ),
                            "maxlength" => "255",
                            "placeholder" => "Enter Latitude",
                        ])}}
                        @if($errors->has('latitude[]'))
                            <em id="lastname-error" class="error invalid-feedback">Latitude is required</em>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        {{Form::text("longitude[]",old("longitude[]") ? old("longitude[]") : (!empty($address[$key]) ? $address[$key]->longitude : NULL),
                        [
                            "class" => "form-control form-control-sm". ( $errors->has('longitude[]') ? ' is-invalid' : '' ),
                            "maxlength" => "255",
                            "placeholder" => "Enter Longitude",
                        ])}}
                        @if($errors->has('longitude[]'))
                            <em id="lastname-error" class="error invalid-feedback">Longitude is required</em>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="position-relative row form-group col-md-6">
                    {{ Form::label('raw_address[]', 'Raw Address ', ['class' => 'col-sm-12 col-form-label']) }}
                    <div class="col-sm-12">
                        {{Form::text("raw_address[]",old("raw_address[]") ? old("raw_address[]") : (!empty($address[$key]) ? $address[$key]->raw_address : NULL),
                        [
                            "class" => "form-control form-control-sm",
                            "maxlength" => "255",
                            "placeholder" => "Enter Raw Address",
                        ])}}
                    </div>
                </div>
                <div class="position-relative row form-group required col-md-6">
                    {{ Form::label('country_name[]', 'Country ', ['class' => 'col-sm-3 col-form-label']) }}
                    <div class="col-sm-12">
                        {{Form::select("country_name[]",$countries, "1",
                         [
                            "class" => "dynamic-select-binding form-control form-control-sm". ( $errors->has('country_name[]') ? ' is-invalid' : '' ),
                            "placeholder" => "Select Country Name",
                            "data-url" => url('caravan-base/get-cities'),
                            "data-redirectid" => 'cities_'.$key,
                            'data-selectedval' => !empty($address[$key]) ? $address[$key]->city_id : NULL
                            
                         ])
                        }}

                        @if($errors->has('country_name[]'))
                            <em id="lastname-error" class="error invalid-feedback">Country Name is required</em>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="position-relative row form-group  col-md-6">
                    {{ Form::label('city_name[]', 'City ', ['class' => 'col-sm-3 col-form-label']) }}
                    <div class="col-sm-12">
                        {{Form::select("city_name[]",$cities, old('city_name[]',!empty($address[$key]) ? $address[$key]->city_id : NULL),
                         [
                            "class" => "dynamic-select-binding form-control form-control-sm". ( $errors->has('city_name[]') ? ' is-invalid' : '' ),
                            "placeholder" => "Select City Name",
                            "id" => "cities_".$key,
                            "data-url" => url('caravan-base/get-areas'),
                            "data-redirectid" => 'areas_'.$key,
                            'data-selectedval' => !empty($address[$key]) ? $address[$key]->area_id : NULL
                         ])
                        }}
                        @if($errors->has('city_name[]'))
                            <em id="lastname-error" class="error invalid-feedback">City Name is required</em>
                        @endif
                    </div>
                </div>
                <div class="position-relative row form-group col-md-6">
                    {{ Form::label('area_name[]', 'Area ', ['class' => 'col-sm-3 col-form-label']) }}
                    <div class="col-sm-12">
                        {{ Form::select("area_name[]",$areas, old('area_name[]',!empty($address[$key]) ? $address[$key]->area_id : NULL),
                         [
                            "class" => "form-control form-control-sm". ( $errors->has('area_name[]') ? ' is-invalid' : '' ),
                            "placeholder" => "Select Area",
                            "id" => "areas_".$key,
                         ])
                        }}

                        @if($errors->has('area_name[]'))
                            <em id="lastname-error" class="error invalid-feedback">Area Name is required</em>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endforeach