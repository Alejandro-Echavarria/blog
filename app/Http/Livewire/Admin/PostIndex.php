<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostIndex extends Component
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
        $posts = Post::where('user_id', auth()->user()->id)
                     ->where('name', 'LIKE', '%'. $this->search . '%')
                     ->latest('id')
                     ->paginate(10);

        return view('livewire.admin.post-index', compact('posts'));
    }
}
