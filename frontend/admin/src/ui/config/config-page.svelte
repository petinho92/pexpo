<script type="ts">
    import {imask} from '@imask/svelte';
    import IMask from 'imask'

    let counter = {
        active: false,
        counter_date: "",
        event_date: ""
    }
    let registration = {
        active: false,
        start_date: "",
        end_date: ""
    }
    let okay = false

    let data = [];

    async function getData() {
        const response = await fetch("/api/config/get");
        data = await response.json();
        counter = data.counter;
        registration = data.registration;
    }
    getData();
    $: console.log(registration)
    function handleFormData() {
        let data = {counter1: counter, registration1: registration};
        $: console.log(data)
        fetch('/api/config/save', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            if (response.ok) {
                okay = true;
            }
        })
    }

    let momentFormat = 'YYYY-MM-DD HH:mm:ss'
    const options = {
        mask: Date,
        pattern: momentFormat,
        blocks: {
            ss: {
                mask: IMask.MaskedRange,
                from: 1,
                to: 59,
                maxLength: 3,
            },
            mm: {
                mask: IMask.MaskedRange,
                from: 1,
                to: 59,
                maxLength: 2,
            },
            HH: {
                mask: IMask.MaskedRange,
                from: 1,
                to: 23,
                maxLength: 2,
            },
            DD: {
                mask: IMask.MaskedRange,
                from: 1,
                to: 31,
                maxLength: 2,
            },
            MM: {
                mask: IMask.MaskedRange,
                from: 1,
                to: 12,
                maxLength: 2,
            },
            YYYY: {
                mask: IMask.MaskedRange,
                from: 2022,
                to: 2050,
            }
        },


    }

</script>

<div class="column p-1 is-full">
    <div class="card p-0">
        <header class="card-header  has-background-black">
            <p class="card-header-title mb-0 is-size-7 p-2 pl-3">
                <span class="mr-2"><i class="fas fa-clock"></i></span>
                Counter
            </p>
        </header>
        <div class="content py-2 px-3">
            <label class="label is-small has-text-primary-dark">Aktív:</label>
            <label class="switch">
                <input type="checkbox" bind:checked={counter.active}/>
                <span class="slider round"></span>
            </label>

            <br>
            <label class="label is-small has-text-primary-dark">Megnyitó időpontja (YYYY-MM-DD HH:MM:SS)</label><input
                use:imask={options} bind:value={counter.counter_date}>
            <label class="label is-small has-text-primary-dark">Esemény időpontja (YYYY.MM.DD-DD.)</label><input
                bind:value={counter.event_date}>
        </div>
    </div>
    <br>

</div>

<div class="column p-1 is-full">
    <div class="card p-0">
        <header class="card-header  has-background-black">
            <p class="card-header-title mb-0 is-size-7 p-2 pl-3">
                <span class="mr-2"><i class="fas fa-clock"></i></span>
                Student registration
            </p>
        </header>
        <div class="content py-2 px-3">
            <label class="label is-small has-text-primary-dark">Aktív:</label>
            <label class="switch">
                <input type="checkbox" bind:checked={registration.active}/>
                <span class="slider round"></span>
            </label>

            <br>
            <label class="label is-small has-text-primary-dark">Hallgatói regisztráció kezdete (YYYY-MM-DD
                HH:MM:SS)</label><input
                use:imask={options} bind:value={registration.start_date}>
            <label class="label is-small has-text-primary-dark">Hallgatói regisztráció vége (YYYY-MM-DD
                HH:MM:SS)</label><input
                use:imask={options} bind:value={registration.end_date}>
        </div>
    </div>
    <br>
</div>
{#if okay}
    <label class="label is-small has-background-success has-text-white">Sikeresen frissítve</label>
{/if}
<button on:click={handleFormData}>Frissítés</button>
<style lang="scss">
  :root {
    --percentage: 0.6;
  }

  .card {
    background-color: #000c
  }


  .switch {
    position: relative;
    display: inline-block;
    width: calc(60px * var(--percentage));
    height: calc(34px * var(--percentage));
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: calc(26px * var(--percentage));
    width: calc(26px * var(--percentage));
    left: calc(4px * var(--percentage));
    bottom: calc(4px * var(--percentage));
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #00d1b2;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #00d1b2;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(calc(26px * var(--percentage)));
    -ms-transform: translateX(calc(26px * var(--percentage)));
    transform: translateX(calc(26px * var(--percentage)));
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: calc(34px * var(--percentage));
  }

  .slider.round:before {
    border-radius: 50%;
  }

  input::-webkit-calendar-picker-indicator {
    cursor: pointer;
    padding: 0;
    width: 20px;
    height: 20px;
    -webkit-text-fill-color: #00d1b2;
    filter: invert(1);
  }
</style>