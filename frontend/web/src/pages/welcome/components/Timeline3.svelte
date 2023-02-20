<script>
    import {_, locale} from "svelte-i18n";
    import fetchData from "../../../services/asyncFetch.ts"

    const url = "/timeline/";
    const [data, loading, error, get] = fetchData(url);

</script>
{#if !$loading && $data[0] !== undefined}
    <section class="section">
        <div class="row">
            <div class="main-timeline">

                {#if $locale === 'hu'}
                    {#each $data as tl}
                        {#if tl.hu_title !== null && tl.hu_desc !== null}
                            <div class="timeline">
                                <div class="timeline-content">
                                    <div class="timeline-year">{tl.year}</div>
                                    <h3 class="title">{tl.hu_title}</h3>
                                    <p class="description">
                                        {tl.hu_desc}
                                    </p>
                                </div>
                            </div>
                        {/if}
                    {/each}
                {/if}
                {#if $locale === 'en'}
                    {#each $data as tl}
                        {#if tl.en_title !== null && tl.en_desc !== null}
                            <div class="timeline">
                                <div class="timeline-content">
                                    <div class="timeline-year">{tl.year}</div>
                                    <h3 class="title">{tl.en_title}</h3>
                                    <p class="description">
                                        {tl.en_desc}
                                    </p>
                                </div>
                            </div>
                        {/if}
                    {/each}
                {/if}
            </div>
        </div>
    </section>
{/if}
<style>

    section {
        background: rgb(148, 144, 208);
        background: linear-gradient(0deg, rgba(2, 0, 36, 1) 0%, rgb(51, 61, 81) 35%, rgb(34, 43, 61) 100%);
    }

    .timeline-year {
        color: #F4F3EA;
    }

    .title {
        color: #F4F3EA;
    }

    .description {
        color: #F4F3EA;
        text-align: justify;
    }


    .row {
        max-width: 1200px;
        margin: 2rem auto;
    }

    .main-timeline {
        font-family: "Poppins", sans-serif;
    }

    .main-timeline:after {
        content: "";
        display: block;
        clear: both;
    }

    .main-timeline .timeline {
        width: calc(50% + 58px);
        border-top: 2px solid #D3AC2B;
        float: left;
        position: relative;
        z-index: 1;
    }

    .main-timeline .timeline a {
        text-decoration: none;
    }

    .main-timeline .timeline:before {
        content: "";
        background: #ffffff;
        width: 10px;
        height: 10px;
        border-radius: 50px;
        position: absolute;
        top: -5px;
        right: 0;
    }

    .main-timeline .timeline-content {
        color: #404247;
        text-align: center;
        padding: 15px 80px 15px 10px;
        display: block;
        position: relative;
    }

    .main-timeline .timeline-content:hover {
        text-decoration: none;
    }

    .main-timeline .timeline-content:before {
        content: "";
        background: #262c44;
        width: 15px;
        height: 100%;
        position: absolute;
        top: 0;
        right: 50px;
    }

    .main-timeline .timeline-year {
        font-size: 35px;
        line-height: 35px;
        font-weight: 700;
        transform: translateY(-50%) rotate(90deg);
        position: absolute;
        top: 50%;
        right: -15px;
    }

    .main-timeline .title {
        font-size: 22px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin: 0 0 8px;
    }

    .main-timeline .description {
        font-size: 16px;
        margin: 0;
    }

    .main-timeline .timeline:nth-child(even) {
        float: right;
    }

    .main-timeline .timeline:nth-child(even):before {
        right: auto;
        left: 0;
    }

    .main-timeline .timeline:nth-child(even) .timeline-content {
        padding: 15px 10px 15px 80px;
    }

    .main-timeline .timeline:nth-child(even) .timeline-content:before {
        right: auto;
        left: 51px;
    }

    .main-timeline .timeline:nth-child(even) .timeline-year {
        right: auto;
        left: -15px;
    }

    .main-timeline .timeline:nth-child(4n+2) .timeline-content:before {
        background: #D3AC2B;
    }

    .main-timeline .timeline:nth-child(4n+3) .timeline-content:before {
        background: #F4F3EA;

    }

    .main-timeline .timeline:nth-child(4n+4) .timeline-content:before {
        background: #f82249;
    }

    @media screen and (max-width: 767px) {
        .main-timeline .timeline {
            width: 100%;
        }
    }
</style>