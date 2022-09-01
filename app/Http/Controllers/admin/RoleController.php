<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $data = [];

    protected $limit = 10;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index(Request $request){
        $keywords = $request->keywords;
        $listRole = $this->roleService->paginate($this->limit, $keywords);
        $this->data['roles'] = $listRole;
        return View('admin.pages.role.index', $this->data);
    }

    public function delete($id=null) {
        if ($id == null)
            return false;
        $this->roleService->delete($id);
        return $id;
    }

    public function accounts(Request $request){
        $id = $request->id;
        if ($id == null)
            return false;
        $role =$this->roleService->find($id);
        dd($role->accounts()->get());
    }
}
