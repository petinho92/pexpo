<script>
    import '@fortawesome/fontawesome-free/js/fontawesome.js';
    import '@fortawesome/fontawesome-free/js/brands.js';
    import '@fortawesome/fontawesome-free/js/regular.js';
    import '@fortawesome/fontawesome-free/js/solid.js';
    import 'bulma/css/bulma.css';
    import 'bulma-extensions/bulma-divider/dist/css/bulma-divider.min.css';
    import Router from 'svelte-spa-router';
    import routes from "./router/routes.ts";

    import {_, addMessages, init} from "svelte-i18n";
    import hu from './data/lang/hu.json';
    import en from './data/lang/en.json';
    import {writable} from 'svelte/store';

    import Cookie from "./components/Cookie.svelte";
    import Navbar2 from "./components/Navbar2.svelte";
    import Footer from "src/components/Footer.svelte";


    let languages = writable(localStorage.getItem("lang") !== null ? localStorage.getItem("lang") : 'hu');
    addMessages('hu', hu);
    addMessages('en', en);
    $: {
        init({
            fallbackLocale: 'hu',
            initialLocale: $languages,
        });
        localStorage.setItem("lang", $languages);
    }



</script>


<Cookie/>
<Navbar2 languages={languages}/>
<Router {routes}/>
<Footer/>