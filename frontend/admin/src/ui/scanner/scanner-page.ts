import ScannerComponents from 'src/ui/scanner/scanner-page.svelte';
import {writable} from "svelte/store";
import type {Writable} from "svelte/store";
import FaIcon from "gold-admin/fa-icon";
import AbstractPage from "gold-admin/app/abstract-page";
import type {SvelteComponent} from "svelte";

export default class ScannerPage extends AbstractPage{
    public closeable: boolean = false;
    get $title(): Writable<string> {return writable('QR Scanner'); }
    get $icon(): Writable<FaIcon> {return writable(FaIcon.s("barcode"));}
    get component(): typeof SvelteComponent {return ScannerComponents;}
}