<script>
    import {TabPanel, TabList, Tab, Tabs} from 'svelte-tabs'
    import {programs} from "./data/programData.ts"
    // import Program from "src/pages/programs/data/program.ts"
    import loadData from "src/services/asyncFetch";

</script>
<Tabs>


    <TabList>
        {#each Array(2) as _, i}
            <Tab>{i + 1}. nap</Tab>
        {/each}
    </TabList>
    {#each Array(2) as _, i}


        <TabPanel>
            {#each programs as program}
                {#if program._day === (i + 1)}
                    <li class="table-row">
                        <div class="col col-1 time" data-label="Időpont"> {program._startDate}
                            - {program._endDate}</div>
                        <div class="col col-2 event" data-label="Előadás neve">{program._name}</div>
                        <div class="col col-3 place" data-label="Terem">{program._room}</div>
                    </li>
                {/if}
            {/each}
        </TabPanel>
    {/each}
</Tabs>


<style>
    .time {
    }

    sup {
        vertical-align: super;
        font-size: 10px;
    }

    .event {
        font-weight: bold;
    }

    .place {
        color: #797878;
        font-style: italic;
    }

    .container {
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 10px;
        padding-right: 10px;
    }

    .responsive-table li {
        border-radius: 3px;
        padding: 25px 30px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .responsive-table .table-header {
        background-color: #95A5A6;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .responsive-table .table-row {
        background-color: #ffffff;
        box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
    }

    .responsive-table .col-1 {
        flex-basis: 10%;
    }

    .responsive-table .col-2 {
        flex-basis: 40%;
    }

    .responsive-table .col-3 {
        flex-basis: 25%;
    }

    .responsive-table .col-4 {
        flex-basis: 25%;
    }

    @media all and (max-width: 767px) {
        .responsive-table .table-header {
            display: none;
        }

        .responsive-table li {
            display: block;
        }

        .responsive-table .col {
            flex-basis: 100%;
        }

        .responsive-table .col {
            display: flex;
            padding: 10px 0;
        }

        .responsive-table .col:before {
            color: #6C7A89;
            padding-right: 10px;
            content: attr(data-label);
            flex-basis: 50%;
            text-align: left;
        }

        .event {
            text-align: left;
            font-size: 12px;
            font-weight: normal;
        }

        .time {
            text-align: left;
            font-size: 12px;
        }

        .place {
            text-align: left;
            font-size: 12px;
        }

        sup {
            font-size: 8px;
        }
    }
</style>