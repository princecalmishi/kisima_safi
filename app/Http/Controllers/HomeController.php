<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Models\Services;
use App\Models\Sliders;
use App\Models\User;
use App\Models\Gallery;
use DB;
use Storage;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('book','welcome');
    }    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $data = Gallery::all();
        $serv = Services::all();
        return view('welcome')->with('serv', $serv)->with('data', $data);
        // return view('welcome');
    }  
    // public function index()
    // {
    //     return view('home');
    // }

    public function book(){
        $data = Services::all();

        return view('book')->with('data', $data);
    }

   

    public function services(){
        $serv = Services::all();
        return view('welcome')->with('serv', $serv);
    }
    

    public function bookform(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',           
            'phone' => 'required',           
            'service' => 'required',           
            'location' => 'required',           
        ]);

        $post = new Bookings;
        $post->Name =$request->input('name');
        $post->Email = $request->input('email');
        $post->Phone = $request->input('phone');
        $post->Service = $request->input('service');      
        $post->Location = $request->input('location');      
        
        $post->save();
        return redirect()->back()->with('success', 'Your Booking was completed successfully!');
    }


    public function admin(){
        $data = Bookings::all();
        return view('admin.index')->with('data', $data);
    }

    public function pendingbooks(){
        $data = Bookings::where('Status', 'Pending')->get();
        return view('admin.pending')->with('data', $data);
    }

    public function scheduledbooks(){
        $data = Bookings::where('Status', 'Scheduled')->get();
        return view('admin.scheduled')->with('data', $data);
    }

    public function createservice(){
        $data = Services::all();
        return view('admin.createservice')->with('data', $data);
    }

    public function createserviceform(Request $request){
        
           
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'image' => 'required|image|max:1999',          

        ]);

        if($request->hasFile('image')){
            //get file name with ext
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename .'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/image', $filenameToStore);

        }

        $approval = new Services;    

        $approval->Service = $request->input('name');
        $approval->price = $request->input('price');
        $approval->Description = $request->input('desc');
        $approval->image = $filenameToStore;
       
        
        $approval->save();

        return redirect()->back()->with('success', 'Service created successfully!');

    }

    public function slides(){
        
        $data = Sliders::where('Status', 'Active')->get();
        return view('admin.slides')->with('data', $data);
    }

    public function users(){
        $data = User::all();

        return view('admin.users')->with('data', $data);
    }

    public function schedulenow($id){

        $data = Bookings::find($id);

        return view('admin.schedule')->with('data', $data)->with('id', $id);
    }

    public function schedulenowform(Request $request){
         $this->validate($request,[
            'sessionday' => 'required',
            'appid' => 'required',           
              
        ]);


        $appid = $request->input('appid');       

        $post = Bookings::find($appid);
        $post->schedule_date =$request->input('sessionday');       
        $post->Status = 'Scheduled';       
        
        $post->save();
        return redirect()->back()->with('success', 'Booking updated successfully!');
    }

    public function completenow($id){

        $data = Bookings::find($id);
        DB::table('bookings')->where('id', $id)->update(['Status' => 'Completed']);

        return redirect()->back()->with('success', 'Booking updated successfully!');

    }

    public function updateuser($id){

        $data = User::find($id);
        

        return view('admin.updateuser')->with('data', $data)->with('id', $id);

    }

    public function updateuserform(Request $request){

        
        $this->validate($request,[
            'role' => 'required',
              
        ]);


        $appid = $request->input('appid');       
        $role = $request->input('role');       

        $post = User::find($appid);
        DB::table('users')->where('id', $appid)->update(['role' => $role]);
        
        $post->save();
        return redirect()->back()->with('success', 'user updated successfully!');

    }

    public function removeuser($id){

        $data = User::find($id);
        
        $data->delete();

        return redirect()->back()->with('error', 'user removed successfully!');

    }

    public function listservices()
    {
        $services = Services::all();
        return view('admin.services')->with('services', $services);
    }

    public function removeservice($id){

        $data = Services::find($id);
        
        $data->delete();

        return redirect()->back()->with('success', 'service removed successfully!');

    }
    
    public function updateservicep($id){

        $data = Services::where('id',$id)->get();        

        return view('admin.updateservice')->with('data', $data)->with('id', $id);

    }



    public function createuser(){

        return view('admin.createuser');

    }

    public function createuserform(Request $request){
        $this->validate($request,[
            'role' => 'required',
            'name' => 'required',
            'email' => 'required',
            'pass' => 'required',
              
        ]);

        $password = Hash::make('pass'); 
        $role = $request->input('role');
        $post = new User;
        $post->name = $request->input('name');       
        $post->email = $request->input('email');       
        $post->role = $request->input('role');       
        $post->password = $password;               
        
        $post->save();
        return redirect()->route('users')->with('success', 'New ' .$role. ' created successfully!');
    }
    
    public function images(){

        $data = Gallery::all();
        return view('admin.images')->with('data', $data);
    }

    public function uploadimage(Request $request){
        $this->validate($request,[
            
            'image' => 'required|image|max:1999',          

        ]);

        if($request->hasFile('image')){
            //get file name with ext
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename .'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/image', $filenameToStore);

        }

        $approval = new Gallery;    

        $approval->imagename = $filenameToStore;
       
        
        $approval->save();

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }

    public function deleteimage($id){

        $data = Gallery::find($id);       

        Storage::delete('/storage/image/'.$data->imagename);

        $data->delete(); 

        return redirect()->back()->with('success', 'Image deleted successfully!');


    }

    public function updateserviceform(Request $request){
            
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'image' => 'nullable|image|max:1999',          

        ]);

        if($request->hasFile('image')){
            //get file name with ext
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename .'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/image', $filenameToStore);

        }
        $id = $request->input('appid');

        $approval = Services::find($id) ;    

        $approval->Service = $request->input('name');
        $approval->price = $request->input('price');
        $approval->Description = $request->input('desc');

        if($request->hasFile('image')){
            $approval->image = $fileNameToStore;
        }
       
        
        $approval->save();

        return redirect()->route('listservices')->with('success', 'Service updated successfully!');

    }
}
