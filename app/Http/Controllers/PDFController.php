<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Note;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function generatePDF()
    {
        if (Auth::check()) {

            $currentuser = Auth::user(); 
            $UrgentNotes=Note::where('user_id','=',$currentuser->id)->where('type','=','Urgent');
            $CUN= $UrgentNotes->count();

            $NormalNotes=Note::where('user_id','=',$currentuser->id)->where('type','=','Normal');
            $CNN= $NormalNotes->count();

            $On_DateNotes=Note::where('user_id','=',$currentuser->id)->where('type','=','On Date');
            $CON= $On_DateNotes->count();

            $data = [
                'User'=>$currentuser->name,
                'UrgentNotes' => $CUN,
                'NormalNotes'=>$CON,
                'On_DateNotes'=>$CNN,
                'date' => date('m/d/Y')
            ];
            $pdf = pdf::loadView('myPDF', $data);

            return $pdf->download('UserNotesRepoert.pdf');
        }
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
