<script>

    import { getContext } from 'svelte';
    import {_} from 'svelte-i18n';
    import {push} from "svelte-spa-router";

    export let title = $_('modal.title');
    export let message = $_('modal.body');

    const { close } = getContext('success-modal');

    function handleClick(){
        close();
        push("/");
    }
</script>



<div class="has-text-centered">
    <h2>{title}</h2>
    <h5>{message}</h5>
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