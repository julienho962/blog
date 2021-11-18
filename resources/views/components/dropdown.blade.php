@props(['trigger'])

<div x-data="{show: false}" @click.away="show = false" >
    {{-- Trigger --}}
    <div @click="show= !show">
        {{$trigger}}
    </div>
    {{-- Links --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 overflow-auto max-h-40 mt-2 rounded-xl w-full text-left z-50" style="display: none">
        
        {{$slot}}
       </div>
</div>
