<div>
    @if (Request::is('all/products') || Request::is('livewire/update'))
        @include('components.search-component')
    @endif
    <div class="grid grid-cols-2 lg:grid-cols-4 sm:grid-cols-2 md:grid-cols-3 gap-3">
        @if (count($recipes)> 0)
            @foreach ($recipes as $recipe)
                <livewire:item-card lazy :recipe_details="$recipe" wire:key="{{$recipe->id}}"/>
            @endforeach
        @else
            <h2 class="text-2xl text-gray-300">No Recipe Available</h2>
        @endif

    </div>
</div>

