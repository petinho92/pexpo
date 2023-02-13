<script>
    import Gallery from "../gallery/Gallery.svelte";

    export let urlPrefix = '';
    export let images = [];

    let urls = [];

    $: if (urlPrefix  !== (null || undefined) && images !== (null || undefined)) {
        for (let i = 0; i < images.length; i++) {
            urls.push(urlPrefix.concat(images[i]));
        }
        console.log(urls);
    }


</script>


{#if urls !== (null || undefined)}
    <div>
        <Gallery images={urls}/>
    </div>
{/if}

