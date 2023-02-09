import FaIcon from "gold-admin/fa-icon";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";
import controls from "gold-admin/form-input/controls"
import Form, {button, buttons, form} from "gold-admin/form/form";
import type Entity from "gold-admin/entity-type";
import CheckboxesControl from "src/controls/custom-checkboxes/control";

@form(
    FaIcon.s("book"),
    "/api/programguide/item",
    (item, id) => id === null ? "new programguide" : item.name
)
@button(buttons.save)
@button(buttons.reload)
@button(buttons.delete)
@button(attachmentButton(new AttachmentApi("/api/programguide/attachment"), {"picture": "Picture", "files": "Files"}))

export default class ProgramguideForm extends Form {
    build(item: Entity, options: any) {
        this.addSection("Programguide properties", FaIcon.s("book"))
            .addControl(controls.string("name", "name"))
            .addControl(controls.string("date", "dates"))
            .addControl(controls.select("hu_type",).setOptions(["Szakmai Kiállítás és konferencia Programfüzet"]))
            .addControl(controls.select("en_type",).setOptions(["Trade Exhibition and Conference Programme"]))
            .addControl(controls.switch("active", "active"))
    }
}