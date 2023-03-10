import ParticipantsComponents from 'src/ui/participants/participants-page.svelte';
import {writable} from "svelte/store";
import type {Writable} from "svelte/store";
import FaIcon from "gold-admin/fa-icon";
import AbstractPage from "gold-admin/app/abstract-page";
import type {SvelteComponent} from "svelte";

export default class ParticipantsPage extends AbstractPage {
    public closeable: boolean = false;
    get $title(): Writable<string> {return writable('Participants');}
    get $icon(): Writable<FaIcon> {return writable(FaIcon.s('dice-d6'));}
    get component(): typeof SvelteComponent { return ParticipantsComponents; }
}