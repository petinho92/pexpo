import FaIcon from "gold-admin/fa-icon";
import AbstractPage from "gold-admin/app/abstract-page";
import type {SvelteComponent} from "svelte";
import SocialComponent from "./social-page.svelte";
import {writable} from "svelte/store";
import type {Writable} from "svelte/store";

export default class SocialPage extends AbstractPage {
    public closeable: boolean = false;
    get $title(): Writable<string> {return writable('Config');}
    get $icon(): Writable<FaIcon> {return writable(FaIcon.s('toolbox'));}
    get component(): typeof SvelteComponent { return SocialComponent; }
}
