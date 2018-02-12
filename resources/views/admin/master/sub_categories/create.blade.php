@extends('admin.layout.main')

@section('main-content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Sub Category
                    <small>Add New Sub Category</small>
                </h2>
                
            </div>
            <div class="body">
                
                <div class="row clearfix">
                    <div class="col-sm-12">
                        {!! Form::open(array('route' => 'admin.sub_category.save', 'id' => 'admin.sub_category.save')) !!}
                        @include('admin.master.sub_categories._form')

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

@section('page-header') Create a new sub category @stop
