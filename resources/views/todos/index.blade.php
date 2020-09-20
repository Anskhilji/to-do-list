@extends('todos.layouts')

@section('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2xl">All your todos list</h1>
        <a href="{{route('todo.create')}}" class="mx-5 py-2 px-1 text-blue-400 text-white "><i class="fas fa-plus-circle    "></i></a>
    </div>    
        <ul class="my-5">
<x-alert/>
           
            @forelse ($get_todo as $todo)
                <li class="flex justify-between p-2">
                    <div>
                        @include('todos.complete-button')
                    </div>
                    @if ($todo->completed)
                        <p class="line-through">{{$todo->title}}</p>
                        @else
                <a class="curson-pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
                    @endif
                    <div>
                        <a href="{{route('todo.edit',$todo->id)}}"><i class="fas fa-pen text-orange-400 px-2 "></i>
                        </a>

                        <i class="fas fa-times text-red-500 px-2 cursor-pointer" 
                        onclick="event.preventDefault();
                        if(confirm('Are you realy want to delete?')){
                        document.getElementById('form-delete-{{$todo->id}}')
                        .submit()}">
                        </i>

                        <form id="{{'form-delete-'.$todo->id}}" method="POST" style="display: none;" action="{{route('todo.destroy', $todo->id)}}">
                            @csrf
                            @method('delete')
                        </form>
                    </div>

                </li>
            @empty
           <p>No task available, create one.</p>   
            @endforelse
         
        </ul>
@endsection

