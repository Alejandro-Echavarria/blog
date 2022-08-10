<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;
    public $page = 1;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    public function updatingSearch(){

        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('id', 'LIKE', '%'. $this->search . '%')
                       ->orWhere('name', 'LIKE', '%'. $this->search . '%')
                       ->orWhere('email', 'LIKE', '%'. $this->search . '%')
                       ->paginate(10);

        return view('livewire.admin.users-index', compact('users'));
    }
}
