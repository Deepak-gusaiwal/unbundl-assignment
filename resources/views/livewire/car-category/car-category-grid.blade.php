<div class="bg-secondary-50 py-10">

    <div class="max-w-[1300px] mx-auto p-2 ">
        <h2 class="main-heading mx-auto text-secondary-600 uppercase text-[clamp(1.5rem,2vw,2rem)]">Popular Car
            Categories</h2>

        <div class="grid md:grid-cols-4 gap-4">
            @foreach ($categories as $category)
                <a href="#" class="card">
                    <div class="imgBox">
                        <img src="{{ $category?->thumbnailImage?->getImageUrl() }}" alt="">
                    </div>
                    <h3>{{$category->title}}</h3>
                </a>
            @endforeach
        </div>

    </div>
</div>