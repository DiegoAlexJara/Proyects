<?php

namespace App\Livewire\Comics\User;

use App\Models\Comics\CommentTienda;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function Laravel\Prompts\error;

class Comments extends Component
{
    public $comment;
    public $viewComment = false;


    public function render()
    {

        $user = Auth::user()->id;
        $comments = CommentTienda::where('user_id', $user)->get();

        return view('livewire.comics.user.comments', [
            'comments' => $comments,
        ]);
    }

    function submit()
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Debes estar autenticado para comentar.');
        }

        // Obtén el usuario autenticado
        $user = Auth::user(); // No necesitas buscarlo nuevamente

        // Crea una nueva instancia de Comment
        $comment = new CommentTienda(); // Usa 'Comment' con 'C' mayúscula
        $comment->user_id = $user->id; // Directamente usa el ID del usuario autenticado
        $comment->comment = $this->comment; // Suponiendo que $this->comment contiene el comentario
        $comment->save();
        $this->comment = '';
        $this->render();
    }
    function comments()
    {
        $this->viewComment = !$this->viewComment;
    }

    function delete($commentId){
        $comment = CommentTienda::find($commentId);

        if(!$comment) return error(404);
        
        $comment->delete();
        $this->render();
    }
}
