@inject('categories', 'App\Models\Category')

<div class="categories-collections py-5 bg-light">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <div class="line-dec mx-auto mb-3"></div>
            <h2 class="display-4">Browse Through Book <em>Categories</em> Here.</h2>
        </div>

        <div class="row">
            @foreach($categories::paginate(5) as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card border-0 bg-dark text-light rounded shadow-sm">
                        <div class="card-body text-center py-4">
                            <h4 class="card-title mb-0">{{$category->cat_name}}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



    </div>
</div>
