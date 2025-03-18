<?php

namespace App\Livewire\Postify;

use App\Models\Postify\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $postId;
    public $comments;
    public $view = false;
    public $commentsUpdate = [];
    public $updateId;
    public $viewUpdate = false;

    public $formData = [
        'content' => ''
    ];

    public function render()
    {
        $comment = Comment::where('post_id', $this->postId)->get();
        return view('livewire.postify.comments', ['comment' => $comment]);
    }

    function submit()
    {
        $this->validate([
            'formData.content' => 'required',
        ], [
            'formData.content.required' => 'El contenido es requerido',
        ]);
        $user = Auth::user()->id;
        if (!Comment::create([
            'content' => $this->formData['content'],
            'post_id' => $this->postId,
            'user_id' => $user,
        ])) {
            session()->flash('error', 'No Se Puede Crear Comentario');
            return;
        }
        session()->flash('success', 'Comentario Creado');
        $this->reset('formData');
        $this->view = false;
    }

    function delete($comment)
    {

        if (!$comment = Comment::find($comment)) {
            session()->flash('success', 'Comentario No Encontrado');
            return;
        }

        if (!$comment->delete()) {
            session()->flash('success', 'Comentario No Eliminado');
        }


        session()->flash('success', 'Comentario Eliminado');
    }

    function editar($commentId)
    {   
        
        if ($commentId == $this->updateId) {
            $this->viewUpdate = false;
            $this->updateId = 0;
            return; // Evita seguir ejecutando código innecesario
        }
        
        if (!isset($this->commentsUpdate[$commentId]) || !$this->commentsUpdate[$commentId]) {
            $this->commentsUpdate[$commentId] = true;
            $comment = Comment::find($commentId);
        
            if (!$comment) {
                $this->formData = ['content' => ''];
                return;
            }
        
            $this->formData = ['content' => $comment->content];
            $this->updateId = $commentId;
            $this->viewUpdate = true;
            return;
        }
        
        $this->commentsUpdate[$commentId] = !$this->commentsUpdate[$commentId];
        
        if (!$this->commentsUpdate[$commentId]) return;
        
        $comment = Comment::find($commentId);
        
        if (!$comment) {
            $this->formData = ['content' => ''];
            return;
        }
        $this->formData = ['content' => $comment->content];
        $this->updateId = $commentId;

    }

    function viewComment()
    {

        $this->view = !$this->view;
        $this->commentsUpdate = false;
        $this->formData = [
            'content' => '',
        ];
    }
    
    function modificar($commentId)
    {

        if (!$comment = Comment::find($commentId)) {
            session()->flash('error', 'No Se Puede Modificar');
        }

        $this->validate([
            'formData.content' => 'required',
        ], [
            'formData.content.required' => 'El contenido es requerido',
        ]);

        if (!$comment->update([
            'content' => $this->formData['content'],
        ])) {
            session()->flash('error', 'No Se pudo Actualizar');
            return;
        }
        session()->flash('success', 'Se Actualizo El Comentario');

        $this->reset('formData');
        $this->commentsUpdate[$commentId] = false;
        $this->view = false;
    }
}
