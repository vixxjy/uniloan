<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Member\MemberContract;
use App\Member;

use Session;

class MemberController extends Controller
{
//     protected $repo;
// 	public function __construct(MemberContract $memberContract) {
// 		$this->repo = $memberContract;
// 	}
	
    public function index(){
        $members = Member::orderby('id', 'desc')->get();
        return view('members.index', ['members' => $members]);
    }
    public function create(){
        return view('members.create');
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'surname' => 'required',
            'othername' => 'required',
            'fileno' => 'required',
            'department' => 'required',
            'appointment' => 'required',
            'rank' => 'required',
            'amount' => 'required',
            'next_of_kin' => 'required',
            'address' => 'required',
            'phone' => 'required|max:11|min:11',
            'bank' => 'required',
            'acc_name' => 'required',
            'acc_no' => 'required|max:14',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $input = $request->all();
        
        // dd($input); 
        
        $imageName = time().'.'.$input['image']->getClientOriginalExtension();

        $input['image']->move(public_path('images'), $imageName);
        
        $input['image'] = $imageName;
    
        Member::create($input);
        
        Session::flash('success', 'Thanks, Your application is been processed.');
        
        return redirect()->back();
    }
    
    public function show($id){
        $member = Member::findOrFail($id);
        return view('members.show', ['member' => $member]);
    }
    
    public function edit($id){
         $member = Member::findOrFail($id);
         return view('members.edit', ['member' => $member]);
    }
    
    public function update(Request $request, $id){
         $this->validate($request, [
            'surname' => 'required',
            'othername' => 'required',
            'fileno' => 'required',
            'department' => 'required',
            'appointment' => 'required',
            'rank' => 'required',
            'amount' => 'required',
            'next_of_kin' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $postData = $request->all();
        
        Member::findOrFail($id)->update($postData);
        
        Session::flash('success', 'Member was updated successfully!');

        return redirect()->route('members.index');
    }
    
    public function destroy($id)
    {
        $member = Member::findOrFail($id); 
        $member->delete();
        
        Session::flash('success', 'Member was deleted successfully!');

        return redirect()->route('members.index');
    }
}
