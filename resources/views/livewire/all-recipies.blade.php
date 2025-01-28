<div class='px-10 md:px-20 sm:px-30 py-3'>
    <h2 class='font-medium text-center text-[20px] my-3'>Explore More Recipes From <span class="font-bold ">RestRecipes.</span></h2>

    @php
        $all = 'all';
    @endphp
    <livewire:recipe-listing :category_id="$all" :current_recipe_id="0"/>
</div>
