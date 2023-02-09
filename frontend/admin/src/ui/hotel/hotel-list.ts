import type Entity from "gold-admin/entity-type";
import FaIcon from "gold-admin/fa-icon";
import List, {button, buttons, list} from "gold-admin/list/list";
import HotelForm from "src/ui/hotel/hotel-form";

@list(
    "Hotels",
    FaIcon.s("bed"),
    "/api/hotel/list",
    HotelForm
)
@button(buttons.new)
export default class HotelList extends List{
    cardifyItem(item: Entity): Entity {
        return {
            click: () => this.open(item.id),
            id: item.id,
            title: item.name,
            subtitle: item.category,
            icon: item.active === true ? [FaIcon.s("bed").prop("color", "green")] : [FaIcon.s("bed").prop("color", "grey")],
            active: true,
            properties: [
                {label: 'created', value: item.created},
                {label: 'updated', value: item.updated},
            ],
            avatar: item.picture,
        }
    }
}