<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Category;
use App\Ticket;
use App\Comment;
use Auth;
use App\User;
use DB;


class TicketsController extends Controller
{  
    public function index()
    {        
        //
    }

    public function create()
    {
        $categories = Category::all();
        return view('tickets.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'category_id' => 'required',
                'ticket_title' => 'required',
                'ticket_priority' => 'required',
                'ticket_message' => 'required',
                'ticket_status' => 'required',
                'ticket_author' => 'required',
                'ticket_image' => 'nullable|max:1999'
            ]
        );

        //Handle file upload
        if($request->hasFile('ticket_image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('ticket_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('ticket_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('ticket_image')->storeAs('public/images', $fileNameToStore);
        } else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create ticket
        $tickets = new Ticket();
        $tickets->category_id = $request->input('category_id');
        $tickets->ticket_title = $request->input('ticket_title');
        $tickets->ticket_priority = $request->input('ticket_priority');
        $tickets->ticket_message = $request->input('ticket_message');
        $tickets->ticket_status = $request->input('ticket_status');
        $tickets->ticket_author = $request->input('ticket_author');
        $tickets->ticket_image = $fileNameToStore;
        $tickets->save();
        return redirect('/home')->with('success', 'New Ticket Has Been Added Successfully!!!!');
    }

    public function show($id)
    {
        $tickets = Ticket::where('id', '=', $id)->get();
        //Listing comments:
        $comments = Comment::all();
        $categories = Category::all();
        return view('tickets.show')->with('tickets', $tickets)->with('comments', $comments)->with('categories', $categories);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $tickets = Ticket::find($id);
        $category = Category::find($tickets->category_id);
        return view('tickets.edit')->with('tickets', $tickets)->with('categories', $categories)->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'category_id' => 'required',
                'ticket_title' => 'required',
                'ticket_priority' => 'required',
                'ticket_message' => 'required',
                'ticket_status' => 'required',
                'ticket_author' => 'required',
                'ticket_image' => 'nullable|max:1999'
            ]
        );

        //Handle file upload
        if($request->hasFile('ticket_image'))
        {
            $filenameWithExt = $request->file('ticket_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ticket_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('ticket_image')->storeAs('public/images', $fileNameToStore);
        } 

        //Update ticket
        $tickets = Ticket::find($id);
        $tickets->category_id = $request->input('category_id');
        $tickets->ticket_title = $request->input('ticket_title');
        $tickets->ticket_priority = $request->input('ticket_priority');
        $tickets->ticket_message = $request->input('ticket_message');
        $tickets->ticket_status = $request->input('ticket_status');
        $tickets->ticket_author = $request->input('ticket_author');
        if($request->hasFile('ticket_image'))
        {
            // Delete the old image if it's changed .
            if ($tickets->ticket_image != 'no_image.png') 
            {
                Storage::delete('public/images/'.$tickets->ticket_image);
            }
            $tickets->ticket_image = $fileNameToStore;
        }
        $tickets->save();
        return redirect('/home')->with('success', 'New Ticket Has Been Updated Successfully!!!!');

    }

    public function destroy($id)
    {
        $tickets = Ticket::find($id);
        //Delete image from ticket
        if($tickets->ticket_image != 'noimage.jpg')
        {
            Storage::delete('public/images/'.$tickets->ticket_image);
        }
        $tickets->comments()->delete();
        $tickets->delete();
        return redirect('/home')->with('success', 'Ticket Has Been Deleted Successfully!!!!');
    }

    // COMMENTS
    public function comment(Request $request, $ticket_id)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);
        //Adding comments
        $comment = new Comment; //Do not forgot to add use App\Comment above
        $comment->ticket_id = $ticket_id; //fetch the ticket_id
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect("/tickets/$ticket_id")->with('success', 'Ticket Comment Has Been Added Successfully!!!!');
    }

    // Filtering tickets based on Categories
    public function category($cat_id)
    {
        $categories = Category::all();
        //Joining two tables tickets and categories with inner join
        $tickets = DB::table('tickets')
            ->join('categories', 'tickets.category_id', '=', 'categories.id')
            ->select('tickets.*', 'categories.*')
            ->where(['categories.id' => $cat_id])
            ->get();

        return view('categories.categoriestickets')->with('categories', $categories)->with('tickets', $tickets);
    }

}
