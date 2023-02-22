<script>
    import {_} from 'svelte-i18n';
    import {locale} from 'svelte-i18n';

    import asyncFetch from "src/services/asyncFetch.ts";

    const url = "/programguide/";

    const [programguide, loading, error, get] = asyncFetch(url);


</script>


<section class="section">
    {#if !$loading}
        <div class="container">
            {#each $programguide as pg}
                {#if pg.picture !== null && (pg.hu_files !== null || pg.stand !== null)}
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src={pg.picture} alt={pg.alt}>
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <h4>{pg.name}</h4>
                                <p class="ribbon">{pg.date}</p>
                                {#if $locale === 'hu'}
                                    <p>{pg.hu_type}</p>
                                {/if}
                                {#if $locale === 'en'}
                                    <p>{pg.en_type}</p>
                                {/if}

                                {#if pg.hu_files !== null }
                                    <a href={pg.url.concat(pg.hu_files)} target="_blank" class="card-button">
                                        {$_('programguide.button')}
                                    </a>
                                    <br>

                                {/if}
                                {#if pg.en_files !== null}
                                    <a href={pg.url.concat(pg.en_files)} target="_blank" class="card-button">
                                        {$_('programguide.button_en')}
                                    </a>
                                    <br>
                                {/if}
                                {#if pg.stand !== null}
                                    <a href={pg.url.concat(pg.stand)} target="_blank" class="card-button">
                                        {$_('programguide.button_stand')}
                                    </a>
                                    <br>
                                {/if}
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
    {#if !$loading && $programguide.length === 0}
        <div class="has-text-centered is-size-5">
            <h1>{$_('error.nodata')}</h1>
        </div>
    {/if}

</section>

<style>
    section {
        min-height: 30em;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 0.5em;
    }

    .card {
        height: max-content;
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
</style>