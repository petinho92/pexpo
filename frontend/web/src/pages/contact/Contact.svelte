<script lang="ts">
    import asyncGet from "src/services/asyncFetch.ts";
    import {locale} from "svelte-i18n";

    const contacturl = 'contact/';
    const sectionurl = 'contact/category';

    const [data, loading, error, get] = asyncGet(contacturl);
    const [category, loading2, error2, get2] = asyncGet(sectionurl);
</script>

<section>

    {#if $data !== null && $data !== undefined}
        {#each $category as category}
            <div class="card-header mb-3 ">
                <div class="card-header-title is-centered my-3">
                    {#if $locale === 'hu'}
                        <span class="year-font">{category.hu_cat}</span>
                    {/if}
                    {#if $locale === 'en'}
                        <span class="year-font">{category.en_cat}</span>
                    {/if}
                </div>
            </div>
            <div class="container-component">
                <ul class="cards-component">
                    {#each $data as person}
                        {#if $locale === 'hu' && category.hu_cat === person.hu_section}
                            <li>
                                {#if person.thumbnail === null}
                                    <img src="/~web/images/profile.jpg"/>
                                {:else}
                                    <img src={person.thumbnail}/>
                                {/if}
                                <div class="details-component">
                                    <span class="name-label"><i class="fas fa-user"></i> {person.hu_name}</span>
                                    <span class="title-label"><i class="fas fa-list-alt"></i> {person.hu_major}</span>
                                    <a class="email-label" href="mailto:{person.email}">
                                        <i class="fas fa-envelope"></i> {person.email}</a>
                                    {#if person.telephone !== null|undefined|""}
                                        <a class="phone-label" href="tel:{person.telephone}">
                                            <i class="fas fa-phone-square-alt"></i>
                                            {person.telephone}
                                        </a>
                                    {/if}
                                    {#if person.mobile !== null|undefined|""}
                                        <a class="phone-label" href="tel:{person.mobile}">
                                            <i class="fas fa-mobile"></i>
                                            {person.mobile}
                                        </a>
                                    {/if}

                                </div>
                            </li>
                        {/if}
                        {#if $locale === 'en' && category.en_cat === person.en_section}
                            <li>
                                {#if person.thumbnail === null}
                                    <img src="/~web/images/profile.jpg"/>
                                {:else}
                                    <img src={person.thumbnail}/>
                                {/if}
                                <div class="details-component">
                                    <span class="name-label"><i class="fas fa-user"></i> {person.en_name}</span>
                                    <span class="title-label"><i class="fas fa-list-alt"></i> {person.en_major}</span>
                                    <a class="email-label" href="mailto:{person.email}">
                                        <i class="fas fa-envelope"></i> {person.email}</a>
                                    {#if person.telephone !== null|undefined|""}
                                        <a class="phone-label" href="tel:{person.telephone}">
                                            <i class="fas fa-phone-square-alt"></i>
                                            {person.telephone}
                                        </a>
                                    {/if}
                                    {#if person.mobile !== null|undefined|""}
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
            <!--                <div class="card-content">-->
            <!--                    <div class="columns is-multiline is-flex-mobile is-centered mb-6">-->
            <!--                        {#each $data as person}-->
            <!--                            {#if $locale === 'hu' && category.hu_cat === person.hu_section}-->
            <!--                                Név: {person.hu_name}-->
            <!--                            {/if}-->
            <!--                            {#if $locale === 'en' && category.en_cat === person.en_section}-->
            <!--                                Név: {person.en_name}-->
            <!--                            {/if}-->
            <!--                        {/each}-->
            <!--                    </div>-->
            <!--                </div>-->

        {/each}
    {/if}
</section>

<style>
    @font-face {
        font-family: 'Open Sans';
        font-style: normal;
        font-weight: 400;
        font-stretch: normal;
        src: url(https://fonts.gstatic.com/s/opensans/v34/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsjZ0B4gaVc.ttf) format('truetype');
    }

    @font-face {
        font-family: 'Open Sans';
        font-style: normal;
        font-weight: 600;
        font-stretch: normal;
        src: url(https://fonts.gstatic.com/s/opensans/v34/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsgH1x4gaVc.ttf) format('truetype');
    }

    @font-face {
        font-family: 'Open Sans';
        font-style: normal;
        font-weight: 700;
        font-stretch: normal;
        src: url(https://fonts.gstatic.com/s/opensans/v34/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsg-1x4gaVc.ttf) format('truetype');
    }

    .fa-envelope, .fa-phone-square-alt, .fa-mobile, .fa-user, .fa-list-alt {
        color: #3E4A62;
    }

    body {
        font-family: "open sans";
        color: #444;
        font-size: 1em;
    }

    .container-component {
        padding: 15px;
    }

    .clearfloat {
        content: '';
        display: block;
        clear: both;
    }

    .cards-component {
        list-style: none;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .cards-component li {
        display: inline-block;
        margin: 10px;
        padding: 20px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 25px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        font-size: 0.9em;
        transition: all 0.2s ease-in-out;
        text-align: center;
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
        min-width: 250px;
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
        color: #D3AC2B;
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
            max-width: 200px;
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