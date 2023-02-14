import type Entity from "gold-admin/entity-type";
import FaIcon from "gold-admin/fa-icon";
import List, {button, buttons, filterComponent, list} from "gold-admin/list/list";
import TimelineForm from "src/ui/timeline/timeline-form";


@list(
    "Programguides",
    FaIcon.r("list-alt"),
    "/api/timeline/list",
    TimelineForm
)
@button(buttons.new)
export default class TimelineList extends List{
    cardifyItem(item: Entity): Entity {
        return {
            click: () => this.open(item.id),
            id: item.id,
            title: item.hu_title,
            icon: item.active === true ? [FaIcon.s("list-alt").prop("color", "green")] : [FaIcon.s("list-alt").prop("color", "gray")],
            active: true,
            properties: [
                {label: 'created', value: item.created},
                {label: 'updated', value: item.updated},
            ],
            avatar: item.picture,
        }
    }
}