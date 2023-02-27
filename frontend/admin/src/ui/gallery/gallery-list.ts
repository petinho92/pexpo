import type Entity from "gold-admin/entity-type";
import FaIcon from "gold-admin/fa-icon";
import List, {button, buttons, filterComponent, list} from "gold-admin/list/list";
import GalleryForm from "src/ui/gallery/gallery-form";
import moment from "moment";

@list(
    "Galleries",
    FaIcon.s("images"),
    "/api/gallery/list",
    GalleryForm
)
@button(buttons.new)
export default class GalleryList extends List{
    cardifyItem(item: Entity): Entity {
        return {
            click: () => this.open(item.id),
            id: item.id,
            title: item.name,
            active: true,
            icon: item.active === true ? [FaIcon.s("image").prop("color", "green")] : [FaIcon.s("image").prop("color", "grey")],
            subtitle: item.year + " " + item.category,
            properties: [
                {label: 'year', value: item.year},
                {label: 'category', value: item.category},
                {label: 'created', value: moment(item.created).fromNow()},
                {label: 'updated', value: moment(item.updated).fromNow()}
            ],
            avatar: item.picture,
        }
    }
}