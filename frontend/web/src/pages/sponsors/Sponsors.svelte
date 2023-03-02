<script>
    import {_} from "svelte-i18n";
    import asyncFetch from "src/services/asyncFetch.ts";

    const url = "/sponsor/";

    const [partners, loading, error, get] = asyncFetch(url);

</script>


<section class="section">
    {#if !$loading}

        <div class="container">

            {#each $partners as pg}
                {#if pg.logo !== null}
                    <div class="card has-text-centered">

                        <div class="card-image">
                            <figure class="image is-5by4 m-4">
                                <img src={pg.logo} alt={pg.name}>

                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content sponsor-name">
                                <h4 class="is-size-6">{pg.name.toUpperCase()}</h4>

                            </div>
                            <div class="content">
                                <a href={pg.website} class="card-button">
                                    {$_('sponsors.button')}</a>
                            </div>
                        </div>
                    </div>
                {/if}
            {/each}

        </div>
    {:else if $loading}
        <div class="has-text-centered is-size-5">
            <h1>Loading...</h1>
        </div>
    {/if}
    {#if !$loading && $partners.length === 0}
        <div class="has-text-centered is-size-5">
            <h1>{$_('error.nodata')}</h1>
        </div>
    {/if}

</section>

<style>
    .section {
        margin-top: 0;
        min-height: 30em;
        background: #F5F5F5;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 0.5em;
    }


    .card-button {
        display: flex;
        justify-content: center;
        padding: 10px 0;
        width: 100%;
        background-color: #1F487E;
        color: #fff;
        border-radius: 8px;
    }

    .card-button:hover {
        text-decoration: none;
        background-color: #1D3461;
        color: #fff;

    }
    .sponsor-name{
        min-height: 80px;
    }



</style>

