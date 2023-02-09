<script lang="ts">
    let desc;
    let serv;

    fetch('/hotel/getcollection/gethotels')
        .then((response) => response.json())
        .then((data) => {
            desc = data[0].hu_desc;
            serv = data[0].hu_services;
            console.log(serv);
        })
    let emoji = "&#128246;";

</script>

<h1 class="title has-text-danger">ALMA</h1>

{@html serv}
{@html emoji}

