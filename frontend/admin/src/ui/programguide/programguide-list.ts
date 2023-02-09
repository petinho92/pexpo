import type Entity from "gold-admin/entity-type";
import FaIcon from "gold-admin/fa-icon";
import List, {button, buttons, filterComponent, list} from "gold-admin/list/list";
import ProgramguideForm from "src/ui/programguide/programguide-form";

@list(
    "Programguides",
    FaIcon.s("books"),
    "/api/programguide/list",
    ProgramguideForm
)
@button(buttons.new)
export default class ProgramguideList extends List{
    cardifyItem(item: Entity): Entity {
        return {
            click: () => this.open(item.id),
            id: item.id,
            title: item.name,
            icon: item.active === true ? [FaIcon.s("book").prop("color", "green")] : [FaIcon.s("book").prop("color", "gray")],
            active: true,
            properties: [
                {label: 'created', value: item.created},
                {label: 'updated', value: item.updated},
            ],
            avatar: item.picture,
        }
    }
}