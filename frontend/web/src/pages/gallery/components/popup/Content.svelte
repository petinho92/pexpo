<script>
    import {getContext} from 'svelte';
    import asyncGet from "src/services/asyncFetch.ts";
    import Popup from './Popup.svelte';

    const url = "/gallery/getcollection/getall";
    const urlYears = "/gallery/getyears";
    const domain = "";
    const {open} = getContext('simple-modal');

    const [data, loading, error, get] = asyncGet(url);
    const [years, loading2, error2, get2] = asyncGet(urlYears);
    $: console.log(years);


</script>

<section>

    <div class="has-text-centered">


        {#if $data !== (null || undefined)}
            {#each $years as year}
                <div class="columns is-centered">
                    <div class="column">
                        <div class="card card-bg">

                            <div class="card-header mb-3 ">
                                <div class="card-header-title is-centered my-3">
                                    <h1>{year}</h1>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="columns is-multiline is-flex-mobile is-centered mb-6">
                                    {#each $data as album}
                                        {#if year === album.year}
                                            <div class="column is-8-mobile is-one-fifth-desktop is-narrow">
                                                <a on:click={()=>open(Popup,{urlPrefix: album.url, images: album.imgs})}>
                                                    <div class="card card-hover">

                                                        <div class="card-header bg card-header-size">
                                                            <div class="card-header-title is-centered">
                                                                <h2 class="has-text-white">{album.alt}</h2>
                                                            </div>
                                                        </div>
                                                        <div class="card-image">
                                                            <figure class="image ">
                                                                <img class="image-size" src="{album.thumbnail}">
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

        {/if}
    </div>

</section>

<style lang="scss">
    section {
    }

    .bg {
        background: linear-gradient(to top, #2c3e50, #333D51);
    }


    h1 {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: bold;
        color: #0a0a0a;
        font-size: 30px;
    }

    h2 {
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
    .card-bg{
      margin-top: 0;
      margin-bottom: 0;
    }

    .card-header-size{
      height: 80px;
    }

    .image-size{
      max-height: 400px;
    }





</style>