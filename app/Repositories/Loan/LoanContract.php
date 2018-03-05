<?php

namespace App\Repositories\Loan;

interface LoanContract
{
	public function find($id);
    
    public function listAllLoans();
    
    public function create($requestData);
    
    public function update($id, $requestData);
    
    public function destroy($id);
    
    public function register($id);
}
