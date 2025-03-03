<div class="product-miniature__actions">
    {if $product.add_to_cart_url && ($product.quantity > 0 || $product.allow_oosp) && !$configuration.is_catalog}
        <form class="product-miniature__form" action="{$product.add_to_cart_url}" method="post">
          <input type="hidden" name="id_product" value="{$product.id}">
          <input
            type="hidden"
            name="qty"
            value="{if isset($product.product_attribute_minimal_quantity) && $product.product_attribute_minimal_quantity != ''}{$product.product_attribute_minimal_quantity}{else}{$product.minimal_quantity}{/if}"
            class="form-control input-qty"
          >
          <button
            class="btn  add-to-cart"
            data-button-action="add-to-cart"
            type="submit"
            {if !$product.add_to_cart_url}
                disabled
            {/if}
          >
            <img src="{$urls.theme_assets}img/shopping-cart-white.png" alt="shopping-cart">
          </button>
      </form>
    {else}
        <a href="{$product.canonical_url}"
           class="btn btn-secondary btn-block"
        > {l s='View' d='Shop.Theme.Actions'}
        </a>
    {/if}

    {block name='quick_view'}
      <a class="quick-view product-miniature__functional-btn btn btn-light shadow rounded-circle" href="#" data-link-action="quickview">
        <span class="material-icons product-miniature__functional-btn-icon">visibility</span>
      </a>
    {/block}
    {block name='product_reviews'}
    {hook h='displayProductListReviews' product=$product}
  {/block}
</div>