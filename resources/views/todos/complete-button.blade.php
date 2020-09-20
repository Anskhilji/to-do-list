@if($todo->completed)
        <i onclick="event.preventDefault();
        document.getElementById('form-incomplete-{{$todo->id}}').submit()"
        class="fas fa-check cursor-pointer text-green-400 px-2"></i>
        <form id="{{'form-incomplete-'.$todo->id}}" method="POST" style="display: none;" action="{{route('todo.incomplete', $todo->id)}}">
            @csrf
            @method('delete')
        </form>
        @else
            <i onclick="event.preventDefault();
            document.getElementById('form-complete-{{$todo->id}}')
            .submit()" 
            class="fas fa-check text-gray-300 cursor-pointer px-2">
            </i>
        <form id="{{'form-complete-'.$todo->id}}" method="POST" style="display: none;" action="{{route('todo.complete', $todo->id)}}">
        @csrf
            @method('put')
        </form>
@endif