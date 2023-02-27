import FaIcon from "gold-admin/fa-icon";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";
import controls from "gold-admin/form-input/controls";
import Form, {button,buttons,form} from "gold-admin/form/form";
import type Entity from "gold-admin/entity-type";
import CheckboxesControl from "src/controls/custom-checkboxes/control";
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
            .addControl(controls.number("discount", "discount(%)").setMin(0).setMax(100))
            .addControl(controls.string("telephone", "telephone"))
            .addControl(controls.string("email", "email"))
            .addControl(controls.string("website", "website"))
            .addControl(controls.string("maps", "maps"))
            .addControl(controls.string("location", "location"))
            .addControl(controls.switch("active", "active").setHint("asd"))
        this.addSection("Hungarian properties", FaIcon.s("hotel"))
            .addControl(controls.select("hu_type",).setOptions(hu_cat))
            .addControl(controls.text("hu_desc", "description"))
            .addControl(new CheckboxesControl("hu_services",).setOptions(["&#127359; parkolás","&#9969; wellness", "&#128246; ingyenes WiFi","&#128054; állatbarát","&#127836; étterem", "&#127864; bár", "&#127946; medence", "&#128685; nemdohányzó szobák", "&#128106; családi szobák", "&#9855; akadálymentesített", "&#128748; reptéri transzfer", "&#127479; éjjel-nappali recepció", "&#128718; szobaszervíz", "&#129374; reggeli" ]))
        this.addSection("English properties", FaIcon.s("hotel"))
            .addControl(controls.select("en_type",).setOptions(en_cat))
            .addControl(controls.text("en_desc", "description"))
            .addControl(new CheckboxesControl("en_services",).setOptions(["&#127359; parking","&#9969; Spa and wellness centre", "&#128246; free WiFi","&#128054; pets allowed","&#127836; restaurant", "&#127864; bar", "&#127946; pool", "&#128685; non-smoking rooms", "&#128106; family rooms", "&#9855; facilities for disabled guest", "&#128748; airport transfer", "&#127479; 24-hour front desk", "&#128718; room service", "&#129374; breakfast"]))

    }
}