<script lang="ts">

    import Control from "src/controls/custom-WYSIWYG/control";
    import type Page from "gold-admin/form/form-page";

    export let page: Page;
    export let control: Control;
    export let item;
    export let onChange: Function;
    let field = control.field;
    import Editor from '@tinymce/tinymce-svelte';

    let conf = {
        toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | code fullscreen',
        toolbar_mode: 'wrap',
        toolbar_sticky: true,
        toolbar_persist: true,
        toolbar_location: 'auto',
        fixed_toolbar_container: 'toolbar',
        menu: {
            file: { title: 'File', items: 'newdocument restoredraft | preview | export print | deleteallconversations' },
            edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' },
            view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments' },
            insert: { title: 'Insert', items: 'image link media addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' },
            tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' },
            table: { title: 'Table', items: 'inserttable | cell row column | advtablesort | tableprops deletetable' },
            help: { title: 'Help', items: 'help' }
        },
        plugins: 'advlist link image table lists save code fullscreen wordcount',
        contextmenu: 'link | cut copy paste pasteastext | styles block | forecolor backcolor | inserttable',
        element_format : 'html',
        skin: "oxide-dark",
        content_css: "dark",
        branding: false,
        draggable_modal: true,
        inline: false,
        // content_css: 'document',
        color_map: [
            '000000', 'Black',
            '808080', 'Gray',
            'FFFFFF', 'White',
            'FF0000', 'Red',
            'e7d69e', 'Link',
            '624a00', 'Link Hover',
            'D3AC2B', 'Expo Yellow',
            '101522', 'Footer Dark Blue',
            '0000FF', 'Blue'
        ],
        min_height: 1000


    }
</script>

<Editor
        scriptSrc="/~admin/assets/tinymce/js/tinymce/tinymce.min.js"
        {conf}
        bind:value={item[field]}
        on:change={onChange}
/>
