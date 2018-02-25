
@extends('inc.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket" aria-hidden="true"></i> Ticket Management
        <small>Add, View, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="/tickets/create"><i class="fa fa-plus" aria-hidden="true"></i> Open New Ticket</a>
                </div>
            </div>
        </div>
         @include('inc.messages')
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header" style="background-color:#cccccc">
                    <div class="col-md-8">
                    <h3 class="box-title">Ticket List </h3> <button type="button" class="btn btn-primary btn-xs">tickets <span class="badge">{{$tickets->total()}}</span></button> 
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Message</th>
                        <th>Status</th>             
                        <th>Last updated</th>
                        <th>Author</th>
                        <th colspan="3" class="text-center">Action</th>
                    </thead>                   
                    @if(count($tickets) > 0)
                        @foreach($tickets as $ticket)                      
                    <tbody>

                        <td>{{$ticket->ticket_title}} [comments<span class="badge">{{$ticket->comments->count()}}</span>]</td>
                        <td>{{$ticket->ticket_priority}}</td>
                        <td>{{ substr($ticket->ticket_message , 0, 100) }} </td>
                        <td>
                            @if ($ticket->ticket_status === 'Open')
                                <span class="label label-success">{{ $ticket->ticket_status }}</span>
                            @else
                                <span class="label label-danger">{{ $ticket->ticket_status }}</span>
                            @endif
                        </td>                                        
                        <td>{{$ticket->updated_at}}</td>
                        <td>{{$ticket->ticket_author}}</td>
                        <td class="text-center">
                            <!--View functionality -->
                            <a href="/tickets/{{$ticket->id}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i>VIEW</a>
                        </td>
                        <td class="text-center">
                            <!-- Edit functionality -->
                            <a href="{{'/tickets/'.$ticket->id.'/edit'}}" data-userid="" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i>EDIT</a>
                        </td>
                        <td class="text-center">        
                             <!-- Delete functionality -->
                            <form class="form-group" action="{{'/tickets/'.$ticket->id}}" method="POST">
                            {{csrf_field()}}
                            {{ method_field('DELETE')}}
                                <button type="submit" value="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash">DELETE</i></button>     
                            </form>
                         </td>
                    </tbody>
                        @endforeach
                    @else
                        <p>No tickets found. Please add tickets</p>
                    @endif                                  
                </table>
                
                </div><!-- /.box-body -->
                {!! $tickets->links() !!} <!-- Pagination links -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

@endsection








    