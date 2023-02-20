import FaIcon from "gold-admin/fa-icon";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";
import controls from "gold-admin/form-input/controls"
import Form, {button, buttons, form} from "gold-admin/form/form";
import type Entity from "gold-admin/entity-type";

@form(
    FaIcon.s("list-alt"),
    "/api/timeline/item",
    (item, id) => id === null ? "new timeline" : item.name
)
@button(buttons.save)
@button(buttons.reload)
@button(buttons.delete)
@button(attachmentButton(new AttachmentApi("/api/timeline/attachment"), {"picture": "Picture"}))
export default class TimelineForm extends Form{
    build(item: Entity, options: any) {
    this.addSection("Timeline properties", FaIcon.s("list-alt"))
        .addControl(controls.string("hu_title", "Cím"))
        .addControl(controls.string("en_title", "Title"))
        .addControl(controls.number("year", "year").setMin(1970).setMax(2050))
        .addControl(controls.text("hu_desc", "Leírás"))
        .addControl(controls.text("en_desc", "Description"))
        .addControl(controls.switch("active", "active"))
    }
}