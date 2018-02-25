<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>TICKET SYSTEM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="<?php echo asset('bootstrap/css/bootstrap.min.css')?>" type="text/css">   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
  </head>
  <body>
    <div class="jumbotron" align="center" style="background-color: skyblue">
      <h1 class="display-3">TICKET SYSTEM</h1>
      <p class="lead">A TICKET SYSTEM application built using the Laravel framework.</p>
      <hr class="my-4">
      <p>It is an unauthenticated system which allows users to perform following tasks:
        <ul class="list-unstyled">
          <li>List categories and open new category and delete category</li>
          <li>List all tickets</li> 
          <li>Open a ticket with attachment, category selected</li>
          <li>View ticket with comments</li> 
          <li>Filter tickets based on categories in Ticket view section</li>
          <li>Edit/Update a ticket with attachment, category selected</li> 
          <li>Close/Reopen a ticket</li>
          <li>Comment a ticket</li> 
          <li>Delete a ticket with comments related to specific ticket</li>
        </ul>
      </p>
      <p><a href="{{ url('/home')}}" class="btn btn-primary btn-lg">Start here &raquo;</a></p>
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/jQuery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>   
  </body>
</html>