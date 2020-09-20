@extends('todos.layouts')

@section('content')

<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl ">Edit Todo List</h1>
<a href="{{route('todo.index')}}" class="mx-5 py-2 text-gray-400">
    <i class="fas fa-arrow-left"></i>
</a>

</div>
<x-alert/>
<form action="{{route('todo.update', $todo->id)}}" method="POST" class="py-5">
    @csrf
    @method('patch')
    <div class="py-1">
        <input type="text" name="title" value="{{$todo->title}}"  placeholder="Title" class="py-2 px-2 border rounded">
      </div>
      <div class="py-1">
      <textarea name="description" cols="23" placeholder="Description" class="border p-2 rounded border">{{$todo->description}}</textarea>
      </div>
      <div class="py-2">
        @livewire('edit-step',['steps' => $todo->steps])
      </div>
    <input type="submit" value="Update" class="p-2 border rounded">
</form>



@endsection