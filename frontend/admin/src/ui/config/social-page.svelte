<script type="ts">
    import {imask} from '@imask/svelte';
    import IMask from 'imask'

    let counter = {
        active: false,
        counter_date: "",
        event_date: ""
    }
    let okay = false

    let data = [];

    async function getData() {
        const response = await fetch("/api/config/get");
        data = await response.json();
        counter = data.counter;
    }

    getData();

    function handleFormData() {
        fetch('/api/config/save', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(counter)
        }).then(function (response) {
            if(response.ok){
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
            <label class="label is-small has-text-primary-dark">Akt??v:</label>
            <label class="switch">
                <input type="checkbox" bind:checked={counter.active}/>
                <span class="slider round"></span>
            </label>

            <br>
            <!--            <input type="text" pattern="(20[0-9]{2}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9])" placeholder="YYYY-MM-DD HH:MM:SS" class="masked" data-valid-example="2023-04-13 09:30:00"/>-->
            <label class="label is-small has-text-primary-dark">Megnyit?? id??pontja (YYYY-MM-DD HH:MM:SS)</label><input
                use:imask={options} bind:value={counter.counter_date}>
            <label class="label is-small has-text-primary-dark">Esem??ny id??pontja (YYYY.MM.DD-DD.)</label><input
                bind:value={counter.event_date}>
            {#if okay}
                <label class="label is-small has-background-success has-text-white">Sikeresen friss??tve</label>
            {/if}
        </div>
    </div>
    <br>
    <button on:click={handleFormData}>Friss??t??s</button>
</div>

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