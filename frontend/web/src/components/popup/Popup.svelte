<script>

    import { getContext } from 'svelte';
    import {agreed} from "src/components/popup/cookie.ts";
    import {_} from 'svelte-i18n';

    export let message = $_('cookie.text');

    const { close } = getContext('simple-modal');

    function handleClick(){
        $agreed = true;
        console.log("agreed = true");
        close();
        localStorage.setItem("allowedCookie", 'true');
    }
</script>



<div class="has-text-centered">
    <h2>{message}</h2>
    <button class="button btn" on:click={handleClick}>{$_('cookie.button')}</button>
</div>


<style>



    h2 {
        font-size: 2rem;
        text-align: center;
    }

    .btn{
        border: #0a0a0a solid  1px;
    }
    .btn:hover{
        color: #F4F3EA;
        background: #29b35e;
    }

</style>