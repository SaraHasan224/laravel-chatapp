<!-- ERRORS -->
    @if(is_string($errors))
        <div class="alert alert-danger fade  {{ (Session::has('errors') ? 'show' : '') }}" role="alert">
            <b>Error(s)!</b><br>
                {{ $errors }}  <br>
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger fade  {{ (Session::has('errors') ? 'show' : '') }}" role="alert">
            <b>Error(s)!</b><br>
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
        </div>
    @endif

@if (Session::has('error'))
    <div class="alert alert-danger fade  {{ (Session::has('errors') ? 'show' : '') }}" role="alert">
        <b>Error(s)!</b><br>
            @foreach (Session::get('errors') as $error)
                {{ $error }}  <br>
            @endforeach
    </div>
@endif
<!-- WARNINGS -->

@if (Session::has('warning_msg'))
<div class="alert alert-warning fade show" role="alert">
    <b>Warning:</b>
        {{ Session::get('warning_msg') }}
</div>
@endif

<!-- INFO -->

@if (Session::has('info_msg'))
<div class="alert alert-primary fade show" role="alert">
    <b>Info:</b>
        {{ Session::get('info_msg') }}
</div>
@endif

<!-- SUCCESS -->
@if (Session::has('success'))
<div class="alert alert-success fade show" role="alert">
    <b>Success:</b>
    
        {!! Session::get('success') !!}
</div>
@endif
