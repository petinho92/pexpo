<script lang="ts">
    import asyncGet from "src/services/asyncFetch.ts";
    import {locale, _} from "svelte-i18n";

    const contacturl = 'contact/';
    const sectionurlhu = 'contact/category/hu';
    const sectionurlen = 'contact/category/en';

    const [data, loading, error, get] = asyncGet(contacturl);
    const [category_hu, loading2, error2, get2] = asyncGet(sectionurlhu);
    const [category_en, loading3, error3, get3] = asyncGet(sectionurlen);

    $: console.log($data)
</script>

<section>
    {#if $data !== null && $data !== undefined}
        {#if $locale === 'hu'}
            {#each $category_hu as category}
                <div class="card">
                    <div class="card-header mb-3 ">
                        <div class="card-header-title is-centered my-3">
                            <span class="year-font">{category}</span>
                        </div>
                    </div>
                    <div class="container-component">
                        <ul class="cards-component">
                            {#each $data as person}
                                {#if category === person.hu_section}
                                    <li>
                                        {#if person.thumbnail === null}
                                            <img src="/~web/images/profile.jpg"/>
                                        {:else}
                                            <img src={person.thumbnail}/>
                                        {/if}
                                        <div class="details-component">
                                            <span class="name-label"><i class="fas fa-user"></i> {person.hu_name}</span>
                                            <!--                                        <span class="title-label"><i-->
                                            <!--                                                class="fas fa-list-alt"></i> {person.hu_major}</span>-->
                                            <a class="email-label" href="mailto:{person.email}">
                                                <i class="fas fa-envelope"></i> {person.email}</a>
                                            {#if person.telephone !== null | undefined | ""}
                                                <a class="phone-label" href="tel:{person.telephone}">
                                                    <i class="fas fa-phone-square-alt"></i>
                                                    {person.telephone}
                                                </a>
                                            {/if}
                                            {#if person.mobile !== null | undefined | ""}
                                                <a class="phone-label" href="tel:{person.mobile}">
                                                    <i class="fas fa-mobile"></i>
                                                    {person.mobile}
                                                </a>
                                            {/if}
                                        </div>
                                    </li>
                                {/if}
                            {/each}
                        </ul>
                    </div>
                </div>
            {/each}
        {:else if $locale === 'en'}
            {#each $category_en as category}
                <div class="card">

                    <div class="card-header mb-3 ">
                        <div class="card-header-title is-centered my-3">
                            <span class="year-font">{category}</span>
                        </div>
                    </div>
                    <div class="container-component">
                        <ul class="cards-component">
                            {#each $data as person}
                                {#if category === person.en_section}
                                    <li>
                                        {#if person.thumbnail === null}
                                            <img src="/~web/images/profile.jpg"/>
                                        {:else}
                                            <img src={person.thumbnail}/>
                                        {/if}
                                        <div class="details-component">
                                            <span class="name-label"><i class="fas fa-user"></i> {person.en_name}</span>
                                            <!--                                        <span class="title-label"><i-->
                                            <!--                                                class="fas fa-list-alt"></i> {person.en_major}</span>-->
                                            <a class="email-label" href="mailto:{person.email}">
                                                <i class="fas fa-envelope"></i> {person.email}</a>
                                            {#if person.telephone !== null | undefined | ""}
                                                <a class="phone-label" href="tel:{person.telephone}">
                                                    <i class="fas fa-phone-square-alt"></i>
                                                    {person.telephone}
                                                </a>
                                            {/if}
                                            {#if person.mobile !== null | undefined | ""}
                                                <a class="phone-label" href="tel:{person.mobile}">
                                                    <i class="fas fa-mobile"></i>
                                                    {person.mobile}
                                                </a>
                                            {/if}
                                        </div>
                                    </li>
                                {/if}
                            {/each}
                        </ul>
                    </div>
                </div>
            {/each}
        {/if}
    {:else if $loading}
        <div class="has-text-centered pt-6">
            <a class="button is-loading is-size-1 is-info is-outlined is-borderless"></a>
            <h1>Loading...</h1>
        </div>
    {/if}
    {#if !$loading && $data.length === 0}
        <div class="has-text-centered pt-6 is-size-5">
            <h1>{$_('error.nodata')}</h1>
        </div>
    {/if}
</section>

<style>

    section {
        /*padding-top: 3rem;*/
        min-height: 30em;
        background: #F5F5F5;

    }

    .year-font {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: bold;
        color: #0a0a0a;
        font-size: 18px;
    }

    @font-face {
        /*font-family: 'Open Sans';*/
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-style: normal;
        font-weight: 400;
        font-stretch: normal;
        src: url(https://fonts.gstatic.com/s/opensans/v34/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsjZ0B4gaVc.ttf) format('truetype');
    }

    @font-face {
        /*font-family: 'Open Sans';*/
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-style: normal;
        font-weight: 600;
        font-stretch: normal;
        src: url(https://fonts.gstatic.com/s/opensans/v34/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsgH1x4gaVc.ttf) format('truetype');
    }

    @font-face {
        /*font-family: 'Open Sans';*/
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-style: normal;
        font-weight: 700;
        font-stretch: normal;
        src: url(https://fonts.gstatic.com/s/opensans/v34/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsg-1x4gaVc.ttf) format('truetype');
    }

    .fa-envelope, .fa-phone-square-alt, .fa-mobile, .fa-user, .fa-list-alt {
        color: #333D51;
    }


    .container-component {
        padding: 15px;
    }

    .clearfloat {
        content: '';
        display: block;
        clear: both;
    }

    .card {
        margin-bottom: 20px;
    }
    .cards-component {
        list-style: none;
        margin: 0;
        padding: 0;
        text-align: center;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;

    }

    .cards-component li {
        display: inline-block;
        margin: 10px;
        padding: 20px;
        /*border: 1px solid rgba(0, 0, 0, 0.2);*/
        /*border-radius: 8px;*/
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
        font-size: 0.9em;
        transition: all 0.2s ease-in-out;
        text-align: center;
        min-width: 455px;
    }

    .cards-component li:after,
    .cards-component li:before {
        content: '';
        display: block;
        clear: both;
    }

    .cards-component li img {
        display: inline-block;
        width: 100%;
        height: auto;
        max-width: 150px;
        float: left;
        border-radius: 50%;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
        transition: all 0.5s ease-in-out;
    }

    .cards-component li .details-component {
        float: left;
        text-align: left;
        transition: all 0.5s ease-in-out;
        text-shadow: 1px 1px rgba(0, 0, 0, 0);
        min-width: 280px;
    }

    .cards-component li .details-component > span:first-child {
        margin-top: 10px;
    }


    .cards-component li .details-component > span:nth-child(2),
    .cards-component li .details-component > a:nth-child(2) {
        margin-top: 10px;
    }

    .cards-component li .details-component > span,
    .cards-component li .details-component > a {
        display: block;
        padding: 0 15px 0 35px;
        /*margin-bottom: 5px;*/
        text-decoration: none;
        position: relative;
    }

    .cards-component li .details-component > span:before,
    .cards-component li .details-component > a:before {
        display: inline-block;
        font: normal normal normal 13px/1 FontAwesome;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        margin-right: 15px;
        width: 15px;
        text-align: center;
        color: #444;
    }

    .name-label {
        font-weight: 900;
    }

    .cards-component li .details-component a {
        color: #1F487E;
        transition: color 0.5s ease-in-out;
    }

    .cards-component li .details-component a:hover,
    .cards-component li .details-component a:focus {
        color: #312c1b;
        transition: color 0.5s ease-in-out;
    }

    .cards-component li:hover {
        background: rgba(62, 74, 98, 0.2);
        transition: all 0.2s ease-in-out;
        transform: scale(1.03);
    }

    .cards-component li:hover img {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
        transition: all 0.4s ease-in-out;
    }

    .cards-component li:hover .details-component {
        transition: all 0.5s ease-in-out;
        text-shadow: 1px 1px #dfe295;
    }

    @media (max-width: 550px) {
        .cards-component li {
            display: block;
            width: auto;
            /*max-width: 200px;*/
            min-width: 150px;
            margin: 30px auto;
        }

        .cards-component li img,
        .cards-component li .details-component {
            float: none;
        }

        .cards-component li img {
            margin: 0 auto;
        }

        .cards-component li .details-component {
            margin-top: 20px;
            text-align: center;
            min-width: 0;
        }

        .cards-component li .details-component span,
        .cards-component li .details-component a {
            padding: 0;
            white-space: break-all;
            word-wrap: break-word;
        }

        .cards-component li .details-component span:before,
        .cards-component li .details-component a:before {
            display: none;
        }
    }

</style>