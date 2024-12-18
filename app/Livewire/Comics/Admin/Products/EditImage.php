<?php

namespace App\Livewire\Comics\Admin\Products;

use App\Models\Comics\Product;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditImage extends Component
{
    use WithFileUploads;

    public $oldImage;
    public $image;
    public $IdUser;
    public $model;

    public function mount()
    {
        
        $this->IdUser = $this->model::find($this->IdUser);
        $this->oldImage = $this->IdUser->path;
        
    }
    
    public function render()
    {
        return view('livewire.comics.admin.products.edit-image');
    }
    public function updateImage()
    {
        $this->validate([
            'image' => 'image|mimes:jpg,png', // Validar la nueva imagen
        ]);
        // Validar si existe una imagen subida
        if ($this->image) {
            // Generar un nombre único para la nueva imagen
            $newImageName = time() . '.' . $this->image->getClientOriginalExtension();

            // Almacenar temporalmente en 'storage/app/public/temp'
            $tempPath = $this->image->storeAs('temp', $newImageName, 'public');

            // Ruta completa del archivo en el sistema de almacenamiento
            $absoluteTempPath = storage_path('app/public/' . $tempPath);

            // Mover la imagen desde 'storage/app/public/temp' a 'public/images'
            if (file_exists($absoluteTempPath)) {
                if (rename($absoluteTempPath, public_path('img/comic/products' . $newImageName))) {
                    // Eliminar la imagen anterior si existe
                    if ($this->oldImage) {
                        $this->deleteOldImage();
                    }

                    // Actualizar la ruta en el modelo
                    $this->IdUser->path = 'img/comic/products' . $newImageName;
                    $this->IdUser->save();
                    $this->oldImage = 'img/comic/products'.$newImageName;

                    session()->flash('success', 'Imagen subida y actualizada correctamente.');
                    $this->dispatch("editar-imagen"); 
                    $this->render();
                } else {
                    session()->flash('error', 'No se pudo mover la nueva imagen.');
                    $this->render();
                }
            } else {
                session()->flash('error', 'No se encontró el archivo temporal.');
                $this->render();
            }
        } else {
            session()->flash('error', 'No se seleccionó ninguna imagen.');
            $this->render();
        }
        $this->image = null;

    }
    public function deleteOldImage()
    {
        // Obtener la ruta absoluta de la imagen anterior
        $oldImagePath = public_path($this->oldImage);

        if (file_exists($oldImagePath)) {
            try {
                unlink($oldImagePath); // Eliminar la imagen anterior
            } catch (\Exception $e) {
                session()->flash('error', 'Error al eliminar la imagen: ' . $e->getMessage());
            }
        } else {
            session()->flash('error', 'La imagen anterior no existe: ' . $this->oldImage);
        }
    }
}
