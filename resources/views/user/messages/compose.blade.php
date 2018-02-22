@extends('ui.maiong_ui.main')

@section('main_content')
<div class="row">
   <div class="col-md-12 page-content">
      <div class="inner-box category-content">
         <h2 class="title-2"><i class="icon-user-add"></i> Create New Message </h2>
         <div class="row">
            <div class="col-sm-12">
                @if ($errors->any())
                  {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif

               {!! Form::open(array('route' => 'user.message.send', 'id' => 'user.message.send', 'class' => 'form-horizontal row-border')) !!}
                  <fieldset>

                     @include('user.messages._create')

                     <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-8">
                           <div style="clear:both"></div>
                           <button type="submit" class="btn btn-primary" >Send Message</button>
                        </div>
                     </div>
                  </fieldset>
               {!! Form::close() !!}

            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('pageCss')
<link href="{{ asset('public-assets/plugins/selectize.js/dist/css/selectize.css') }}" rel="stylesheet">
@stop
@section('pageJs')
<script type="text/javascript" src="{{ asset('public-assets/plugins/selectize.js/dist/js/standalone/selectize.min.js') }}"></script>
<script>

  $('#select-repo').selectize({
    valueField: 'url',
    labelField: 'name',
    searchField: 'name',
    maxItems: null,
    create: false,
    render: {
        option: function(item, escape) {
            return '<div>' +
                '<span class="title">' +
                    '<span class="name"><i class="icon ' + (item.fork ? 'fork' : 'source') + '"></i>' + escape(item.name) + '</span>' +
                    '<span class="by">' + escape(item.username) + '</span>' +
                '</span>' +
                '<span class="description">' + escape(item.description) + '</span>' +
                '<ul class="meta">' +
                    (item.language ? '<li class="language">' + escape(item.language) + '</li>' : '') +
                    '<li class="watchers"><span>' + escape(item.watchers) + '</span> watchers</li>' +
                    '<li class="forks"><span>' + escape(item.forks) + '</span> forks</li>' +
                '</ul>' +
            '</div>';
        }
    },
    score: function(search) {
        var score = this.getScoreFunction(search);
        return function(item) {
            return score(item) * (1 + Math.min(item.watchers / 100, 1));
        };
    },
    load: function(query, callback) {
        if (!query.length) return callback();
        $.ajax({
            url: 'https://api.github.com/legacy/repos/search/' + encodeURIComponent(query),
            type: 'GET',
            error: function() {
                callback();
            },
            success: function(res) {
                console.log(res);
                callback(res.repositories.slice(0, 10));
            }
        });
    }
});

</script>
@stop