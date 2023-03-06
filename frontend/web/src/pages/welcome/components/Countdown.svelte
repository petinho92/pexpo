<script>
    import Countdown from "svelte-countdown/src/index.js";
    import {_} from 'svelte-i18n';
    import fetchData from "../../../services/asyncFetch.ts"

    const url = "/config/get";
    const [data, loading, error, get] = fetchData(url);
</script>

{#if !$loading && $data !== null}
    <section class="section bgcolor">
        {#if $data.counter.active}
            <Countdown from="{$data.counter.counter_date}" dateFormat="YYYY-MM-DD H:m:s" zone="Europe/Budapest"
                       let:remaining>
                <div class="container">
                    <h1 class="has-text-weight-bold" id="headline">{$_('countdown.text')}</h1>
                    <span class="is-size-3">{$data.counter.event_date}</span>
                    {#if remaining.done === false}
                        <div class="main">
                            <div class="countdown">
                                {#if remaining.months > 0}
                                    <div class="numberbox">
                                        <span class="date-label">{$_('countdown.month')}</span>
                                        <span class="number months">{remaining.months}</span>
                                    </div>
                                {/if}
                                <div class="numberbox">
                                    <span class="date-label">{$_('countdown.day')}</span>
                                    <span class="number days">{remaining.days}</span>
                                </div>
                                <div class="numberbox">
                                    <span class="date-label">{$_('countdown.hour')}</span>
                                    <span class="number hours">{remaining.hours}</span>
                                </div>
                                <div class="numberbox">
                                    <span class="date-label">{$_('countdown.minute')}</span>
                                    <span class="number minutes">{remaining.minutes}</span>
                                </div>
                                <div class="numberbox">
                                    <span class="date-label">{$_('countdown.second')}</span>
                                    <span class="number seconds">{remaining.seconds}</span>
                                </div>
                            </div>
                        </div>
                    {:else}
                        <div id="content" class="emoji">
                            <span>🥳</span>
                            <span>🎉</span>
                            <span>🎂</span>
                        </div>
                    {/if}
                </div>
            </Countdown>
        {:else}

            <div class="content has-text-centered">
                <h1>{$_('countdown.end')}</h1>
                <span class="is-size-3">{$data.counter.event_date}</span>
            </div>

        {/if}
    </section>
{/if}
<style>
    .countdown {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .countdown > div {
        display: flex;
        flex-wrap: nowrap;
        flex-direction: column;
        /*justify-content: center;*/
        justify-content: right;
        align-items: center;
        margin-top: 50px;
        box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.25);
        border-radius: 5px;
    }

    .number {
        padding: 5px 0 5px 0;
        background-color: #3e4a62;
        margin-left: -.1em;
        border-radius: .2em 0 0 .2em;
        font-weight: 500;
        font-size: 32px;
        writing-mode: horizontal-tb;
        color: whitesmoke;
        height: 100%;
        width: 85px;
    }

    .date-label {
        padding: 5px 0 5px 0;
        max-width: 5px;
        margin-right: .5em;
        font-weight: 500;
    }

    .numberbox {
        text-align: right;
        text-orientation: upright;
        writing-mode: vertical-rl;
        background-color: whitesmoke;
        width: 120px;
        height: 180px;
    }

    @media screen and (max-width: 600px) {
        .numberbox {
            text-align: right;
            text-orientation: inherit;
            writing-mode: horizontal-tb;
            background-color: whitesmoke;
        }

        .countdown {
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
        }

        .countdown > div {
            background-color: whitesmoke;
            width: 250px;
            height: 60px;
            margin: 0;
            flex-direction: row;
            justify-content: space-between;
            padding: 20px;
        }

        div span:last-of-type {
            font-size: 24px;
            text-transform: uppercase;
        }

        .number {
            font-size: 34px;
            margin-left: 0;
            height: 60px;
            background-color: whitesmoke;
            color: black;
        }
    }

    .container {
        color: #333;
        margin: 0 auto;
        text-align: center;
    }

    h1 {
        letter-spacing: .125rem;
        text-transform: uppercase;
        font-size: xx-large;
        text-shadow: 2px 2px 8px rgba(129, 124, 124, 0.9);
    }

    .bgcolor {
        background-color: #D3AC2B;
    }
</style>