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
            <Countdown from="{$data.counter.counter_date}" dateFormat="YYYY-MM-DD H:m:s" zone="Europe/Budapest" let:remaining>
                <div class="container">
                    <h1 class="has-text-weight-bold" id="headline">{$_('countdown.text')}</h1>
                    <span class="is-size-3">{$data.counter.event_date}</span>
                    {#if remaining.done === false}
                        <div id="countdown" class="clock">
                            <ul>
                                {#if remaining.months > 0}
                                    <li><span class="is-size-4" id="months">{remaining.months}</span><span
                                            class="is-size-5">{$_('countdown.month')}</span></li>
                                {/if}
                                <li><span class="is-size-4" id="days">{remaining.days}</span><span
                                        class="is-size-5">{$_('countdown.day')}</span></li>
                                <li><span class="is-size-4" id="hours">{remaining.hours} </span><span
                                        class="is-size-5">{$_('countdown.hour')}</span></li>
                                <li><span class="is-size-4" id="minutes">{remaining.minutes}</span><span
                                        class="is-size-5">{$_('countdown.minute')}</span></li>
                                <li><span class="is-size-4" id="seconds">{remaining.seconds}</span><span
                                        class="is-size-5">{$_('countdown.second')}</span></li>
                            </ul>
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
            </div>

        {/if}
    </section>
{/if}
<style>

    .clock {
        box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
        border-radius: 5px;
        backdrop-filter: blur(14px);
        background-color: rgba(255, 255, 255, 0.2);
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