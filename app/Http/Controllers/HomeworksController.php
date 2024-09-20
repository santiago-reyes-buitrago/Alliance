<?php

namespace App\Http\Controllers;

use App\Models\Homeworks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeworksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['homeworks']= Homeworks::where('user_id','=',auth()->user()->id)->paginate(10);
        return view('Homework.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Homework.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'user_id' => 'required',
        ]);
        $asunto = 'Alerta de creacion de tarea';
        $para = auth()->user()->email;
        $data = request()->except('_token');
        Homeworks::insert($data);
        Mail::send('emails.email',$data,function ($msg) use($para,$asunto){
            $msg->to($para)->subject($asunto);
        });
        return redirect('homework');
    }

    /**
     * Display the specified resource.
     */
    public function show(Homeworks $homeworks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Homeworks::findOrFail($id);
        return view('Homework.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'user_id' => 'required',
        ]);

        $data = request()->except('_token','_method');
        Homeworks::where('id','=',$id)->update($data);
        return redirect('homework');
    }

    public function checkState($id)
    {
        $asunto = 'Alerta de estado de la tarea';
        $para = auth()->user()->email;
        Homeworks::where('id','=',$id)->update(['state'=>true]);
        $data = Homeworks::findOrFail($id);
        Mail::send('emails.confirm',compact('data'),function ($msg) use($para,$asunto){
            $msg->to($para)->subject($asunto);
        });
        return redirect('homework');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Homeworks::destroy($id);
        return redirect('homework');
    }
}
