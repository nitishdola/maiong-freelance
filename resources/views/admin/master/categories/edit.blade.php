@extends('admin.layout.main')

@section('main-content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Category
                    <small>Update Category <b> {{ $category->name }} </b></small>
                </h2>
                
            </div>
            <div class="body">
                
                <div class="row clearfix">
                    <div class="col-sm-12">
                        {!! Form::model($category, array('route' => ['admin.category.update', $category->id], 'id' => 'admin.category.update', 'files' => true)) !!}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <div class="form-line">
                                {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'autocomplete' => 'off', 'required' => 'true']) !!}
                                {!! Form::label('category_name', '', array('class' => 'form-label')) !!}
                            </div>
                            {!! $errors->first('name', '<div class="help-info">:message</div>') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('existing_icon', '', array('class' => 'form-label')) !!}
                            <a id="{{$category->slug}}" class="fancyimage" href="{{ asset($category->icon_path) }}"> <img src="{{ asset($category->icon_path) }}" alt="{{ $category->slug }}"></a>
                        </div>

                        <div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">

                            {!! Form::label('add_new_icon', '', array('class' => 'form-label')) !!}
                            
                            <div class="form-line">
                                {!! Form::file('icon', null, ['class' => 'form-control required', 'id' => 'icon', 'autocomplete' => 'off', 'required' => 'true']) !!}
                                
                            </div>
                            {!! $errors->first('icon', '<div class="help-info">:message</div>') !!}
                        </div>

                        <div class="form-group form-float">
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </div>
                         {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-header') Update Category <b> {{ $category->name }} </b> @stop
