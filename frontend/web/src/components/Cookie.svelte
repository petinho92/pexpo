<script>
    import Modal from './popup/Modal.svelte';
    import {modal} from "src/components/popup/stores.ts";
    import {onMount} from "svelte";
    import Popup from "src/components/popup/Popup.svelte";
    import {writable} from "svelte/store";

    let allowed = (localStorage.getItem("allowedCookie") !== null ? localStorage.getItem("allowedCookie") : localStorage.setItem("allowedCookie", 'false'));


    onMount(() => {
            if (allowed === 'false' || allowed===undefined || allowed === null) {
                modal.set(Popup);

            }
        }
    )

</script>

<Modal show={$modal} closeButton={false} closeOnOuterClick={false} closeOnEsc={false}/>
