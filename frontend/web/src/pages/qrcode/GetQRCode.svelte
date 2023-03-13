<script>
    import QR from "./ShowQRCode.svelte";
    import {_} from "svelte-i18n";
    import {writable} from "svelte/store";
    import getData from "../../services/asyncFetch"

    let done = writable(false);
    let responseData = writable({});
    let code = writable("");
    export let params = {};

    const [data, loading, error, get] = getData('/get/qr/' + params.code)

</script>
<!--fetch('/get/qr/'+params.code)-->
<!--.then(res => res.json())-->
<!--.then(data => {-->
<!--    if(data !== false) {-->
<!--    $code = data;-->
<!--    $done = true;-->
<!--}-->
<!--});-->
{#if !$loading && $data}
    <div id="app">
        <div class='columns is-mobile is-centered'>
            <div class='column is-7-desktop column is-10-mobile'>
                <div class="card mb-6">
                    <div class="is-divider is-info mt-6" data-content="QR KÓD"></div>
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                {$_('qr_text')}
                            </p>
                        </header>
                        <div class="card-content">
                            <QR text={data}/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}
{#if !$loading && !$data}
    <div class='columns is-mobile is-centered'>
        <div class='column is-7-desktop column is-10-mobile'>
            <div class="card mb-6">
                <div class="is-divider is-info mt-6" data-content="QR KÓD"></div>
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {$_('qr_text')}
                        </p>
                    </header>
                    <div class="card-content">
                        <h1 class="has-text-centered">{$_('qr_error')}</h1>
                        <p class="has-text-danger has-text-centered">{$_('qr_error1')}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}
{#if $loading}
    <div class="has-text-centered">
        <a class="button is-loading is-size-1 is-info is-outlined is-borderless"></a>
        <h1>Loading...</h1>
    </div>
{/if}


<style>
    .is-borderless {
        border: none;
    }
</style>