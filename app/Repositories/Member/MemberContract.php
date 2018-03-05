<?php

namespace App\Repositories\Member;

interface MemberContract
{
	public function find($id);
    
    public function listAllMembers();
    
    public function create($requestData);
    
    public function update($id, $requestData);
    
    public function destroy($id);
}
