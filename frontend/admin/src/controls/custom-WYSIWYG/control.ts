// @ts-ignore
import I_OptionSet, {convertToOptionSet, valueLabelPair} from "gold-admin/form-input/option-set.interface";
import AbstractControl, {component, layout} from "gold-admin/form-input/abstract-control";
import Component from "./component.svelte"
import type I_OptionSetApi from "gold-admin/form-input/option-set-api.interface";
import OptionSetApi from "gold-admin/form-input/option-set-api";

@component(Component)
@layout("column")
export default class CustomEditorControl extends AbstractControl {

    public options: Array<I_OptionSet> = [];
    setOptions(options: Array<I_OptionSet>|valueLabelPair|Array<string|any>): this {
        this.options = convertToOptionSet(options);
        return this;
    }


    public api: I_OptionSetApi | null = null;
    setApi(api: I_OptionSetApi | string|any): this {
        this.api = typeof api === "string" ? api = new OptionSetApi(api) : api;
        return this;
    }

}