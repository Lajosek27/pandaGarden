<!-- search -->
<div class="col flex-grow-0 header-top__block header-top__block--search">
    <a
    class="header-top__link"
    rel="nofollow"
    href="#"
  >
    <div class="header-top__icon-container">
        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.875 21.875L17.3437 17.3437M19.7917 11.4583C19.7917 16.0607 16.0607 19.7917 11.4583 19.7917C6.85596 19.7917 3.125 16.0607 3.125 11.4583C3.125 6.85596 6.85596 3.125 11.4583 3.125C16.0607 3.125 19.7917 6.85596 19.7917 11.4583Z" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
   
  </a>
</div>
<!-- wishlist -->
<div class="col flex-grow-0 header-top__block header-top__block--fav">
    <a
      class="header-top__link"
      rel="nofollow"
      href="{$urls.pages.authentication}?back={$urls.current_url|urlencode}"
    >
      <div class="header-top__icon-container">
        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.7083 4.80209C21.1763 4.26981 20.5446 3.84756 19.8493 3.55947C19.154 3.27139 18.4088 3.12311 17.6562 3.12311C16.9036 3.12311 16.1584 3.27139 15.4632 3.55947C14.7679 3.84756 14.1362 4.26981 13.6041 4.80209L12.5 5.90626L11.3958 4.80209C10.3211 3.72741 8.86356 3.12366 7.34373 3.12366C5.82391 3.12366 4.36633 3.72741 3.29165 4.80209C2.21697 5.87677 1.61322 7.33435 1.61322 8.85418C1.61322 10.374 2.21697 11.8316 3.29165 12.9063L12.5 22.1146L21.7083 12.9063C22.2406 12.3742 22.6628 11.7425 22.9509 11.0473C23.239 10.352 23.3873 9.60677 23.3873 8.85418C23.3873 8.10158 23.239 7.35637 22.9509 6.6611C22.6628 5.96583 22.2406 5.33413 21.7083 4.80209Z" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
      </div>
     
    </a>
  </div>
  <!-- customer account -->
<div class="col flex-grow-0 header-top__block header-top__block--user">
    <a
      class="header-top__link"
      rel="nofollow"
      href="{$urls.pages.authentication}?back={$urls.current_url|urlencode}"
      {if $logged}
        title="{l s='View my customer account' d='Shop.Theme.Customeraccount'}"
      {else}
        title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}"
      {/if}
    >
      <div class="header-top__icon-container">
        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.8334 21.875V19.7917C20.8334 18.6866 20.3944 17.6268 19.613 16.8454C18.8316 16.064 17.7718 15.625 16.6667 15.625H8.33335C7.22829 15.625 6.16848 16.064 5.38708 16.8454C4.60567 17.6268 4.16669 18.6866 4.16669 19.7917V21.875M16.6667 7.29167C16.6667 9.59285 14.8012 11.4583 12.5 11.4583C10.1988 11.4583 8.33335 9.59285 8.33335 7.29167C8.33335 4.99048 10.1988 3.125 12.5 3.125C14.8012 3.125 16.6667 4.99048 16.6667 7.29167Z" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
      </div>
      
    </a>
  </div>
