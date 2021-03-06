@extends('todos.layouts')

@section('content')

  <div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl">What next you need TO-DO</h1>
    
    <a href="{{route('todo.index')}}" class="mx-5 py-2  text-gray-400  ">
        <i class="fas fa-arrow-left"></i>
    </a>
  </div>
        <x-alert/>
<form action="{{route('todo.store')}}" method="POST" class="py-5">
            @csrf
            <div class="py-1">
              <input type="text" name="title" placeholder="Title" class="py-2 px-2 border rounded">
            </div>
            <div class="py-1">
              <textarea name="description" cols="23" placeholder="Description" class="border p-2 rounded border"></textarea>
            </div>
            
            <div class="py-2">
                  @livewire('step')
            </div>

            <div class="py-1">
              <input type="submit" value="create" class="p-2 border rounded">
            </div>

          </form>


@endsection