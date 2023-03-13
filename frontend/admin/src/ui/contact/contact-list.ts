import type Entity from "gold-admin/entity-type";
import FaIcon from "gold-admin/fa-icon";
import List, {button, buttons, filterComponent, list} from "gold-admin/list/list";
import moment from "moment";
import ContactForm from "src/ui/contact/contact-form";

@list(
    "Contacts",
    FaIcon.b("fa-reddit-alien"),
    "/api/contact/list",
    ContactForm
)
@button(buttons.new)
export default class ContactList extends List{
    cardifyItem(item: Entity): Entity {
        return {
            click: () => this.open(item.id),
            id: item.id,
            title: item.lastname + " " + item.firstname,
            active: true,
            icon: item.active === true ? [FaIcon.b("fa-reddit-alien").prop("color", "green")] : [FaIcon.b("fa-reddit-alien").prop("color", "grey")],
            subtitle: item.major_hu,
            properties: [
                {label: 'created', value: moment(item.created).fromNow()},
                {label: 'updated', value: moment(item.updated).fromNow()}
            ],
            avatar: item.picture,
        }
    }
}