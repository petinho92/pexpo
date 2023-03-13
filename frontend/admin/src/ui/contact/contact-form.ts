import FaIcon from "gold-admin/fa-icon";
import AttachmentApi from "gold-admin/form-attachment/attachment-api";
import attachmentButton from "gold-admin/form-attachment/form-button";
import controls from "gold-admin/form-input/controls"
import Form, {button, buttons, form} from "gold-admin/form/form";
import type Entity from "gold-admin/entity-type";

let majorhu:Array<string> = ["építész", "építőmérnök", "épületgépész", "gépész", "informatika", "környezetvédelem", "labortechnika", "villamos"];
let majoren:Array<string> = ["építész", "építőmérnök", "épületgépész", "gépész", "informatika", "környezetvédelem", "labortechnika", "villamos"];
let sectionhu:Array<string> = ["Főszervezők", "Épületgépészet szakterület", "Általános gépészet szakterület", "Villamos szakterület", "Informatika szakterület", "Építész - Belsőépítész - Bútortervezés - Design - Építéskivitelezés szakterület", "Építőmérnök szakterület", "Környezetvédelem szakterület", "Labortechnika szakterület"];
let sectionen:Array<string> = [""];














@form(
    FaIcon.b("fa-reddit-alien"),
    "/api/contact/item",
    (item, id) => id === null ? "new contact" : item.lastname + " " + item.firstname
)
@button(buttons.save)
@button(buttons.delete)
@button(buttons.reload)
@button(attachmentButton(new AttachmentApi("/api/contact/attachment"), {"picture": "Profilkép"}))
export default class ContactForm extends Form{
    build(item: Entity, options: any) {
        this.addSection("Name properties", FaIcon.s("fa-signature"))
            .addControl(controls.string('prefix', "prefix").setLayout("row"))
            .addControl(controls.string('lastname', "lastname").setLayout("row"))
            .addControl(controls.string('firstname', "firstname").setLayout("row"))
        this.addSection("Contact properties", FaIcon.s("fa-id-card"))
            .addControl(controls.string("email", "email"))
            .addControl(controls.string("telephone", "telephone"))
            .addControl(controls.string("mobile", "mobile"))
        this.addSection("Category properties", FaIcon.s("fa-university"))
            .addControl(controls.select("section_hu", "kategória").setOptions(sectionhu))
            .addControl(controls.select("section_en", "category").setOptions(sectionen))
        this.addSection("Major properties", FaIcon.s("fa-university"))
            .addControl(controls.checkboxes("major_hu", "szak").setOptions(majorhu).setHint("row"))
            .addControl(controls.checkboxes("major_en", "specialisation").setOptions(majoren))
        this.addSection("Settings", FaIcon.s("fa-user-cog"))
            .addControl(controls.switch("active", "active"))
    }
}