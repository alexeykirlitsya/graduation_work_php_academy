@if(count($errors)  > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

<div class="alert alert-success" id="success"><ul style='margin: 0;'></ul></div>
<div class="alert alert-danger" id="errors"><ul style='margin: 0;'></ul></div>