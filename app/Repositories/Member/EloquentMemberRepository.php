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
        return Member::orderby('id', 'desc')->get();
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
    
    public function register($id){
        return Member::where('id', $id)->firstOrFail();
    }
}
