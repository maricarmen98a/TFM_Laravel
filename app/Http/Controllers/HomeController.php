<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    public function mail(Request $request)
    {
        
        $data = [
                'Name'  => $request->input('myUsername'),
                'Email' => $request->input('myEmail'),
                'Query' => $request->input('textquery')
                ];
        
        //Mail Function
        Mail::send('email.name', ['data1' => $data], function ($m) {
         
            $m->to('mariasma@uoc.edu')->subject('Formulario de ayuda');
    });
        //Json Response For Angular frontend
        return response()->json(["message" => "El mensaje se ha enviado correctamente."]);
    }
}