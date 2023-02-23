<script type="ts">
    import counterFormData from "src/ui/config/formData";
    import FaIcon from "gold-admin/fa-icon";
    import controls from "gold-admin/form-input/controls";
    let counter = new counterFormData();


    let data =[];
    async function getData() {
        console.log("getdata")
        const response = await fetch("/api/config/get");
        data = await response.json();
        counter = data.counter;
        console.log("data:")
        console.log(data)
        console.log("counter:")
        console.log(counter)

    }

    getData();
    function handleFormData(){
        fetch('/api/config/save', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(counter)
        }).then(function (response) {
        })
    }

</script>

<div class="column p-1 is-full">
    <div class="card p-0">
            <header class="card-header  has-background-black">
                <p class="card-header-title mb-0 is-size-7 p-2 pl-3">
                        <span class="mr-2"><i class="fas fa-toolbox"></i></span>
                    Social
                </p>
            </header>
        <div class="content py-2 px-3">
            Content
        </div>
    </div>
    <div class="card p-0">
        <header class="card-header  has-background-black">
            <p class="card-header-title mb-0 is-size-7 p-2 pl-3">
                <span class="mr-2"><i class="fas fa-clock"></i></span>
                Counter
            </p>
        </header>
        <div class="content py-2 px-3">
            <label class="label is-small has-text-primary-dark">Aktív:
            <label class="switch">
                 <input type="checkbox" bind:checked={counter.active} />
                <span class="slider round"></span>
            </label>
            </label>
            <br>
            <label class="label is-small has-text-primary-dark">Megnyitó időpontja:</label><input class="input is-small" type="datetime-local" bind:value={counter.date} min="2023-01-01T08:30"/>
        </div>
    </div>
    <br>
    <button on:click={handleFormData}>Frissítés</button>
</div>

<style lang="scss">
  :root {
    --percentage: 0.6;
  }
  .card {background-color: #000c}

  .switch {
    position: relative;
    display: inline-block;
    width: calc(60px*var(--percentage));
    height: calc(34px*var(--percentage));
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
    height: calc(26px*var(--percentage));
    width: calc(26px*var(--percentage));
    left: calc(4px*var(--percentage));
    bottom: calc(4px*var(--percentage));
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
    -webkit-transform: translateX(calc(26px*var(--percentage)));
    -ms-transform: translateX(calc(26px*var(--percentage)));
    transform: translateX(calc(26px*var(--percentage)));
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: calc(34px*var(--percentage));
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