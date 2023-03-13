<script>
    import {getContext} from 'svelte';
    import asyncGet from "src/services/asyncFetch.ts";
    import Popup from './Popup.svelte';
    import {_, locale} from 'svelte-i18n';


    const url = "/gallery/";
    const urlYears = "/gallery/getyears";
    const {open} = getContext('simple-modal');

    const [data, loading, error, get] = asyncGet(url);
    const [years, loading2, error2, get2] = asyncGet(urlYears);


</script>

<section>

    <div class="has-text-centered">


        {#if $data !== null && $data !== undefined}
            {#each $years as year}
                <div class="columns is-centered">
                    <div class="column">
                        <div class="card card-bg">

                            <div class="card-header mb-3 ">
                                <div class="card-header-title is-centered my-3">
                                    <span class="year-font">{year}</span>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="columns is-multiline is-flex-mobile is-centered mb-6">
                                    {#each $data as album}
                                        {#if year === album.year && album.imgs[0] !== undefined}
                                            <div class="column is-8-mobile is-3-tablet max-column-size is-narrow">
                                                <a on:click={()=>open(Popup,{ images: album.imgs})}>
                                                    <div class="card card-hover">

                                                        <div class="card-header bg card-header-size">
                                                            <div class="card-header-title is-centered">
                                                                {#if $locale === 'hu'}
                                                                    <span class="card-font has-text-white">{album.hu_title}</span>
                                                                {/if}
                                                                {#if $locale === 'en'}
                                                                    <span class="card-font has-text-white">{album.en_title}</span>
                                                                {/if}
                                                            </div>
                                                        </div>
                                                        <div class="card-image">
                                                            <figure class="image ">
                                                                <img class="image-size" src="{album.thumbnail}" alt="{album.alt}">
                                                            </figure>
                                                        </div>
                                                    </div>

                                                </a>
                                            </div>
                                        {/if}
                                    {/each}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            {/each}
        {:else if $loading}

            <div class="has-text-centered">
                <a class="button is-loading is-size-1 is-info is-outlined is-borderless"></a>
                <h1>Loading...</h1>
            </div>
        {/if}
        {#if !$loading && $data.length === 0}
            <div class="has-text-centered is-size-5">
                <h1>{$_('error.nodata')}</h1>
            </div>
        {/if}
    </div>

</section>

<style lang="scss">
  section {
    min-height: 30em;
    padding-top: 3rem;
    background: #F5F5F5;

  }
  .is-borderless{
    border: none;
  }

  .bg {
    background: linear-gradient(to top, #2c3e50, #333D51);
  }


  .year-font {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: bold;
    color: #0a0a0a;
    font-size: 30px;
  }

  .card-font {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: bold;
    color: #0a0a0a;
    font-size: 20px;
  }

  .card-hover:hover {
    transform: scale(1.05);
    transition: transform .5s;
  }

  .card-header {
    box-shadow: 0 0.3em 0.25em, inset 0 0.3em 0.25em;
  }

  .card-bg {
    margin-top: 0;
    margin-bottom: 0;
  }

  .card-header-size {
    height: 80px;
  }

  .image-size {
    max-height: 420px;
  }

  @media screen and (min-width: 1024px) {
    .max-column-size {
      width: 15em;
    }
  }

</style>