<script>
    import fetchData from "../../services/asyncFetch.ts";
    import {locale} from 'svelte-i18n';


    let url;

    $: if($locale === 'en'){
        url = "/content/get/services/en";
    }else{
        url = "/content/get/services/hu";
    }

    let [data, loading, error, get] = [null, null,null,null];

    $: [data, loading, error, get] = fetchData(url);



</script>

<section class="section">
    {#if !$loading && $data !== null}
        <div class="container container-panel">
            <div class="columns is-centered">
                <div class="column is-two-thirds">
                    <div class="content my-6">

                            {@html $data}
                    </div>
                </div>
            </div>
        </div>
    {/if}

</section>

<style lang="scss">
  section {
    min-height: 30em;
  }

  .container-panel {
    background-color: #333D51;
    opacity: 0.9;
    border: .6em solid #D3AC2B;
  }

  @media screen and (max-width: 1023px) {
    .columns {
      alignment: left;
      margin: 0 2px 0 2px;
    }
    .container-panel {

      min-width: 100vw;
      border-style: none;
    }
    div {
      margin-left: 0;
    }
    .section {
      padding-left: 0;
    }
  }


</style>