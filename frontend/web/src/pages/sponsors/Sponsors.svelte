<script>
    import {_} from "svelte-i18n";
    import asyncFetch from "src/services/asyncFetch.ts";

    const url = "http://expo.localhost:8080/sponsor/getsponsor";

    const [partners, loading, error, get] = asyncFetch(url);

</script>



<section class="section">
    <div class="container">

        {#each $partners as pg}
            <div class="card">
                <div class="card-image">
                    <figure class="image is-256x256">
                        <img src={pg.logo} alt={pg.name}>
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4 class="is-size-7">{pg.name}</h4>
                        <a href={pg.website} class="card-button">
                            {$_('programguide.button')}</a>
                    </div>
                </div>
            </div>
        {/each}
    </div>

</section>

<style>
    .section{
        margin-top: 0;
        background: rgba(93, 93, 93, 0.5);
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




<!--<div class="columns is-multiline">-->
<!--    {#each partners as partner}-->
<!--    <div class="column is-one-quarter-desktop is-half-tablet">-->
<!--        <div class="card">-->
<!--            <div class="card-image">-->
<!--                <figure class="image is-256x256">-->
<!--                    <img src={partner.logo256} alt={partner.name}>-->
<!--                </figure>-->
<!--            </div>-->
<!--            <footer class="card-footer">-->
<!--                <a class="card-footer-item" href={partner.website}>-->
<!--                    {partner.name}-->
<!--                </a>-->
<!--            </footer>-->
<!--        </div>-->
<!--    </div>-->
<!--    {/each}-->
<!--</div>-->