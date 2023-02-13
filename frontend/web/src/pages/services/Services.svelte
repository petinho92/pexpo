<script>
    import fetchData from "../../services/asyncFetch.ts";

    const url = "/content/get/services/hu";
    const [data, loading, error, get] = fetchData(url);


</script>

<section class="section">
    <div class="container container-panel">
        <div class="columns is-centered">
            <div class="column is-two-thirds">
<!--                TODO: renders all in same font size -->
                {@html $data}
            </div>
        </div>
    </div>
</section>

<style lang="scss">
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