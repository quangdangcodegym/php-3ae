<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Product extends Component
{
    public $productUrl;
    public $productTitle;
    public $productDescription;
    public $productAlt;
    public $productPrice;
    /**
     * Create a new component instance.
     */

    public function __construct(
        $productUrl = null,
        $productTitle = null,
        $productDescription = null,
        $productAlt = null,
        $productPrice = null
    ) {
        $this->productUrl = $productUrl;
        $this->productTitle = $productTitle;
        $this->productDescription = $productDescription;
        $this->productAlt = $productAlt;
        $this->productPrice = $productPrice;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product');
    }
    public function formatCurrency($price)
    {
        return number_format($price);
    }
}
