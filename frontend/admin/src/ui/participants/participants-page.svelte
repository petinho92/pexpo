<script lang="ts">
    import AbstractPage from "gold-admin/app/abstract-page";

    export let page: AbstractPage;

    import {onMount} from 'svelte';
    import {Card, CardBody, CardHeader, Input, Table, Column, Styles, CardFooter} from 'sveltestrap';
    import Clipboard from "svelte-clipboard";
    import * as bulmaToast from 'bulma-toast'

    let search = undefined;
    let users = [];
    $: visibleUsers = search ?
        users.filter(user => {
            return user.name.match(`${search}.*`) || user.email.match(`${search}.*`) || user.neptun.match(`${search}.*`) || user.name.toLowerCase().match(`${search}.*`) || user.neptun.toLowerCase().match(`${search}.*`)
        }) : users;
    onMount(async () => {
        const resp = await fetch('/api/registration/get')
        const data = await resp.json();
        users = data

        ;
        console.log(users)
    });

</script>

<Card>
    <CardHeader>
        <div class="control has-icons-right searchbox">
            <input type="search" bind:value={search} placeholder="Search..." class="input"/>
            <span class="icon is-small is-right"><i class="fas fa-search"></i></span>
        </div>
    </CardHeader>

    <CardBody>
        <Table striped rows={visibleUsers} let:row={user} responsive={true}>
            <Column header="Name">
                {user.name}
            </Column>
            <Column header="Neptun">
                {user.neptun}
            </Column>
            <Column header="Email">
                {user.email}
            </Column>
            <Column header="Copy QRCode">
                <Clipboard
                        text={user.qrcode}
                        let:copy
                        on:copy={() => {
                            bulmaToast.toast({ message: 'Has Copied to Clipboard', type: 'is-success', position: 'bottom-right', closeOnClick: true })
                         }}>
<!--                    <button on:click={copy}>Copy QR Code</button>-->
                        <i class="fas fa-copy" on:click={copy}></i>
                </Clipboard>

            </Column>
        </Table>
    </CardBody>

</Card>

<style>
    .searchbox {
        margin: 1em 0 1em 1em;
        border-radius: 4px;
        color: white;
    }

    .input {
        color: black;
        background-color: white;
    }

    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: black;
        opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: black;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
        color: black;
    }

    .fa-copy{
        color: #257953;
        cursor: pointer;
    }

    .fa-copy:hover{
        color: #6fc59f;
    }
</style>