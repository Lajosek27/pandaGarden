<div class="panda-banner">
    <div class="panda-banner-swiper swiper">
        <div class="swiper-wrapper">
            {if $bannerLines}
                {foreach from=$bannerLines item=line }
                    {if $line}
                        <div class="panda-banner__item swiper-slide">{$line nofilter}</div>
                    {/if}
                {/foreach}
            {/if}
        </div>
    </div>
</div>