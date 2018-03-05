<?php

namespace App\Repositories\Loan;
use App\Repositories\Loan\LoanContract;

use App\Loan;

class EloquentLoanRepository implements LoanContract
{
	public function create($requestData)
    {
       return Loan::create($requestData);
    }
    
    public function find($id)
    {
       return Loan::find($id);
    }
    
    
    public function listAllLoans()
    {
        return Loan::orderby('id', 'desc')->get();
    }
    
    
    public function destroy($id)
    {
        $client = Loan::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
       return Loan::find($id)->update($requestData);
    }
    
    public function register($id){
        return Loan::where('id', $id)->firstOrFail();
    }
}
