
@extends("layouts.default")
@section('content')
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="/">Home</a>
      <i class="icon-angle-right"></i>
    </li>
    <li>
      <i class="icon-group"></i>
      <a href="/universities">Universities</a>
      <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">View</a></li>
  </ul>

  <div class="row-fluid">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white edit"></i><span class="break"></span>{{ $university->name }}</h2>
        <div class="box-icon">
          <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
          <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal">
          <fieldset>
              <div class="control-group">
                {!! Form::label('name', 'Name:',["class"=>"control-label"]) !!}
                <div class="controls">
                  {!! Form::text('name', old('name'), ['class' => 'form-control input-xlarge disabled','disabled'=>'', "placeholder" => $university->name]) !!}
                </div>
              </div>
              <div class="control-group">
                {!! Form::label('chancellor', 'Chancellor:',["class"=>"control-label"]) !!}
                <div class="controls">
                  {!! Form::text('chancellor', null, ['class' => 'form-control input-xlarge disabled','disabled'=>'', "placeholder" => $university->chancellor]) !!}
                </div>
              </div>  
              <div class="control-group">
                {!! Form::label('vice_chancellor', 'Vice Chancellor:',["class"=>"control-label"]) !!}
                <div class="controls">
                  {!! Form::text('vice_chancellor', null, ['class' => 'form-control input-xlarge disabled','disabled'=>'',"placeholder" => $university->vice_chancellor]) !!}
                </div>
              </div>    
              <div class="control-group">
                {!! Form::label('slogan', 'Slogan:',["class"=>"control-label"]) !!}
                <div class="controls">
                  {!! Form::text('slogan', null, ['class' => 'form-control input-xlarge disabled','disabled'=>'', "placeholder" => $university->slogan]) !!}
                </div>
              </div>  
              <div class="control-group">
                {!! Form::label('description', 'Description:',["class"=>"control-label"]) !!}
                <div class="controls">
                  {!! Form::textarea('description', null, ['class' => 'form-control input-xlarge disabled','disabled'=>'', "placeholder" => $university->description]) !!}
                </div>
              </div>
              <a type="button" href="{{ URL::previous() }}" class="btn btn-warning" >Back</a>
          </fieldset>
        </form>
      </div>

    </div>
  </div>
  <div class="row-fluid">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white edit"></i><span class="break"></span>Faculties</h2>
        <div class="box-icon">
          <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
          <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal">
          <fieldset>
            @foreach ($university->faculties as $faculty)
              <div class="control-group">
                <label class="control-label" for="optionsCheckbox2"></label>
                <div class="controls">
                  <label class="checkbox">
                  <input type="checkbox" id="optionsCheckbox2" value="option1" disabled="" checked>
                  {{ $role->name }}
                  </label>
                </div>
              </div>
            @endforeach
          </fieldset>
        </form>
      </div>
    </div>
  </div> 

{{-- 'Name:' .   {{$university->fullname}}
{{$university}}
{{$university}} --}}
@endsection
