<script>
    export let slideNo;
    export let totalSlides;
    export let image;

</script>


<!-- Full-width images with number text -->
    <div class="numbertext">{slideNo} / {totalSlides}</div>
    <img src={image}>



<style>
    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: .9rem;
        padding: 8px 12px;
        text-shadow: 1px 1px black;
        position: absolute;
        top: 0;
    }


    img{
        display: flex;
        max-height: calc(100vh - 10rem);
    }

    @media screen and (max-height:420px){
        img{
            max-height: 300px;
            width: auto;
        }

    }





</style>
