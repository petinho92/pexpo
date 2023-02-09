import FaIcon from "gold-admin/fa-icon";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";
import controls from "gold-admin/form-input/controls";
import Form, {button,buttons,form} from "gold-admin/form/form";
import type Entity from "gold-admin/entity-type";
import CheckboxesControl from "src/controls/custom-checkboxes/control";
import CustomStringControl from "src/controls/custom-string/control";
let hu_cat:Array<string> = ["apartman","szálloda", "panzió", "vendégház"];
let en_cat:Array<string> = ["apartment", "hotel", "bed and breakfast", "guest house"];

@form(
    FaIcon.s("hotel"),
    "api/hotel/item",
    (item, id) => id === null ? "new hotel" : item.name
)
@button(buttons.save)
@button(buttons.delete)
@button(buttons.reload)
@button(attachmentButton(new AttachmentApi('/api/hotel/attachment'), {"picture": "Picture"}))
export default class HotelForm extends Form {
    build(item: Entity, options: any) {
        this.addSection("Hotel general properties", FaIcon.s("hotel"))
            .addControl(controls.string("name", "name"))
            .addControl(controls.select("star",).setOptions(['⭐⭐⭐⭐⭐','⭐⭐⭐⭐','⭐⭐⭐','⭐⭐','⭐']))
            .addControl(controls.string("telephone", "telephone"))
            .addControl(controls.string("email", "email"))
            .addControl(controls.string("website", "website"))
            .addControl(controls.string("maps", "maps"))
            .addControl(controls.string("location", "location"))
            .addControl(controls.switch("active", "active").setHint("asd"))
        this.addSection("Hungarian properties", FaIcon.s("hotel"))
            .addControl(controls.select("hu_type",).setOptions(hu_cat))
            .addControl(controls.text("hu_desc", "description"))
            .addControl(new CheckboxesControl("hu_services",).setOptions(["&#127359; parkolás","&#9880;; wellness", "&#128246; ingyenes WiFi","&#128054; állatbarát","&#127869; étterem", "&#127864; bár", ]))
        this.addSection("English properties", FaIcon.s("hotel"))
            .addControl(controls.select("en_type",).setOptions(en_cat))
            .addControl(controls.text("en_desc", "description"))
            .addControl(new CheckboxesControl("hu_services",).setOptions(["&#127359; parking","&#9880;; Spa and wellness centre", "&#128246; free WiFi","&#128054; Pets allowed","&#127869; Restaurant", "&#127864; Bar", ]))

    }
}