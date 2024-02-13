<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Alert;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard(){
        $invoice_count = Invoice::count();
        $paid_invoices = Invoice::where('payment_status','like','Completed')->count();
        $pending_invoices = Invoice::where('payment_status','like','Pending')->count();
        $total_users = User::count();
       
        return view('dashboard',compact('invoice_count','paid_invoices','pending_invoices','total_users'));
    }
    public function manage_invoices()
    {
        $start_date = '2024-02-01';
        $end_date = '2024-02-20';

        $data = Invoice::whereBetween('payment_date',[$start_date, $end_date])->with('invoice_item','user')->get();
        $final_data=[];
        foreach($data as $key => $value){
        $basic['invoice_id'] = $value->id;
        $basic['invoice_description'] = $value->description;
        $basic['address'] = $value->address;
        $basic['payment_status'] = $value->payment_status;
        $basic['payment_date'] = $value->payment_date;
        $basic['invoice_item_id'] = $value->invoice_item->id;
        $basic['invoice_item_description'] = $value->invoice_item->description;
        $basic['quantity'] = $value->invoice_item->quantity;
        $basic['amount'] = $value->invoice_item->amount;
        $basic['invoice_user'] = $value->user->name;
        $final_data[] = $basic;
    }
      
        return view('manage_invoices',compact('final_data'));
    }

    public function get_invoice_data(Request $request){
    $date = explode('-',$request->daterange);
    $start=date("Y-m-d",strtotime(trim($date[0])));
    $end=date("Y-m-d",strtotime(trim($date[1])));
    $start_date = $start;
    $end_date=$end;
   
    $data = Invoice::whereBetween('payment_date',[$start_date, $end_date])->with('invoice_item','user')->get();
   
    $final_data=[];
    foreach($data as $key => $value){
        $basic['invoice_id'] = $value->id;
        $basic['invoice_description'] = $value->description;
        $basic['address'] = $value->address;
        $basic['payment_status'] = $value->payment_status;
        $basic['payment_date'] = $value->payment_date;
        $basic['invoice_item_id'] = $value->invoice_item->id;
        $basic['invoice_item_description'] = $value->invoice_item->description;
        $basic['quantity'] = $value->invoice_item->quantity;
        $basic['amount'] = $value->invoice_item->amount;
        $basic['invoice_user'] = $value->user->name;
        $final_data[] = $basic;
    }

        return view('manage_invoices',compact('final_data'));
   
    }
    public function invoices(){
        return view('invoices');
    }

    public function invoice_data(Request $request){
    //   return  $request->all();
    //     die;
       $invoice_data = new Invoice();
       $invoice_data->user_id = Auth::user()->id;
       $invoice_data->description = $request->invoice_description;
       $invoice_data->address = $request->address;
       $invoice_data->payment_status = $request->payment_status;
       $invoice_data->payment_date = $request->payment_date;
       $invoice_data->save();

       if($invoice_data->id){
        $invoice_item_data = new InvoiceItem();
        $invoice_item_data->invoice_id = $invoice_data->id;
        $invoice_item_data->description = $request->invoice_item_description;
        $invoice_item_data->quantity = $request->quantity;
        $invoice_item_data->amount = $request->amount;
        $invoice_item_data->save();
       }
       Alert::success('Success','Invoice Data is Saved Successfully.');
       return redirect()->back();
    }

    public function edit($id){
        $edit_data = Invoice::with('invoice_item','user')->find($id);
       //return $edit_data; die;
        return view('edit',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            
            'payment_date' => 'required',
            'payment_status'=>'required',
            'invoice_description'=>'required',
            'address'=>'required',
            'invoice_item_description'=>'required',
            'quantity'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect('edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            $update_data = Invoice::with('invoice_item','user')->find($id);
            $update_data->user_id = Auth::user()->id;
            $update_data->description = $request->invoice_description;
            $update_data->address = $request->address;
            $update_data->payment_status = $request->payment_status;
            $update_data->payment_date = $request->payment_date;
            $update_data->save();

            $update_data->invoice_item->description = $request->invoice_item_description;
            $update_data->invoice_item->quantity = $request->quantity;
            $update_data->invoice_item->amount = $request->amount;
            $update_data->invoice_item->save();
        }
        Alert::success('Success','Invoice Data is Updated Successfully.');
        return redirect('manage_invoices');
    }

    public function destroy($id){
        $invoices_delete = Invoice::find($id);    
        if ($invoices_delete->delete()){ 
            $invoices_item_delete = InvoiceItem::where('invoice_id',$id)->delete();
        Alert::success('Deleted', 'Invoice Data Deleted Successfully');
        }
        return redirect()->back();
    }

    public function google_api(){
        return view('google_map');
    }
}

