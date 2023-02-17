import type Entity from "gold-admin/entity-type";
import FaIcon from "gold-admin/fa-icon";
import List, {button, buttons, filterComponent, list} from "gold-admin/list/list";
import UserForm from "./user-form";
import C_UserListFilter from "./user-list-filter.svelte";
import moment from "moment";

@list(
	"Users",
	FaIcon.s("users"),
	"/api/user/list",
	UserForm
)
@button(buttons.new)
@filterComponent(C_UserListFilter)
export default class UserList extends List {
	cardifyItem(item: Entity) {
		return {
			click: () => this.open(item.id),
			id: item.id,
			title: item.name,
			icon: item.group === "supersaiyan" ? [FaIcon.s("user").prop("color", "orange")] : [FaIcon.s("user").prop("color", "gray")],
			active: true,
			subtitle: item.email,
			properties: [
				{label: 'created', value: moment(item.created).fromNow()},
				{label: 'updated', value: moment(item.updated).fromNow()},
			],
			avatar: item.avatar,
		}
	}
}
