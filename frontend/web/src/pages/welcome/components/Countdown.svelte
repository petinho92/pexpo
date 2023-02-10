<script>
    import Countdown from "svelte-countdown/src/index.js";
    import {_} from 'svelte-i18n';
</script>

<section class="section bgcolor">
<!--    <Countdown from="2022-02-24 09:30:00" dateFormat="YYYY-MM-DD H:m:s" zone="Europe/Budapest" let:remaining>-->
        <div class="container">
<!--            <h1 id="headline">{$_('countdown.text')}</h1>-->
            <h1 id="headline">{$_('countdown.end')}</h1>
            <h2>(2022-02-24 09:30)</h2>
            <!--{#if remaining.done === false}-->
            <!--    <div id="countdown">-->
            <!--        <ul>-->
            <!--            {#if remaining.months > 0}-->
            <!--                <li><span id="months">{remaining.months}</span>{$_('countdown.month')}</li>-->
            <!--            {/if}-->
            <!--            <li><span id="days">{remaining.days}</span>{$_('countdown.day')}</li>-->
            <!--            <li><span id="hours">{remaining.hours} </span>{$_('countdown.hour')}</li>-->
            <!--            <li><span id="minutes">{remaining.minutes}</span>{$_('countdown.minute')}</li>-->
            <!--            <li><span id="seconds">{remaining.seconds}</span>{$_('countdown.second')}</li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--{:else}-->
            <!--    <div id="content" class="emoji">-->
            <!--        <span>🥳</span>-->
            <!--        <span>🎉</span>-->
            <!--        <span>🎂</span>-->
            <!--    </div>-->
            <!--{/if}-->
        </div>
<!--    </Countdown>-->
</section>
<style>
    .container {
        color: #333;
        margin: 0 auto;
        text-align: center;
    }

    h1 {
        font-weight: normal;
        letter-spacing: .125rem;
        text-transform: uppercase;
        font-size: xx-large;
    }

    li {
        display: inline-block;
        font-size: 1.5em;
        list-style-type: none;
        padding: 1em;
        text-transform: uppercase;
    }

    li span {
        display: block;
        font-size: 4.5rem;
    }

    .emoji {
        display: none;
        padding: 1rem;
    }

    .emoji span {
        font-size: 4rem;
        padding: 0 .5rem;
    }

    @media all and (max-width: 768px) {
        h1 {
            font-size: calc(1.5rem * var(--smaller));
        }

        li {
            font-size: calc(1.125rem * var(--smaller));
        }

        li span {
            font-size: calc(3.375rem * var(--smaller));
        }
    }

    .bgcolor {
        background-color: #D3AC2B;
    }
</style>