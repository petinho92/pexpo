import FaIcon from "gold-admin/fa-icon";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";
import controls from "gold-admin/form-input/controls"
import Form, {button, buttons, form} from "gold-admin/form/form";
import type Entity from "gold-admin/entity-type";
import CustomStringControl from "src/controls/custom-string/control";
import type {SvelteComponent} from "svelte";
import {comment} from "postcss";
import HelperComponent from "content-helper.svelte";



@form(
    FaIcon.s("folder-grid"),
    "/api/content/item",
    (item, id) => id === null ? "new content" : item.name
)
@button(buttons.save)
@button(buttons.delete)
@button(buttons.reload)
export default class ContentForm extends Form {
    build(item: Entity, options: any) {
        this.addSection("Content properties", FaIcon.s("page"))
            .addControl(controls.string("name", "name"))
            .addControl(controls.text("content_hu", "Tartalom (HU)"))
            .addControl(controls.text("content_en", "Content (EN)"))
            .addControl(controls.switch("active", "active"))
    }
}