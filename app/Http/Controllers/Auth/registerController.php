<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use Spatie\Permission\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class registerController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
public function addUser(){
$data= Role::all();
    return view ('webtech.add-user',['data'=>$data]);
}
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);
        $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->assignRole($request->role);
            if($request->has('permissions')){
                $user->givePermissionTo($request->permissions);
            }
            $user->save();
        session::flash('message','Data inserted successfully');
        return redirect()->back();
    }
    public function updateUser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'alpha',
            'email' => 'email|unique:users,email,'.$id
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        if($request->has('role')){
            $userRole = $user->getRoleNames();
            foreach($userRole as $role){
                $user->removeRole($role);
            }
            $user->assignRole($request->role);
        }
        $user->save();
        // event(new Registered($user));
        session::flash('message','Data updated successfully');
        return redirect()->back();
    }
    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        session::flash('message','Data deleted successfully');
        // return redirect()->back();
    }
    public function postProfile(Request $request){
        $user = Auth()->user();
        $this->validate($request, [
            'name' => 'required|max:255|alpha',
            'phone' => 'nullable|string|max:255',
            'address'=>'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);
        $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            if($request->hasFile('image')){
                $user['image'] = $this->uploadimage($request->image);
                 }
        $user->save();
        session::flash('message','Profile updated successfully');
        return redirect()->back();
    }
    public function uploadimage($imagename){
        $name = $imagename->getClientOriginalName();
        $imagename->move(public_path().'/user',date('ymdgis').$name);
        return date('ymdgis').$name;
    }
    public function Change(Request $request){
        $this->validate($request, [
            'newpassword' => 'required|min:8|max:30|confirmed'
        ]);
        $user = Auth()->user();
        $user->update([
            'password' => bcrypt($request->newpassword)
        ]);
        session::flash('messages','Password changed successfully');
        return redirect()->back();
        
    }
    public function editUser($id){
        $singledata = User::where('id',$id)->first();
        $data= Role::all();
        if($singledata == NULL){
            return redirect('viewuser');
        }
                return view ('webtech.edituser',['singledata'=>$singledata,'data'=>$data]);
            }
}
