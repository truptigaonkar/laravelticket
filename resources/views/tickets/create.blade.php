@extends('inc.main')
@section('content')
<div class="content-wrapper">
    <p><a href="{{ url('/home')}}">Home</a> -> Open New Ticket </p>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket" aria-hidden="true"></i> Ticket Management
        <small>Add Ticket</small>
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
                    <form class="form" method="POST" action="/tickets" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_title') ? ' has-error' : '' }}">
                                        <label for="ticket_title">Title</label>
                                            <input id="ticket_title" type="text" placeholder="Title" class="form-control" name="ticket_title" value="{{ old('ticket_title') }}" required autofocus>
                                            @if ($errors->has('ticket_title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_title') }}</strong>
                                                </span>
                                            @endif
                                    </div>                               
                                </div>
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_priority') ? ' has-error' : '' }}">
                                        <label for="ticket_priority">Priority</label>
                                            <select id="ticket_priority" type="" class="form-control" name="ticket_priority" >
                                    <option value="">Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                    <option value="Critical">Critical</option>
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
                                        <label for="ticket_message">Message</label>
                                            <textarea id="ticket_message" rows="5" placeholder="Message" class="form-control" name="ticket_message" value="{{ old('ticket_message') }}" required></textarea>
                                            @if ($errors->has('ticket_message'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_message') }}</strong>
                                                </span>
                                            @endif
                                    </div>                               
                                </div>
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_status') ? ' has-error' : '' }}">
                                        <label for="ticket_status">Status</label>
                                            <input id="ticket_status" type="text" class="form-control" name="ticket_status" placeholder="Status" readonly="readonly" value="Open" required autofocus>
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
                                            <input id="ticket_image" type="file" class="form-control" name="ticket_image" autofocus>
                                            @if ($errors->has('ticket_image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ticket_image') }}</strong>
                                                </span>
                                            @endif
                                    </div>                             
                                </div>
                                <div class="col-md-6">                                             
                                    <div class="form-group{{ $errors->has('ticket_author') ? ' has-error' : '' }}">
                                        <label for="ticket_author">Author</label>
                                            <input id="ticket_author" type="text" placeholder="Author" class="form-control" name="ticket_author" value="{{ old('ticket_title') }}" required autofocus>
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
                                            <select id="category_id" type="text" class="form-control" name="category_id" value="{{ old('category_id') }}" required autofocus>
                                            <option value="">Select</option>
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
                            <input type="submit" class="btn btn-primary" value="Open New Ticket" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
@endsection
