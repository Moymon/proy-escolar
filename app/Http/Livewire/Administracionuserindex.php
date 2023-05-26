<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

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

        return view('livewire.administracionuserindex',compact('users'));
    }
}
