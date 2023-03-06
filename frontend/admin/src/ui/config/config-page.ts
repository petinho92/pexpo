import FaIcon from "gold-admin/fa-icon";
import AbstractPage from "gold-admin/app/abstract-page";
import type {SvelteComponent} from "svelte";
import ConfigComponent from "./config-page.svelte";
import {writable} from "svelte/store";
import type {Writable} from "svelte/store";

export default class ConfigPage extends AbstractPage {
    public closeable: boolean = false;
    get $title(): Writable<string> {return writable('Config');}
    get $icon(): Writable<FaIcon> {return writable(FaIcon.s('toolbox'));}
    get component(): typeof SvelteComponent { return ConfigComponent; }
}
