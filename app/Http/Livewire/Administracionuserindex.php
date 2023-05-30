<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Administracionuserindex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationHome = "boostrap";

    public function render()
    {
        $users = User::where('nombre', 'LIKE', '%' . $this->search . '%')
                ->orWhere('rpe', 'LIKE', '%' . $this->search . '%')
                ->paginate();

        /*
        foreach($users as $user){
            var_dump($user->rpe);
            foreach($user->roles as $rol){
                var_dump($rol->name);
                foreach($rol->permissions as $permission){
                    var_dump($permission->name);
                }
            }
        }
        */
        
        return view('livewire.administracionuserindex',compact('users'));
    }
}
