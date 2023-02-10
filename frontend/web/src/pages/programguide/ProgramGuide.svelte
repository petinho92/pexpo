<script>
    import {_} from 'svelte-i18n';
    import {locale} from 'svelte-i18n';

    import asyncFetch from "src/services/asyncFetch.ts";

    const url = "http://expo.localhost:8080/programguide/getguide";
    const domain = "http://expo.localhost:8080"

    const [programguide, loading, error, get] = asyncFetch(url);


</script>


<section class="section">
    <div class="container">
        {#each $programguide as pg}
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src={domain.concat(pg.url.concat(pg.picture))} alt={pg.alt}>
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

                        <a href={domain.concat(pg.url.concat(pg.hu_files))} class="card-button">
                            {$_('programguide.button')}
                        </a>
                        <br>
                        {#if (pg.path_en !== "")}
                            <a href={domain.concat(pg.url.concat(pg.en_files))} class="card-button">
                                {$_('programguide.button_en')}
                            </a>
                        {/if}
                    </div>


                </div>
            </div>
        {/each}
    </div>

</section>

<style>
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