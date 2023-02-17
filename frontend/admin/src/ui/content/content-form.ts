import FaIcon from "gold-admin/fa-icon";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";
import controls from "gold-admin/form-input/controls"
import Form, {button, buttons, form} from "gold-admin/form/form";
import type Entity from "gold-admin/entity-type";
import CustomEditorControl from "src/controls/custom-WYSIWYG/control";


@form(
    FaIcon.s("folder-grid"),
    "/api/content/item",
    (item, id) => id === null ? "new content" : item.name
)
@button(buttons.save)
@button(buttons.delete)
@button(buttons.reload)
@button(attachmentButton(new AttachmentApi("/api/content/attachment"), {"picture": "Picture", "files": "Files"}))
export default class ContentForm extends Form {
    build(item: Entity, options: any) {
        this.addSection("Content properties", FaIcon.s("page"))
            .addControl(controls.string("name", "name"))
            .addControl(controls.select("page",).setOptions(["services","home","none"]).setRole("admin"))
            .addControl(controls.select("category",).setOptions(["none", "whatis", "footer"]).setRole("admin"))
            .addControl(new CustomEditorControl("content_hu", "Tartalom"))
            .addControl(new CustomEditorControl("content_en", "Content"))
            .addControl(controls.switch("active", "active"))
    }
}