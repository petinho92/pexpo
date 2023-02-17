import type Entity from "gold-admin/entity-type";
import FaIcon from "gold-admin/fa-icon";
import List, {button, buttons, filterComponent, list} from "gold-admin/list/list";
import ContentForm from "src/ui/content/content-form";
import C_ContentListFilter from "./content-list-filter.svelte";
import moment from "moment";


@list(
    "Contents",
    FaIcon.s("pager"),
    "/api/content/list",
    ContentForm
)
// @button(buttons.new)
@filterComponent(C_ContentListFilter)
export default class ContentList extends List {
    cardifyItem(item: Entity): Entity {
        return {
            click: () => this.open(item.id),
            id: item.id,
            title: item.name,
            properties: [
                {label: 'created', value: moment(item.created, "YYYY-MM-DD").fromNow()},
                {label: 'updated', value: moment(item.updated, "YYYY-MM-DD").fromNow()},
                {label: 'page', value: item.page},
            ],
            icon: item.active === true ? [FaIcon.s("pager").prop("color", "green")] : [FaIcon.s("pager").prop("color", "grey")],
            active: true,
            avatar: item.picture,
        }
    }
}