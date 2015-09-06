<div class="subcategory-small">
    @foreach($category->children as $subCategorySmall)
        <a href="{{ route('category.show', $subCategorySmall->slug) }}"> {{ $subCategorySmall->title }}</a>
    @endforeach
</div>
<div class="subcategory">
    @foreach($category->children as $subCategory)
        <a href="{{ route('category.show', $subCategory->slug) }}"> {{ $subCategory->title }}</a>
    @endforeach
</div>
