<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Loan\LoanContract;
use Session;
use Auth;

class LoanController extends Controller
{
    protected $repo;
	public function __construct(LoanContract $loanContract) {
	    $this->repo = $loanContract;
    }
    
    // list all tasks
    public function index()
    {
        $loans = $this->repo->listAllLoans();
        return view('loans.index', ['loans' => $loans]);
    }
    
    // create new task
    public function create(){

        return view('loans.create');
    }
    
    public function store(Request $request){
            $this->validate($request, [
            'name' => 'required',
            'fileno' => 'required',
            'department' => 'required',
            'type_of_loan' => 'required',
            'date_of_appointment' => 'required',
            'rank' => 'required',
            'date_joined' => 'required',
            'amount_saved' => 'required|integer',
            'date_of_last_loan' => 'required',
            'amount_outstanding' => 'required|integer',
            'amount_of_advance' => 'required|integer',
            'period_of_payment' => 'required',
            'purpose_of_loan' => 'required',
            'e_account' => 'required',
            'phone' => 'required',
        ]);
        $loans = $request->all();
        
        $this->repo->create($loans);
        
        Session::flash('success', 'Your application was successful, We would get back to you shortly!');
        
        return redirect()->back();
        
    }
    
    public function show($id){
        $loans = $this->repo->find($id);
        return view('loans.show', ['loan' => $loans]);
        
    }
    // edit a task
    public function edit($id){
        $loans = $this->repo->find($id);
        return view('loans.edit', ['loans' => $loans]);
    }
    
    // update a task
    public function update(Request $request, $id){
        $updatedate = $request->all();
        
        $this->repo->update($id, $updatedate);
        
        return redirect()->route('loans');
        
    }
    // delte a task
    public function destroy($id){
        $this->repo->destroy($id);
        return back();
    }
    
    public function approve($id)
    {
        $req = $this->repo->register($id);
        
        if( $req->status === 'Unapproved'){
            $req->status = 'Approved'; 
            $req->save();
            Session::flash("success", "Loan application approved for  $req->name");
        }else{
           $req->status = 'Unapproved';
             $req->save();
             Session::flash("success", "Loan application has been unapproved for  $req->name");
        }
    
        return redirect()->back();
    }
}
