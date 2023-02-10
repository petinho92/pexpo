<script>
    import Carousel from 'svelte-carousel'
    import {carouselhero} from "../data/gallery.ts";

</script>
<section>
    <Carousel
            autoplay
            arrows={false}
            autoplayDuration={4000}
            pauseOnFocus={true}
            autoplayProgressVisible={true}
            dots={false}
            timingFunction="linear"
    >
        {#each carouselhero as img}
            <img src={img.path} alt={img.id}>
        {/each}
    </Carousel>
</section>
<style>
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
    section{
        margin-top: -12px;
        background-color: #D3AC2B;
    }
</style>