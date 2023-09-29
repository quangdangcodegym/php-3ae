<div class="card col-3" style="width: 18rem;">
    <img src="{{ $productUrl ?? 'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'}}" class="card-img-top" alt="{{ $productAlt ?? ''}}">
    <div class="card-body">
        <h5 class="card-title">{{ $productTitle}}</h5>
        <p class="card-text">{{ $productDescription}}</p>
        <p class="card-text">{{ $formatCurrency($productPrice) }}</p>
        <a href="#" class="btn btn-primary">Add to card</a>
    </div>
</div>