<script>
    import {push} from "svelte-spa-router";
    import {_, locale} from 'svelte-i18n';
    import {routes} from "src/router/routes.ts";

</script>

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-one-quarter mx-6">
                    <img src="/~web/images/pollackexpo_logo2.png" class="footerlogo">
                    <p class="has-text-justified mt-4">
                        {@html $_('footer_pr_text')}
                    </p>
                </div>

                <div class="column is-one-quarter footer-links mx-6">
                    <h4>{$_('menu.sitemap')}</h4>
                    <ul>
                        {#each [...routes] as [key, value]}
                            {#if value.userData !== undefined && value.userData.active && key !== '/student'}
                                {#if $locale === 'hu'}
                                    <li><i class="fas fa-chevron-right"></i> <a
                                            on:click={() => push(key)}>{value.userData.hu}</a>
                                    </li>
                                {/if}
                                {#if $locale === 'en'}
                                    <li><i class="fas fa-chevron-right"></i> <a
                                            on:click={() => push(key)}>{value.userData.en}</a>
                                    </li>
                                {/if}

                            {/if}
                            {#if value.userData !== undefined && key === '/student'}
                                <li><i class="fas fa-chevron-right"></i>
                                    <a href="#">
                                        {$_('menu.registration.registration')}
                                    </a>
                                </li>
                                <li><i class="fas fa-chevron-right ml-4"></i> <a
                                        href="http://www.pollackexpo.hu/belepes/" target="_blank">{$_('menu.registration.partners')}</a>
                                </li>
                                {#if value.userData.active}
                                    {#if $locale === 'hu'}
                                        <li><i class="fas fa-chevron-right ml-4"></i> <a
                                                on:click={() => push(key)}>{value.userData.hu}</a>
                                        </li>
                                    {/if}
                                    {#if $locale === 'en'}
                                        <li><i class="fas fa-chevron-right ml-4"></i> <a
                                                on:click={() => push(key)}>{value.userData.en}</a>
                                        </li>
                                    {/if}
                                {/if}
                            {/if}
                        {/each}
                    </ul>
                </div>

                <div class="column is-one-quarter footer-contact mx-6">
                    <h4>{$_('menu.contact')}</h4>
                    <p>
                        {@html $_('footer_address')}
                        <strong>{$_('accommodations.label.telephone')} </strong><a class="link-tel"
                                                                                   href="tel:+3672503650">+36 72 503 650
                        / 23866</a><br>
                    </p>

                    <div class="social-links">
                        <a href="https://www.facebook.com/ptemik" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/pte_mik/" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/user/pollack1962" class="youtube"><i
                                class="fab fa-youtube"></i></a>
                        <a href="https://mik.pte.hu/" class="globe"><i class="fas fa-globe"></i></a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; {new Date().getFullYear()} {$_('footer_sign')}
        </div>
    </div>
</footer><!-- End  Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="fas fa-chevron-circle-up"></i></a>

<style>

    @media screen and (max-width: 768px) {
        .mlr-6 {
            margin: 0 10px 0 10px;
        }

        .footerlogo {
            width: 80%;
            height: 80%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    }

    .link-mail {
        color: #D3AC2B;
    }

    .link-tel {
        color: #D3AC2B;
    }

    .social-links {
        margin-top: 10px;
    }

    strong {
        color: #F4F3EA;
    }

    #footer .footer-top .social-links .facebook:hover {
        background-color: #4267B2;
    }

    #footer .footer-top .social-links .youtube:hover {
        background-color: red;
    }

    #footer .footer-top .social-links .instagram:hover {
        background-color: #833AB4;
    }

    #footer .footer-top .social-links .globe:hover {
        background-color: #006699;
    }

    #footer {
        background: #101522;
        padding: 0 0 25px 0;
        color: #F4F3EA;
        font-size: 14px;
    }

    #footer .footer-top {
        background: #040919;
        padding: 60px 0 30px 0;
    }

    #footer .footer-top .footer-info {
        margin-bottom: 30px;
    }

    #footer .footer-top .footer-info h3 {
        font-size: 26px;
        margin: 0 0 20px 0;
        padding: 2px 0 2px 0;
        line-height: 1;
        font-family: "Raleway", sans-serif;
        font-weight: 700;
        color: #F4F3EA;
    }

    #footer .footer-top .footer-info img {
        height: 40px;
        margin-bottom: 10px;
    }

    #footer .footer-top .footer-info p {
        font-size: 14px;
        line-height: 24px;
        margin-bottom: 0;
        font-family: "Raleway", sans-serif;
        color: #F4F3EA;
    }

    #footer .footer-top .social-links a {
        display: inline-block;
        background: #222636;
        color: #F4F3EA;
        line-height: 1;
        margin-right: 4px;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    #footer .footer-top .social-links a i {
        line-height: 0;
        font-size: 16px;
    }

    #footer .footer-top h4 {
        font-size: 14px;
        font-weight: bold;
        color: #F4F3EA;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 2px;
        border-bottom: 2px solid #D3AC2B;
        margin-bottom: 10px;
    }

    #footer .footer-top .footer-links {
        margin-bottom: 30px;
    }

    #footer .footer-top .footer-links ul {
        list-style: none;
        padding: 0;
        margin: 0;
        /*chevron color*/
        color: #D3AC2B;
    }

    #footer .footer-top .footer-links ul i {
        padding-right: 5px;
        color: #f82249;
        font-size: 18px;
    }

    #footer .footer-top .footer-links ul li {
        border-bottom: 1px solid #262c44;
        padding: 10px 0;
    }

    #footer .footer-top .footer-links ul li:first-child {
        padding-top: 0;
    }

    #footer .footer-top .footer-links ul a {
        /*link color*/
        color: #F4F3EA;
        text-decoration: none;
    }

    #footer .footer-top .footer-links ul a:hover {
        color: #D3AC2B;
    }

    #footer .footer-top .footer-contact {
        margin-bottom: 30px;
    }

    #footer .footer-top .footer-contact p {
        line-height: 26px;
    }

    #footer .footer-top .footer-newsletter {
        margin-bottom: 30px;
    }

    #footer .footer-top .footer-newsletter input[type=email] {
        border: 0;
        padding: 6px 8px;
        width: 65%;
    }

    #footer .footer-top .footer-newsletter input[type=submit] {
        background: #f82249;
        border: 0;
        width: 35%;
        padding: 6px 0;
        text-align: center;
        color: #fff;
        transition: 0.3s;
        cursor: pointer;
    }

    #footer .footer-top .footer-newsletter input[type=submit]:hover {
        background: #e0072f;
    }

    #footer .copyright {
        text-align: center;
        padding-top: 30px;
    }

    .back-to-top {
        position: fixed;
        visibility: hidden;
        opacity: 0;
        right: 15px;
        bottom: 15px;
        z-index: 996;
        background: #f82249;
        width: 40px;
        height: 40px;
        border-radius: 50px;
        transition: all 0.4s;
    }

    .back-to-top i {
        font-size: 28px;
        color: #fff;
        line-height: 0;
    }

    .back-to-top:hover {
        background: #f94a6a;
        color: #fff;
    }

    .back-to-top.active {
        visibility: visible;
        opacity: 1;
    }

</style>