<div class="header-top__block header-top__block--cart col flex-grow-0">
    <div class="js-blockcart blockcart cart-preview dropdown" data-refresh-url="{$refresh_url}">
      <a href="#" role="button" id="cartDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="header-top__link d-lg-block d-none">
        <div class="header-top__icon-container">
          <span class="header-top__icon material-icons">

            <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.04169 2.04169H6.20835L9.00002 15.9896C9.09528 16.4692 9.35618 16.9 9.73705 17.2066C10.1179 17.5132 10.5945 17.6761 11.0834 17.6667H21.2084C21.6972 17.6761 22.1738 17.5132 22.5547 17.2066C22.9355 16.9 23.1964 16.4692 23.2917 15.9896L24.9584 7.25002H7.25002M11.4167 22.875C11.4167 23.4503 10.9503 23.9167 10.375 23.9167C9.79972 23.9167 9.33335 23.4503 9.33335 22.875C9.33335 22.2997 9.79972 21.8334 10.375 21.8334C10.9503 21.8334 11.4167 22.2997 11.4167 22.875ZM22.875 22.875C22.875 23.4503 22.4087 23.9167 21.8334 23.9167C21.2581 23.9167 20.7917 23.4503 20.7917 22.875C20.7917 22.2997 21.2581 21.8334 21.8334 21.8334C22.4087 21.8334 22.875 22.2997 22.875 22.875Z" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
          </span>
          <span class="header-top__badge {if $cart.products_count > 9}header-top__badge--smaller{/if}">
            {$cart.products_count}
          </span>
        </div>
      </a>
      <a href="{$cart_url}" class="d-flex d-lg-none header-top__link">
        <div class="header-top__icon-container">
          <span class="header-top__icon material-icons">
            <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.04169 2.04169H6.20835L9.00002 15.9896C9.09528 16.4692 9.35618 16.9 9.73705 17.2066C10.1179 17.5132 10.5945 17.6761 11.0834 17.6667H21.2084C21.6972 17.6761 22.1738 17.5132 22.5547 17.2066C22.9355 16.9 23.1964 16.4692 23.2917 15.9896L24.9584 7.25002H7.25002M11.4167 22.875C11.4167 23.4503 10.9503 23.9167 10.375 23.9167C9.79972 23.9167 9.33335 23.4503 9.33335 22.875C9.33335 22.2997 9.79972 21.8334 10.375 21.8334C10.9503 21.8334 11.4167 22.2997 11.4167 22.875ZM22.875 22.875C22.875 23.4503 22.4087 23.9167 21.8334 23.9167C21.2581 23.9167 20.7917 23.4503 20.7917 22.875C20.7917 22.2997 21.2581 21.8334 21.8334 21.8334C22.4087 21.8334 22.875 22.2997 22.875 22.875Z" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
          </span>
          <span class="header-top__badge {if $cart.products_count > 9}header-top__badge--smaller{/if}">
            {$cart.products_count}
          </span>
        </div>
      </a>
      <div class="dropdown-menu blockcart__dropdown cart-dropdown dropdown-menu-right" aria-labelledby="cartDropdown">
        <div class="cart-dropdown__content keep-open js-cart__card-body cart__card-body">
          <div class="cart-loader">
            <div class="spinner-border text-primary" role="status"><span
                class="sr-only">{l s='Loading...' d='Shop.Theme.Global'}</span></div>
          </div>
          <div class="cart-dropdown__title d-flex align-items-center mb-3">
            <p class="h5 mb-0 mr-2">
              {l s='Your cart' d='Modules.Isshoppingcart.Isshoppingcart'}
            </p>
            <a data-toggle="dropdown" href="#" class="cart-dropdown__close dropdown-close ml-auto cursor-pointer text-decoration-none">
              <i class="material-icons d-block">close</i>
            </a>
          </div>
          {if $cart.products_count > 0}
            <div class="cart-dropdown__products pt-3 mb-3">
              {foreach from=$cart.products item=product}
                {include 'module:is_shoppingcart/views/templates/front/is_shoppingcart-product-line.tpl' product=$product}
              {/foreach}
            </div>
  
            <div class="cart-summary-line cart-total">
              <span class="label">{$cart.totals.total.label}</span>
              <span class="value">{$cart.totals.total.value}</span>
            </div>
  
            <div class="mt-3">
              <a href="{$cart_url}" class="btn btn-sm btn-primary btn-block dropdown-close">
                {l s='Proceed to checkout' d='Shop.Theme.Actions'}
              </a>
            </div>
  
          {else}
            <div class="alert alert-warning">
              {l s='Unfortunately your basket is empty' d='Modules.Isshoppingcart.Isshoppingcart'}
            </div>
          {/if}
        </div>
      </div>
    </div>
  </div>
  