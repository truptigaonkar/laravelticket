@extends('inc.main')
@section('content')

<div class="content-wrapper">
    <p><a href="{{ url('/home')}}">Home</a> >> Edit/Update Ticket </p>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket" aria-hidden="true"></i> Ticket Management
        <small>Edit/Update Ticket</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header" style="background-color:#cccccc">
                        <h3 class="box-title">Enter Ticket Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form" method="POST" action="/tickets/{{$tickets->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_title') ? ' has-error' : '' }}">
                                        <label for="ticket_title">Ticket Title</label>
                                            <input id="ticket_title" type="text" class="form-control" name="ticket_title" value="{{ $tickets->ticket_title }}" required autofocus>
                                            @if ($errors->has('ticket_title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_title') }}</strong>
                                                </span>
                                            @endif
                                    </div>                               
                                </div>
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_priority') ? ' has-error' : '' }}">
                                        <label for="ticket_priority">Ticket Priority</label>
                                            <select id="ticket_priority" type="" class="form-control" name="ticket_priority" >
                                    <option value="{{ $tickets->ticket_priority }}">{{ $tickets->ticket_priority }}</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                                            @if ($errors->has('ticket_priority'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_priority') }}</strong>
                                                </span>
                                            @endif
                                    </div>                               
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_message') ? ' has-error' : '' }}">
                                        <label for="ticket_message">Ticket Message</label>
                                            <textarea id="ticket_message" type="text" class="form-control" name="ticket_message" rows="5" required autofocus>{{ $tickets->ticket_message }}</textarea>
                                            @if ($errors->has('ticket_message'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_message') }}</strong>
                                                </span>
                                            @endif
                                    </div>                               
                                </div>
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_status') ? ' has-error' : '' }}">
                                        <label for="ticket_status">Ticket Status</label>
                                            <select id="ticket_status" type="" class="form-control" name="ticket_status" value="{{ $tickets->ticket_status }}" >
                                    <option value="{{ $tickets->ticket_status }}">{{ $tickets->ticket_status }}</option>
                                    <option value="Open">Open</option>
                                    <option value="Close">Close</option>
                                </select>
                                            @if ($errors->has('ticket_status'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_status') }}</strong>
                                                </span>
                                            @endif
                                    </div>                               
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_image') ? ' has-error' : '' }}">
                                        <label for="ticket_image">Attachment</label>
                                            <input id="ticket_image" type="file" class="form-control" name="ticket_image" autofocus>{{ $tickets->ticket_image }}
                                            @if ($errors->has('ticket_image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_image') }}</strong>
                                                </span>
                                            @endif
                                    </div>                             
                                </div>
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_author') ? ' has-error' : '' }}">
                                        <label for="ticket_author">Ticket Author</label>
                                            <input id="ticket_author" type="text" class="form-control" name="ticket_author" value="{{ $tickets->ticket_author }}" required autofocus>
                                            @if ($errors->has('ticket_author'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_author') }}</strong>
                                                </span>
                                            @endif
                                    </div>                               
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_priority') ? ' has-error' : '' }}">
                                        <label for="category_id">Categories</label>
                                            <select id="category_id" type="category_id" class="form-control" name="category_id" value="{{ old('category_id') }}" name="category_id" value="{{ $tickets->category_id }}" required autofocus>
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @if(count($categories) > 0)
                                                @foreach($categories->all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                            @if ($errors->has('category_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                            @endif
                                    </div>                               
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Update" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
@endsection
