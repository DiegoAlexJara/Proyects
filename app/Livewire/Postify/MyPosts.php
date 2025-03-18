<?php

namespace App\Livewire\Postify;

use App\Models\Postify\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyPosts extends Component
{
    public $update = false;
    public $viewUpdate = false;
    public $view = false;
    public $updatePost = [];
    public $userId;
    public $updateId = 0;
    

    public $formData = [
        'content' => '',
        'title' => ''
    ];



    public function render()
    {
        if (!empty($this->userId)) {
            $posts = Post::where('user_id', $this->userId)->orderBy('created_at', 'desc')->get();
        } else {
            $posts = Post::orderBy('created_at', 'desc')->get();
        }
        return view('livewire.postify.my-posts', ['posts' => $posts]);
    }

    function viewCreate()
    {
        $this->view = !$this->view;
        $this->reset('formData');
        $this->update = false;
    }

    function submit()
    {

        $this->validate([
            'formData.content' => 'required',
            'formData.title' => 'required',
        ], [
            'formData.content.required' => 'El contenido es requerido',
            'formData.title.required' => 'El titulo es requerido',
        ]);
        if (!Post::create([
            "content" => $this->formData['content'],
            "user_id" => Auth::id(),
            "title" => $this->formData['title']
        ])) {
            session()->flash('message', 'Error Al Crear Publicacion');
            return;
        }

        session()->flash('message', 'Publicacion Creada');

        $this->reset('formData');
        $this->view = false;
        // $this->update = false;
        $this->render();
    }

    function delete($postId)
    {
        $post = Post::find($postId);

        if (!$post->delete()) {
            session()->flash('message', 'Publicacion No Eliminada');
            return;
        }
        session()->flash('message', 'Publicacion Eliminada');
        return redirect()->route('postify_Inicio');
    }

    function toggleUpdate($id)
    {
        if ($id == $this->updateId) {
            $this->viewUpdate = false;
            $this->updateId = 0;
            return; // Evita seguir ejecutando código innecesario
        }
        
        // Verificar si ya está en actualización
        if (!isset($this->update[$id]) || !$this->update[$id]) {
            $this->update[$id] = true;
        
            $post = Post::find($id);
        
            if (!$post) {
                $this->formData = [
                    'content' => '',
                    'title' => ''
                ];
            } else {
                $this->formData = [
                    'content' => $post->content,
                    'title' => $post->title
                ];
            }
        
            $this->updateId = $id;
            $this->viewUpdate = true;
            return;
        }
        
        // Alternar la actualización
        $this->update[$id] = !$this->update[$id];
        
        // Si ya no está en actualización, salir
        if (!$this->update[$id]) {
            return;
        }
        
        // Cargar datos solo si el post existe
        $post = Post::find($id);
        
        $this->formData = $post ? [
            'content' => $post->content,
            'title' => $post->title
        ] : [
            'content' => '',
            'title' => ''
        ];
        
        $this->updateId = $id;
    }

    function ActualizarPost($id)
    {

        $post = Post::find($id);
        $validacion = $this->validate([
            'formData.content' => 'required',
            'formData.title' => 'required',
        ], [
            'formData.content.required' => 'El contenido es requerido',
            'formData.title.required' => 'El titulo es requerido',
        ]);

        if (!$post->update([
            'content' => $this->formData['content'],
            'title' => $this->formData['title'],
        ])) {
            session()->flash('message', 'No Se pudo Actualizar');
            return;
        }

        session()->flash('message', 'Se Actualizo La publicacion');

        $this->reset('formData');
        $this->update = false;
        $this->view = false;
        $this->render();
    }

}
