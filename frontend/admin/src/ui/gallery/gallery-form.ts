import FaIcon from "gold-admin/fa-icon";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";
import controls from "gold-admin/form-input/controls"
import Form, {button, buttons, form} from "gold-admin/form/form";
import type Entity from "gold-admin/entity-type";

let cat:Array<string> = ["sajtofotok", "eloadas", "kiallitas", "fogadas", "esemeny"];

@form(
    FaIcon.s("image"),
    "/api/gallery/item",
    (item, id) => id === null ? "new gallery" : item.name
)
@button(buttons.save)
@button(buttons.delete)
@button(buttons.reload)
@button(attachmentButton(new AttachmentApi("/api/gallery/attachment"), {"picture": "Picture"}))
export default class GalleryForm extends Form {
    build(item: Entity, options: any) {
        this.addSection("Gallery properties", FaIcon.s("file-image"))
            .addControl(controls.string("name", "name"))
            .addControl(controls.string("alt", "alt"))
            .addControl(controls.number("year", "year").setMin(2010).setMax(2050))
            .addControl(controls.select("category",).setOptions(cat))
            .addControl(controls.switch("active", "active"))
    }
}