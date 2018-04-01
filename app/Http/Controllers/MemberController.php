<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Member\MemberContract;
use App\Member;
use File;

use Session;

class MemberController extends Controller
{
    protected $repo;
	public function __construct(MemberContract $memberContract) {
		$this->repo = $memberContract;
		$this->middleware('auth');
	}
	
    public function index(){
        $members = $this->repo->listAllMembers();
        return view('members.index', ['members' => $members]);
    }
    public function create(){
        $banks = ['Guaranty Trust Bank', 'Access Bank', 'Citibank', 'Diamond Bank', 'Ecobank', 'Enterprise Bank', 'Fidelity Bank', 'First Bank', 'First City Monument Bank',
        'FSDH Merchant Bank', 'Heritage Bank Plc', 'Keystone Bank Limited', 'Rand Merchant Bank', 'Skye Bank', 'Stanbic IBTC Bank', 'Standard Chartered Bank',
        'Sterling Bank', 'Union Bank of Nigeria', 'United Bank for Africa', 'Unity Bank Plc', 'Wema Bank', 'Zenith Bank', 'FCMB Group Plc', 'Jaiz Bank Limited'];
        return view('members.create', ['banks' => $banks]);
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'surname' => 'required',
            'othername' => 'required',
            'fileno' => 'required',
            'department' => 'required',
            'appointment' => 'required',
            'date_joined' => 'required',
            'rank' => 'required',
            'amount' => 'required|integer',
            'next_of_kin' => 'required',
            'address' => 'required',
            'phone' => 'required|max:11|min:11',
            'bank' => 'required',
            'acc_name' => 'required',
            'acc_no' => 'required|max:14',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $input = $request->all();

        
        $imageName = time().'.'.$input['image']->getClientOriginalExtension();

        $input['image']->move(public_path('images'), $imageName);
        
        $input['image'] = $imageName;

    
         $this->repo->create($input);
        
        Session::flash('success', 'Thanks, Your application is been processed.');
        
        return redirect()->back();
    }
    
    public function show($id){
        $id = base64_decode($id);
        $member = $this->repo->find($id);
        return view('members.show', ['member' => $member]);
    }
    
    public function edit($id){
        $id = base64_decode($id);
         $member = $this->repo->find($id);
          $banks = ['Guaranty Trust Bank', 'Access Bank', 'Citibank', 'Diamond Bank', 'Ecobank', 'Enterprise Bank', 'Fidelity Bank', 'First Bank', 'First City Monument Bank',
        'FSDH Merchant Bank', 'Heritage Bank Plc', 'Keystone Bank Limited', 'Rand Merchant Bank', 'Skye Bank', 'Stanbic IBTC Bank', 'Standard Chartered Bank',
        'Sterling Bank', 'Union Bank of Nigeria', 'United Bank for Africa', 'Unity Bank Plc', 'Wema Bank', 'Zenith Bank', 'FCMB Group Plc', 'Jaiz Bank Limited'];
         return view('members.edit', ['member' => $member, 'banks' => $banks]);
    }
    
    public function update(Request $request, $id){
         $this->validate($request, [
            'surname' => 'required',
            'othername' => 'required',
            'fileno' => 'required',
            'department' => 'required',
            'appointment' => 'required',
            'rank' => 'required',
            'date_joined' => 'required',
            'amount' => 'required',
            'next_of_kin' => 'required',
            'address' => 'required',
            'phone' => 'required|max:11|min:11',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $postData = $request->all();
        
        $member = $this->repo->find($id);
        $imageName = $member->image;
        
        if ($request->hasFile('image')) {
            
            unlink(public_path() .  '/images/' . $imageName);
            
            $newImageName = time().'.'.$postData['image']->getClientOriginalExtension();
    
            $postData['image']->move(public_path('images'), $newImageName);
            
            $postData['image'] = $newImageName;
            
            $this->repo->update($id, $postData);
        }else {
            
             $postData['image'] = $imageName;
             $this->repo->update($id, $postData);
        }
        
        
        
        Session::flash('success', 'Member was updated successfully!');

        return redirect()->route('members.index');
    }
    
    public function destroy($id)
    {
        $id = base64_decode($id);
        $this->repo->destroy($id);
        
        Session::flash('success', 'Member was deleted successfully!!!');

        return redirect()->route('members.index');
    }
    
    public function approve($id)
    {
        $req = $this->repo->register($id);
        
        if( $req->status === 'Unapproved'){
            $req->status = 'Approved'; 
            $req->save();
            Session::flash("success", "Member's application approved for  $req->name");
        }else{
           $req->status = 'Unapproved';
             $req->save();
             Session::flash("success", "Member's application for  $req->name is declined");
        }
    
        return redirect()->back();
    }
}
