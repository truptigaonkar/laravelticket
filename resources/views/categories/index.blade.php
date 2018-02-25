
@extends('inc.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket" aria-hidden="true"></i> Category Management
        <small>Add, Delete</small>
      </h1>
    </section>
    <section class="content">       
        @include('inc.messages')

                <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->              
                <div class="box box-primary">
                    <div class="box-header" style="background-color:#cccccc">
                        <h3 class="box-title">Enter Category Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form" method="POST" action="/categories" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                  
                                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label for="category">Category</label>
                                            <input id="category" type="text" placeholder="Category" class="form-control" name="category" value="{{ old('category') }}" required autofocus>
                                            @if ($errors->has('category'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                </span>
                                            @endif
                                    </div>                               
                                </div>                             
                            </div>   
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Open New Category" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <hr>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header" style="background-color:#cccccc">
                    <div class="col-md-8">
                    <h3 class="box-title">Category List </h3> <button type="button" class="btn btn-primary btn-xs">categories <span class="badge">{{$categories->total()}}</span></button> 
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Category</th>
                        <th colspan="3" class="text-center">Action</th>
                    </thead>                   
                    @if(count($categories) > 0)
                        @foreach($categories as $category)                      
                    <tbody>

                        <td>{{$category->category}}</td>
                        <td class="text-center">        
                             <!-- Delete functionality -->
                            <form class="form-group" action="{{'/categories/'.$category->id}}" method="POST">
                            {{csrf_field()}}
                            {{ method_field('DELETE')}}
                                <button type="submit" value="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash">DELETE</i></button>     
                            </form>
                         </td>
                    </tbody>
                        @endforeach
                    @else
                        <p>No categories found. Please add categories</p>
                    @endif                                  
                </table>               
                </div><!-- /.box-body --> 
                {!! $categories->links() !!} <!-- Pagination links -->              
              </div><!-- /.box -->
            </div>
        </div>

        




    </section>
</div>

@endsection








    