<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use Mockery\Matcher\Not;

class notesapicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allNotes = Note::all();
        return   response()->json([
            $allNotes, "message" => "View ALl Notes"
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {


        $NewNotes = new Note;
        $NewNotes->user_id = $user_id;
        $NewNotes->content = $request->content;
        $NewNotes->type = $request->type_selected;
        $NewNotes->img = $request->image;
        $NewNotes->save();
        if ($NewNotes != null) {
            return  response()->json([
                $NewNotes, "message" => "Added New Notes"
            ], 200);
        } else {
            return  response()->json([
                "message" => "No Things Add"
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        } else {
            unset($input['img']);
        }

        $note = Note::find($id);
        $note->update($input);

        if ($note != null) {
            return  response()->json([
                $note, "message" => "Notes was updated !"
            ], 200);
        } else {
            return  response()->json([
                "message" => "No Things Update !"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Note::find($id) != NULL) {
            Note::find($id)->delete();
            return  response()->json([
                "message" => "Notes was Deleted By Soft Delete !"
            ], 200);
        }
         else {
            return  response()->json([
                "message" => "Note Isn't Found !"
            ], 404);
        }
    }
}
