@extends('admin.layout.main')

@section('main-content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    All Categories Added
                    <small>View/Edit or Remove Category</small>
                </h2>
                
            </div>
            <div class="body table-responsive">
                @if(count($categories))
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CATEGORY NAME</th>
                            <th>ICON</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $k => $v)
                        <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>{{ ucwords($v->name) }}</td>
                            <td><a id="{{$v->slug}}" class="fancyimage" href="{{ asset($v->icon_path) }}"> <img src="{{ asset($v->icon_path) }}" width="30" height="30" alt="{{ $v->slug }}"></a></td>
                            <td>
                                <a href="{{ route('admin.category.edit', $v->id) }}" class="btn btn-sm btn-warning waves-effect"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</a>
                                <a href="{{ route('admin.category.disable', $v->id) }}" class="btn btn-sm btn-danger waves-effect" onclick="return confirm('Are you sure ?')"> <i class="fa fa-trash" aria-hidden="true"></i> DELETE</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                @else
                    <div class="alert alert-danger">
                      <strong>Oops !</strong> No Categories Found.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('page-header') All Categories @stop
