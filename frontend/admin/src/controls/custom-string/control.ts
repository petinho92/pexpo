import AbstractControl, {component, layout} from "gold-admin/form-input/abstract-control";
import Component from "./component.svelte"

@component(Component)
@layout("column")
export default class CustomStringControl extends AbstractControl {
}
