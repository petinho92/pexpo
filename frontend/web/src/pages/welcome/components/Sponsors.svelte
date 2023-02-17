<script>
    import {Swiper, SwiperSlide} from "swiper/svelte";
    import 'swiper/css';
    import "swiper/css/pagination"
    import {partners} from "../data/sponsors.ts";
    import {_} from 'svelte-i18n'
    import fetchData from "../../../services/asyncFetch.ts"

    const url = "/sponsor/getsponsor";
    const [data, loading, error, get] = fetchData(url);

    import SwiperCore, {Pagination, Autoplay} from 'swiper';

    SwiperCore.use([Pagination, Autoplay]);


</script>

{#if !$loading && $data[0] !== undefined}

    <section id="clients" class="clients">

        <div class="container">

            <header class="section-header">
                <h2>{$_('sponsors.title')}</h2>
            </header>

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <Swiper slidesPerView="{1}" spaceBetween="{10}" loop="{true}" autoplay='{{
  "delay": 1500,
  "disableOnInteraction": false
}}' pagination='{{
  "clickable": true
}}' breakpoints='{{

    "400": {
      "slidesPerView": 1,
      "spaceBetween": 10
    },
   "640": {
    "slidesPerView": 2,
    "spaceBetween": 20
  },
  "768": {
    "slidesPerView": 4,
    "spaceBetween": 40
  },
  "1024": {
    "slidesPerView": 5,
    "spaceBetween": 50
  }
}}' class="mySwiper is-mobile has-text-centered">
                        {#each $data as partner}
                            <SwiperSlide>
                                <div class="swiper-slide">
                                    <a href={partner.website}>
                                        <img class="image-full-size" src="{partner.logo}">
                                    </a>
                                </div>
                            </SwiperSlide>
                        {/each}

                    </Swiper>


                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
{/if}

<style>
    .image-full-size {
        height: 70%;
    }

    .clients .clients-slider .swiper-slide img {
        opacity: 0.5;
        transition: 0.3s;
    }

    .clients .clients-slider .swiper-slide img:hover {
        opacity: 1;
    }

    .clients .clients-slider .swiper-pagination {
        margin-top: 20px;
        position: relative;
    }

    .clients .clients-slider .swiper-pagination .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background-color: #fff;
        opacity: 1;
        border: 1px solid #4154f1;
    }

    .clients .clients-slider .swiper-pagination .swiper-pagination-bullet-active {
        background-color: #4154f1;
    }

    .section-header {
        text-align: center;
        padding-bottom: 40px;
    }

    .section-header h2 {
        font-size: 13px;
        letter-spacing: 1px;
        font-weight: 700;
        padding-top: 15px;
        color: #333D51;
        text-transform: uppercase;
    }

    .section-header p {
        margin: 10px 0 0 0;
        padding: 0;
        font-size: 38px;
        line-height: 42px;
        font-weight: 700;
        color: #012970;
    }

    @media (max-width: 768px) {
        .section-header p {
            font-size: 28px;
            line-height: 32px;
        }
    }

    section {
        background-color: #D3AC2B;
    }
</style>


<!--<script>-->
<!--    import {partners} from "src/application/store/sponsors.ts";-->
<!--    import Carousel from "svelte-carousel";-->
<!--</script>-->

<!--<section class="section">-->
<!--        <h1>Támogatóink</h1>-->
<!--    <Carousel-->
<!--            particlesToShow={8}-->
<!--            particlesToScroll={2}-->
<!--            autoplay-->
<!--            autoplayDuration={300}-->
<!--            pauseOnFocus-->
<!--    >-->
<!--        {#each partners as partner}-->
<!--            <img src={partner.logo128} alt={partner.name} class="image is-128x128">-->
<!--        {/each}-->
<!--    </Carousel>-->


<!--</section>-->

<!--<style>-->


<!--</style>-->

<!--<script>-->
<!--    import {partners} from "src/application/store/sponsors.ts";-->
<!--</script>-->

<!--<section class="section">-->
<!--    <div class="container">-->
<!--        <div class="columns">-->
<!--            {#each partners as partner}-->
<!--                <div class="column">-->
<!--                        <div class="image is-256x256"><img src={partner.logo256} alt={partner.name}></div>-->
<!--                </div>-->
<!--            {/each}-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!--<style>-->

<!--    @media screen and (max-width: 768px) {-->
<!--        .is-256x256 {-->
<!--            width: 50%;-->
<!--            height: 50%;-->
<!--        }-->
<!--        .section {-->
<!--            height: 100%;-->
<!--        }-->
<!--    }-->

<!--    @media screen and (min-width: 769px) {-->
<!--        .is-256x256 {-->
<!--            width: 50%;-->
<!--            height: 50%;-->
<!--        }-->
<!--        .section {-->
<!--            height: 260px;-->
<!--        }-->
<!--    }-->

<!--    .is-256x256 {-->
<!--        max-width: 256px;-->
<!--        max-height: 256px;-->
<!--    }-->

<!--    img {-->
<!--        max-height: 100%;-->
<!--        max-width: 100%;-->
<!--    }-->

<!--    .section{-->
<!--        background-color: #D3AC2B;-->
<!--    }-->

<!--    .container {-->
<!--        overflow: hidden;-->
<!--        display: flex;-->
<!--        height: 500px;-->
<!--        width: 1500px;-->
<!--        margin: 0 auto;-->
<!--    }-->

<!--    /*@keyframes slide {*/-->
<!--    /*    0% {*/-->
<!--    /*        transform: translate3d(0, 0, 0);*/-->
<!--    /*    }*/-->
<!--    /*    100% {*/-->
<!--    /*        transform: translate3d(-1500px, 0, 0); !* The image width *!*/-->
<!--    /*    }*/-->
<!--    /*}*/-->
<!--    /*.container div {*/-->
<!--    /*    height: 400px;*/-->
<!--    /*    min-width: 300px;*/-->
<!--    /*    margin-left: 100px;*/-->
<!--    /*    animation: slide 15s linear infinite;*/-->
<!--    /*}*/-->
<!--</style>-->