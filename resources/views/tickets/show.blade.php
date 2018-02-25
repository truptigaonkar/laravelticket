@extends('inc.main')
@section('content')

@if(count($tickets) > 0)
@foreach($tickets->all() as $ticket)
<div class="content-wrapper">
    <p><a href="{{ url('/home')}}">Home</a> >> {{$ticket->ticket_title}} </p>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket" aria-hidden="true"></i> Ticket Management
        <small>View</small> | Comment Management
        <small>Add, List</small>
      </h1>
    </section>
    <section class="content">
    <div class="col-md-12">
        <div class="col-md-2">
            <ul class="list-group">
                @if(count($categories) > 0)
                <div class="panel panel-primary">
                <div class="panel-heading"><h3>CATEGORIES</h3></div>
                @foreach($categories->all() as $category) 
                    <li class="list-group-item"><a href='{{ url("category/{$category->id}") }}'>{{$category->category}}</a></li>
                @endforeach
                @else
                    <p>No categories found. Please add categories</p>
                @endif
                </div>
            </ul>
        </div>
        <div class="col-md-10">      
              <div class="box">
                <div class="box-header" style="background-color:#cccccc">
                    <h3 class="box-title">{{$ticket->ticket_title}}</h3> [Comments <span class="badge">{{$ticket->comments->count()}}</span> ]                
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div class="cold col-md-12">                                        
                        <p><b>Message:</b> {{ $ticket->ticket_message }}</p>
                        <p><b>Status:</b> 
                            @if ($ticket->ticket_status === 'Open')
                                <span class="label label-success">{{ $ticket->ticket_status }}</span>
                            @else
                                <span class="label label-danger">{{ $ticket->ticket_status }}</span>
                            @endif
                        </p>
                        <p><b>Priority:</b> {{ $ticket->ticket_priority }}</p>
                        <p><b>Author:</b> {{ $ticket->ticket_author }}</p>
                        <p><b>Created on:</b> {{ $ticket->created_at->diffForHumans() }}</p>
                        <b>Attachment:</b>
                        <p>                          
                            <img src="/storage/images/{{ $ticket->ticket_image }}" alt="File" height="300" width="400"></p>
                            <i class="glyphicon glyphicon-envelope"></i>
                            <a href="/storage/images/{{ $ticket->ticket_image }}" download="{{$ticket->ticket_image}}">{{$ticket->ticket_image}}</a>
                        </p> 
@endforeach
@else
    <p>No ticket found!!!</p>
@endif
                <!--Comment functionality -->
                <div class="comment-form">
                    <form method="POST" action="{{ url("/comment/{$ticket->id}") }}">
                    {{csrf_field()}}
                        <div class="form-group">
                            <textarea id="comment" rows="3" placeholder="Add comment here......" class="form-control" name="comment" required autofocus></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add Comment</button>
                        </div>
                    </form>
                </div>
                <h4>Comments <a href=""><span class="badge">{{$ticket->comments->count()}}</span></a></h4>
                <div class="comments">                    
                    @foreach ($tickets as $ticket)
                        @foreach ($ticket->comments as $comment)
                        <div class="panel panel-body">
                            <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                            {{ $comment->comment }}            
                        </div>
                        @endforeach
                    @endforeach
                </div>
                     
                </div>                   
            </div><!-- /.box-body -->            
            </div><!-- /.box -->
    </div>
</div>
    </section>
</div>
           
@endsection
