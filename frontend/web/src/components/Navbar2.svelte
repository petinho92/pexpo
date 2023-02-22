<script>
    import {_} from 'svelte-i18n';
    import {push} from 'svelte-spa-router';

    export let languages;
    let active;


</script>

<div class="columns m-0">
    <div class="card-content column is-full mb-0 p-0">
        <nav class="navbar is-transparent has-centered-logo-alt2 pt-6 pb-4 pl-2" role="navigation"
             aria-label="main navigation">
            <div class="navbar-brand is-hidden-desktop">
                <a class="navbar-item" on:click={ () => push("/")}>
                    <img src="/~web/images/pollackexpo_logo2.png" width="112" height="28">
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                   data-target="navbarBasicExample"
                   onclick="document.querySelector('.navbar-menu').classList.toggle('is-active');"
                   class:is-active={active} on:click={()=>active = !active}
                >
                    <span aria-hidden="true" class="nbburger"></span>
                    <span aria-hidden="true" class="nbburger"></span>
                    <span aria-hidden="true" class="nbburger"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start is-hidden-touch">
                    <a class="navbar-item" href="https://www.youtube.com/user/pollack1962/videos"
                       target="_blank"><i class="fab fa-youtube"></i></a>
                    <a class="navbar-item" href="https://hu-hu.facebook.com/ptemik/" target="_blank"> <i
                            class="fab fa-facebook"></i></a>
                    <a class="navbar-item" href="https://www.instagram.com/pte_mik/" target="_blank"> <i
                            class="fab fa-instagram"></i></a>
                    <a class="navbar-item website" href="https://mik.pte.hu" target="_blank"><i
                            class="fas fa-globe"></i></a>


                </div>

                <div class="navbar-brand imagee">
                    <a class="navbar-item is-hidden-touch hover15" on:click={ () => push("/")}>
                        <figure><img src="/~web/images/pollackexpo_logo2.png" class="imageee" width="394" height="67">
                        </figure>
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                       data-target="navbarBasicExample"
                       onclick="document.querySelector('.navbar-menu').classList.toggle('is-active');"
                       class:is-active={active} on:click={()=>active = !active}
                    >
                        <span aria-hidden="true" class="nbburger"></span>
                        <span aria-hidden="true" class="nbburger"></span>
                        <span aria-hidden="true" class="nbburger"></span>
                    </a>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <select bind:value={$languages} class="custom-select">
                            <option value="hu">🇭🇺 {$_('menu.lang.hu')}</option>
                            <option value="en">🇬🇧 {$_('menu.lang.en')}</option>
                        </select>
                    </div>
                </div>


                <div class="navbar-start navbar-wide"
                     onclick="document.querySelector('.navbar-menu').classList.toggle('is-active');"
                     class:is-active={active} on:click={()=>active = !active}
                >
                    <a class="pte navbar-content ml-6" href="https://pte.hu" target="_blank">
                        <img src="/~web/images/pte.png"
                             class="pte"/>
                    </a>

                    <a class="navbar-item nbi" on:click={() => push('/programguide')}>
                        {$_('menu.programguide')}
                    </a>
                    <a class="navbar-item nbi" on:click={() => push('/sponsors')}>
                        {$_('menu.sponsors')}
                    </a>
                    <a class="navbar-item nbi" on:click={() => push('/services')}>
                        {$_('menu.services')}
                    </a>
                    <a class="navbar-item nbi" on:click={() => push('/accommodation')}>
                        {$_('menu.accommodation')}
                    </a>


                    <a class="navbar-item nbi" on:click={() => push('/gallery')}>
                        {$_('menu.gallery')}
                    </a>


                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link nbi">
                            {$_('menu.registration.registration')}
                        </a>
                        <div class="navbar-dropdown">
                            <hr class="navbar-divider">
                            <a class="navbar-item dditem" href="http://www.pollackexpo.hu/belepes/" target="_blank">
                                {$_('menu.registration.partners')}
                            </a>
                            <a class="navbar-item dditem" on:click={() => push('/student')}>
                                {$_('menu.registration.student')}
                            </a>

                        </div>
                    </div>
                    <div class="navbar-content">

                    </div>


                </div>

            </div>
        </nav>
    </div>
</div>


<style>


    .pte {
        position: relative;
        width: 64px;
        height: 64px;
        color: white;
    }


    .navbar.has-centered-logo-alt2 .navbar-menu {
        flex-wrap: wrap;
    }

    .navbar.has-centered-logo-alt2 .navbar-start,
    .navbar.has-centered-logo-alt2 .navbar-end {
        flex: 1 1 0;
    }

    .navbar.has-centered-logo-alt2 .navbar-wide.navbar-start {
        flex: 1 1 100%;
        justify-content: center;
    }

    .dditem {
        color: black;
    }

    .fa-youtube {
        color: red;
    }

    .fa-facebook {
        color: #4267B2;
    }

    .fa-instagram {
        color: #C13584;
    }

    .fa-globe {
        color: #ffffff;
    }

    .navbar-item:hover {
        /*color: #D3AC2B;*/
        /*transition: color 1s;*/
    }


    .navbar {
        background: linear-gradient(#475570, #3d4961, #333D51);
    }


    .imageee {
        min-height: 68px;
    }

    .imageee:hover {

    }


    .card-content {
        color: #F4F3EA;
        text-space: 2px;
        font-weight: bold;
        font-size: 1.25em;
        width: 100%;
        height: 100%;
    }

    .custom-select {
        width: 120px;
        height: 30px;
        border-top: 1px solid #D3AC2B;
        border-left: 1px solid #D3AC2B;
        font-size: 18px;
        color: #F4F3EA;
        background-color: #333D51;
        border-radius: 5px;
        box-shadow: 4px 4px #222b3d;
    }

    @media screen and (min-width: 1023px) {
        .nbi {
            color: #F4F3EA;
        }

        .highlighted {
            color: #d91d1d;
        }

        .highlighted:hover {
            color: #D3AC2B;
            transition: color 1s;
        }

        .nbi:hover {
            color: #D3AC2B;
            transition: color 1s;
        }
    }

    @media screen and (max-width: 768px) {
        .nbi {
            color: black;
        }

        .highlighted a {
            color: #d91d1d;
        }
    }

    .nbburger {
        color: #F4F3EA;
    }

    .imageee {
        height: 120px;
    }

    .navbar-menu {
        max-width: 95vw;
    }




    @media screen and (max-width: 1200px) {
        .pte-logo {
            display: none;
        }
    }


</style>