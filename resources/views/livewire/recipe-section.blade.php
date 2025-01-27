<div class='px-10 md:px-20 sm:px-30 py-3'>
    <!-- Brand New  -->
   @include('components.navigation.view-all',[
       'Category' => 'Latest Recipes.'
   ])
   <livewire:recipe-listing :category_id="2" :current_recipe_id="0"/>


   @include('components.navigation.view-all',[
       'Category' => 'Flour Recipes.'
   ])
   <livewire:recipe-listing :category_id="4" :current_recipe_id="0"/>

  
   @include('components.navigation.view-all',[
       'Category' => 'Soups.'
   ])
   <livewire:recipe-listing :category_id="5" :current_recipe_id="0"/>

</div>
