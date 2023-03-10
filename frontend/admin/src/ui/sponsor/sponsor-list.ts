import type Entity from "gold-admin/entity-type";
import FaIcon from "gold-admin/fa-icon";
import List, {button,buttons,list} from "gold-admin/list/list";
import SponsorForm from "src/ui/sponsor/sponsor-form";
import moment from "moment";

@list(
    "Sponsors",
    FaIcon.s("certificate"),
    "/api/sponsor/list",
    SponsorForm
)
@button(buttons.new)
export default class SponsorList extends List{
    cardifyItem(item: Entity): Entity {
        return {
            click: () => this.open(item.id),
            id: item.id,
            title: item.name,
            icon: item.active === true ? [FaIcon.s("certificate").prop("color", "green")] : [FaIcon.s("certificate").prop("color", "grey")],
            active: true,
            properties: [
                {label: 'created', value: moment(item.created).fromNow()},
                {label: 'updated', value: moment(item.updated).fromNow()},
            ],
            avatar: item.picture,
        }
    }
}