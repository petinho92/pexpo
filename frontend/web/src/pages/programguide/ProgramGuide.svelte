<script>
    import {programguide} from "./data/pguide.ts";
    import Footer from 'src/components/Footer.svelte';
    import {_} from 'svelte-i18n';
    import {locale} from 'svelte-i18n';

</script>


<section class="section">
    <div class="container">
        {#each programguide as pg}
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src={pg.thumb} alt={pg.alt}>
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4>{pg.head}</h4>
                        <p class="ribbon">{pg.date}</p>
                        {#if $locale === 'hu'}
                            <p>{pg.type}</p>
                        {/if}
                        {#if $locale === 'en'}
                            <p>{pg.type_en}</p>
                        {/if}

                        <a href={pg.path} class="card-button">
                            {$_('programguide.button')}
                        </a>
                        <br>
                        {#if (pg.path_en !== "")}
                            <a href={pg.path_en} class="card-button">
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