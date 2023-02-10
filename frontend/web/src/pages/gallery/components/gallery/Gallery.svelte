<script>
    import Slide from './Slide.svelte';
    import Caption from './Caption.svelte';
    import {createEventDispatcher} from 'svelte';
    import {swipe} from 'svelte-gestures';

    const dispatch = createEventDispatcher();

    export let images = [];

    let image;

    /* IMAGE TO SHOW */
    let imageShowingIndex = 0;
    $: image = images[imageShowingIndex];

    const nextSlide = () => {
        if (imageShowingIndex === images.length - 1) {
            imageShowingIndex = 0;
        } else {
            imageShowingIndex += 1;
        }
    }

    const prevSlide = () => {
        if (imageShowingIndex === 0) {
            imageShowingIndex = images.length - 1;
        } else {
            imageShowingIndex -= 1;
        }
    }

    const goToSlide = (number) => imageShowingIndex = number;


    const handleKeyDownEvent = (event) => {
        if (event.key === 'ArrowLeft') {
            prevSlide();
            event.preventDefault();
        }
        if (event.key === 'ArrowRight') {
            nextSlide();
            event.preventDefault();
        }
    }

    const handleSwipeEvent = (event) => {
        if (event.detail.direction === "left") {
            nextSlide();
            event.preventDefault();
        }
        if (event.detail.direction === "right") {
            prevSlide();
            event.preventDefault();
        }
    }

</script>




<main use:swipe={{ timeframe: 300, minSwipeDistance: 80, touchAction: 'pan-y' }} on:swipe={handleSwipeEvent}>


    <!-- Image text -->
    <Caption caption={images[imageShowingIndex].name}
             on:prevClick={prevSlide}
             on:nextClick={nextSlide}>
        <!-- image gallery -->
        <div class="container">
            <Slide image={image}
                   slideNo={images.indexOf(image) + 1}
                   totalSlides={images.length}
            />
        </div>
    </Caption>



</main>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap');

    * {
        box-sizing: border-box;
        font-family: 'Josefin Sans', sans-serif;
    }


    main {
        width: 100%;
        display: flex;
        flex-direction: column;
        /*margin: 10% auto;*/
        background-color: #222;
        box-shadow: 0 0 10px black;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
        position: relative;
    }


    .thumbnails-row {
        width: 100%;
        display: flex;
        align-self: flex-end;
    }


</style>