<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Session;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function viewRole()
    {
        $roles= $this->role::all();
        return view('webtech.role', ['roles' => $roles]);
    }
    public function viewUser()
    {
       $data=User::latest()->get();
       $data->transform(function($data){
        $data->role = $data->getRoleNames()->first();
        $data->userPermissions = $data->getPermissionNames();
        return $data;
    });
        return view('webtech.viewuser',['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addRole()
    {
        $permission= Permission::all();
        return view('webtech.addrole',['permission' => $permission]);
    }
    public function profileupdate()
    {
        return view('webtech.profile-update');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles',
            'permissions' => 'nullable'
        ]);
        $role = $this->role->create([
            'name' => $request->name
        ]);
        if($request->has("permissions")){
            $role->givePermissionTo($request->permissions);
        }
          session::flash('messages','Role added successfully');
        return redirect()->back();
    }
    public function getAll(){
        $roles = $this->role->all();
        return response()->json([
            'roles' => $roles
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     * 
     * 
     */
    public function updateRole(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string|unique:roles,name,'.$id
        ]);
        $role = $this->role::findOrFail($id);
        $role->name=$request->name;   
        if($request->has('permissions')){
            foreach($role->permissions as $permssion){
                $role->revokePermissionTo($permssion);
            }
            $role->givePermissionTo($request->permissions);
        }
$role->save();
  session::flash('messages','Role updated successfully');
        return redirect()->back();
       
    }
    public function show($id)
    {
        //
    }
    public function editRole($id){
        $singledata = $this->role->where('id',$id)->first();
        // $singledata->transform(function($singledata){
        //     $singledata->role = $singledata->getRoleNames()->first();
        //     $singledata->userPermissions = $singledata->getPermissionNames();
        //     return $singledata;
        // });
        if($singledata == NULL){
            return redirect('viewuser');
        }
        $permissio= Permission::all();
                return view ('webtech.editrole',['singledata'=>$singledata,'permissio'=>$permissio]);
            }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deleteRole($id){
        $role = $this->role::find($id);
        $role->delete();
        session::flash('message','Data deleted successfully');
        // return redirect()->back();
            }
}
