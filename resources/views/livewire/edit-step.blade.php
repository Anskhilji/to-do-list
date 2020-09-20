<div>
    <div class="flex justify-center px-4">
        <h1 class="text-2xl">Add steps for task</h1>
            <i wire:click="increment" class="fas fa-plus px-2 py-3 cursor-pointer"></i>
        </div>
        @foreach ($steps as $step)
    <div class="flex justify-center py-2" wire:key="{{$loop->index}}">
        <input type="text" name="stepName[]" value="{{$step['name']}}" placeholder="{{'Describe Step '. ($loop->index+1)}}" class="py-2 px-2 border rounded">
        <input type="hidden" name="stepId[]" value="{{$step['id']}}">
            <i class="fas fa-times text-red-400 py-3 px-1 cursor-pointer" wire:click="remove({{$loop->index}})"></i>
        </div>
        @endforeach


</div>
