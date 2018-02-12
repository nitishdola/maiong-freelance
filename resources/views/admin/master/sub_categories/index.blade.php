@extends('admin.layout.main')

@section('main-content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    All Sub Categories Added
                    <small>View/Edit or Remove Sub Category</small>
                </h2>
                
            </div>
            <div class="body table-responsive">
                
                @if(count($sub_categories))
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SUB CATEGORY NAME</th>
                            <th>CATEGORY NAME</th>
                            
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sub_categories as $k => $v)
                        <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>{{ ucwords($v->subCategoryName) }}</td>
                            <td>{{ ucwords($v->categoryName) }}</td>
                            
                            <td>
                                <a href="{{ route('admin.sub_category.edit', $v->subCategoryId) }}" class="btn btn-sm btn-warning waves-effect"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</a>
                                <a href="{{ route('admin.sub_category.disable', $v->subCategoryId) }}" class="btn btn-sm btn-danger waves-effect" onclick="return confirm('Are you sure ?')"> <i class="fa fa-trash" aria-hidden="true"></i> DELETE</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                @else
                    <div class="alert alert-danger">
                      <strong>Oops !</strong> No Sub Categories Found.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('page-header') All Categories @stop
