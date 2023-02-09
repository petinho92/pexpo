import Form, {button,buttons,form} from "gold-admin/form/form";
import FaIcon from "gold-admin/fa-icon";
import type Entity from "gold-admin/entity-type";
import controls from "gold-admin/form-input/controls";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";

@form(
    FaIcon.s('dollar-sign'),
    'api/sponsor/item',
    (item, id) => id === null ? "new sponsor" : item.name
)
@button(buttons.save)
@button(buttons.delete)
@button(buttons.reload)
@button(attachmentButton(new AttachmentApi('/api/sponsor/attachment'),{"picture": "Picture"}))
export default class SponsorForm extends Form{
    build(item: Entity, options: any) {
        this.addSection("Sponsor general properties", FaIcon.s("dollar-sign"))
            .addControl(controls.string("name", "name"))
            .addControl(controls.string("website", "website"))
            .addControl(controls.switch("active", "active"))
    }
}