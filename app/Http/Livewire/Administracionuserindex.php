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
        $roles = Role::all();

        $users = User::where('nombre', 'LIKE', '%' . $this->search . '%')
                ->orWhere('rpe', 'LIKE', '%' . $this->search . '%')
                ->paginate();
        $roles = Role::all();
        return view('livewire.administracionuserindex',compact('users', 'roles'));
    }
}
