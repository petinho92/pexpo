<script>
    import {_} from 'svelte-i18n';
</script>
<div class="parallax center-content">

    <div class="container ">
        <div class="card ">
            <div class="card-content has-text-justified">
                <h1 class="h1title">{$_('expo.card.title')}</h1>
                {@html $_('expo.card.description')}
                <h3 class="h3title">{$_('expo.card.foottitle')}</h3>
            </div>
        </div>
    </div>
</div>


<style>
    .parallax {
        background-image: url("/~web/images/expo110.jpg");
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 85vh;

    }

    .h3title{
        font-size: 20px;
    }





    .center-content{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card{
        border-top: 3px solid #D3AC2B;
        background-color: #F4F3EA;
    }
    .h1title{
        letter-spacing: 3px;
        font-weight: bold;
        font-size: 25px;
    }
</style>