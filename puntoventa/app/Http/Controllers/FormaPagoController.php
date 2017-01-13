<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\pv_forma_pago;

class FormaPagoController extends Controller
{
    public function index($id = null)
    {
        //
        if($id==null)
        {
            return pv_forma_pago::orderBy('pfp_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombreFormaPagoModel' => 'required|max:100'
        ]);

        $fpago = new pv_forma_pago();
        $fpago->pfp_forma_pago = $request->input('nombreFormaPagoModel');
        $fpago->save();
        
    }

    public function show($id)
    {
        return pv_forma_pago::find($id);
    }

    public function update(Request $request, $id)
    {
        $fpago = pv_forma_pago::find($id);
        $fpago->pfp_forma_pago = $request->input('nombreFormaPagoModel');
        if($fpago->save())
        {
            return $fpago->id;

        }else{
            return "ERROR";
        }
    }

    public function destroy($id)
    {
        $fpago = pv_forma_pago::find($id)->delete();
    }
}
