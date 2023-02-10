<script>
    import Content from './components/popup/Content.svelte';
    import Modal from './components/popup/Modal.svelte';
    import {modal} from './data/stores.ts';
</script>

<Modal show={$modal}>
	<Content />
</Modal>

