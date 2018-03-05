<?php

namespace App\Repositories\Member;
use App\Repositories\Member\MemberContract;
use App\Member;

class EloquentMemberRepository implements MemberContract
{

	public function create($requestData)
    {
       return Member::create($requestData);
    }
    
    public function find($id)
    {
       return Member::find($id);
    }
    
    
    public function listAllMembers()
    {
        return Member::all();
    }
    
    
    public function destroy($id)
    {
        $client = Member::findorFail($id);
        return $client->delete();
    }
    
    public function update($id, $requestData)
    {
       return Member::find($id)->update($requestData);
    }
}
