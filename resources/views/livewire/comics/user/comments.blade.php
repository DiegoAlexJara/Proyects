<div>
    <form wire:submit.prevent='submit'>
        <textarea wire:model='comment' placeholder="Tu comentario" required></textarea>
        <button type="submit">COMENTAR</button>
    </form>

    <button wire:click='comments'>Mis Comentarios</button>
    {{-- @if ($viewComment)

        @if ($comments && $comments->count())
            @foreach ($comments as $comment)
                <div class="comment" style="border: .4px solid black; width: 30%; margin:10px; text-align: center">
                    <strong>{{ $comment->user->name }}</strong>
                    <p>{{ $comment->comment }}</p>
                    <button wire:click='delete({{$comment->id}})' style="margin: 4px;">ELIMINAR</button>
                </div>
            @endforeach
        @else
            <p>No hay comentarios disponibles.</p>
        @endif


    @endif --}}
</div>
