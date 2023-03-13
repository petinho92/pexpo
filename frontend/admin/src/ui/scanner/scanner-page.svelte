<script lang="ts">
    import {scannerData, days, rooms} from "src/ui/scanner/component/programs";
    import {writable} from "svelte/store";

    let success = writable(true);
    let visible = writable(false);

    let user = {
        date: "",
        room: "",
        phase: "",
        qrcode: ""
    };

    const firstDayMorning = "2023.04.13.";
    const firstDayAfternoon = "";
    const secondDayMorning = "2023.04.14.";
    const secondDayAfternoon = "";


    let inputQR = "";
    let responseData;
    let message = writable("");
    function onRegister(event) {
        if (event.key === 'Enter') {
            user.qrcode = inputQR;
            fetch('/api/scanner/save', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(user)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.statusCode === 422) {
                        $success = false;
                        $visible = true;
                        $message = data.message;
                    } else if (data.statusCode === 200) {
                        $success = true;
                        $visible = true;
                        responseData = data;
                    }
                })
                .finally(inputQR = "")
        }
    }

</script>

<div class='container'>
    <div class='columns is-mobile is-centered'>
        <div class='column is-7-desktop column is-10-mobile has-background-info-light'>
            <div class="card mb-6">
                <div class="card-content">

                    <p class="title has-text-centered is-size-4-mobile">QR Scanner</p>
                    <p class="subtitle is-5 has-text-left"></p>

                </div>
                <div class="is-divider is-info" data-content="Adatok"></div>
                <div class="content">
                    <div class="field ml-5 mr-5">
                        <label class="label has-text-left">Nap<b class="has-text-danger"></b></label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select bind:value={user.date}>
                                    <option value="">Kérem válasszon!</option>
                                    {#each days as day}
                                        <option value={day.name}>{day.name} - {day.day}</option>
                                    {/each}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field ml-5 mr-5">
                        <label class="label has-text-left">Terem<b class="has-text-danger"></b></label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select bind:value={user.room}>
                                    <option value="">Kérem válasszon!</option>
                                        {#each rooms as room}
                                            <option value={room.name}>{room.name}</option>
                                        {/each}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field ml-5 mr-5">
                        <label class="label has-text-left">Előadás<b class="has-text-danger"></b></label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select bind:value={user.phase}>
                                    <option value="">Kérem válasszon!</option>
                                    {#each scannerData as program}
                                        {#if user.room === program.room && user.date === program.date}
                                            <option value={program.phase}>{program.time} - {program.phase}</option>
                                        {/if}
                                    {/each}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="field ml-5 mr-5">
                            <label class="label has-text-left">QR kód<b class="has-text-danger">*</b></label>
                            <div class="control">
                                <input class="input" type="text" bind:value={inputQR} placeholder="QR kód"
                                       on:keydown={onRegister}/>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class='container'>
    <div class='columns is-mobile is-centered is-bold'>
        <div class='column is-7-desktop column is-10-mobile is-bold' class:is-hidden={!$visible}
             class:has-background-success={$success} class:has-background-danger={!$success}>
            {#if $success && responseData != undefined}
                <table class="fl-table">
                    <tr>
                        <td class="titlelabel">Név:</td>
                        <td class="titlelabel">Egyetemi azonosító:</td>
                    </tr>
                    <tr>
                            <td class="titlevalue">{responseData.name}</td>
                            <td class="titlevalue">{responseData.neptun}</td>
                    </tr>
                    <tr>
                        <td colspan="2">{responseData.qrcode}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><h2 class="center">Sikeres leolvasás!</h2></td>
                    </tr>
                </table>
            {/if}
            {#if !$success}
                <h1 class="has-text-centered has-text-white"><br><b>Hiba!</b><br>{$message}</h1>
            {/if}
        </div>
    </div>
</div>

<style>
    .titlelabel {
        font-size: 20px;
    }

    .titlevalue {
        font-size: 26px;
        font-weight: bold;
    }

    .center {
        text-align: center;
        color: white;
    }

    .fl-table {
        color: white;
        border-radius: 5px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
    }

    .fl-table td, .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
    }


</style>