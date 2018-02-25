@extends('inc.main')
@section('content')
<div class="content-wrapper">
    <p><a href="{{ url('/home')}}">Home</a> >> Tickets based on categories</p>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Tickets based on Categories</h3></div>
                <div class="panel-body">
                    <div class="cold col-md-12">
                        <div class="col-md-2">
                        <ul class="list-group">
                            <div class="panel panel-primary">
                            <div class="panel-heading"><h3>CATEGORIES</h3></div>
                            @if(count($categories) > 0)
                                @foreach($categories->all() as $category)
                                    <li class="list-group-item"><a href='{{ url("category/{$category->id}") }}'> {{$category->category}}</a></li>
                                @endforeach
                            @else
                                <p>No categories found. Please add categories</p>
                            @endif
                        </div>
                        </ul>
                        </div> 
                        <div class="col-md-10">

            <div class="box">
                 @if(count($tickets) > 0)
                                @foreach($tickets->all() as $ticket)
                <div class="box-header" style="background-color:#cccccc">
                    <h3 class="box-title">{{$ticket->ticket_title}}</h3>   
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
                        
                        <b>Attachment:</b>
                        <p>                          
                            <img src="/storage/images/{{ $ticket->ticket_image }}" alt="File" height="150" width="150"></p>
                            <i class="glyphicon glyphicon-envelope"></i>
                            <a href="/storage/images/{{ $ticket->ticket_image }}" download="{{$ticket->ticket_image}}">{{$ticket->ticket_image}}</a>
                        </p> 
                        <hr>
@endforeach
@else
    <p>No ticket found!!!</p>
@endif
                
                </div>
                               
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
