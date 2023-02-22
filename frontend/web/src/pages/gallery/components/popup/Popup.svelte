<script>
    import Gallery from "../gallery/Gallery.svelte";

    export let images = [];



</script>


{#if images !== null && images !== undefined}
    <div>
        <Gallery images={images}/>
    </div>
{/if}

