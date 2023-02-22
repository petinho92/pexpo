<script>
    import Carousel from 'svelte-carousel'
    import fetchData from "../../../services/asyncFetch.ts"

    const url = "/gallery/getslider";
    const [data, loading, error, get] = fetchData(url);

</script>
<section>
    {#if !$loading && $data[0] !== undefined }
        <Carousel
                autoplay
                arrows={false}
                autoplayDuration={4000}
                pauseOnFocus={true}
                autoplayProgressVisible={true}
                dots={false}
                timingFunction="linear"
        >
            {#each $data as img}
                <img class="slider-picture" src={img}>
            {/each}
        </Carousel>
    {/if}
</section>
<style>
    .slider-picture{
        width: calc(1920px / 2);
        height: calc(1080px / 2);
        background-size: cover;
        position: static;
        top: 40px;
        left: 40px;
        background-position: 34% 46%;
        transition: height 2s, width 2s;
    }
    @media screen and (min-width: 769px) {
        img {
            width: calc(1920px / 2);
            height: calc(1080px / 2);
            object-fit: cover;
        }
    }
    @media screen and (max-width: 768px) {
        img {
            width: calc(1582px / 3);
            height: calc(540px / 3);
            object-fit: cover;
        }
    }
    section {
        background-color: #D3AC2B;
    }
</style>