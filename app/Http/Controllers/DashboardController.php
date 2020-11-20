<?php

namespace App\Http\Controllers;

use App\ModelDetail;
use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use App\Http\Requests\ModelRequest;

class DashboardController extends Controller
{
    use ImageTrait;

    CONST FOLDER_NAME = 'models';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
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
     * @param  \App\Http\Requests\ModelRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ModelRequest $request)
    {
        try {
            $modelDetail = new ModelDetail;

            $modelDetail->name = $request->name;

            $modelDetail->number = $request->number;

            $modelDetail->size = $request->size;

            $modelDetail->photo = $this->storeImageAndGetPath(self::FOLDER_NAME, $request->file('photo'));

            $modelDetail->description = $request->description;

            $modelDetail->save();

            return redirect('/')->with(['status' => 'Well Done! Model Created Succesfully.', 'clientJS' => '<script src="'.env('APP_URL').'/js/all.js"></script>', 'clientURL' => '<a href="#" id="wt-code" data-parenturl="'.env('APP_URL').'" data-modelid="'.$modelDetail->id.'" style="background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 12px;">Click Here!</a>']);

        } 
        catch (\Exception $e) {
            abort(404);
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
        $model = ModelDetail::find($id);

        if( $model ) {
            return response()->json(['status' => 'success', 'model' => $model], 200);
        }
        else {
            return response()->json(['status' => 'failure', 'message' => 'Whoops! Something went wrong. Try again later.'], 404);
        }
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
