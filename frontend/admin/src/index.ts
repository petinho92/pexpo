import "./options";
import App from "gold-admin/app.svelte";
import ListManager from "gold-admin/app/list-manager";
import MenuItem from "gold-admin/app/menu-item";
import PageManager from "gold-admin/app/page-manager";
import AuthApi from "gold-admin/auth/auth-api";
import FaIcon from "gold-admin/fa-icon";
import UserForm from "src/ui/user/user-form";
import DashboardPage from "src/ui/dashboard/dashboard-page";
import UserList from "./ui/user/user-list";
import type I_User from "gold-admin/auth/user.interface";
import FormPage from "gold-admin/form/form-page";
import ContentList from "src/ui/content/content-list";
import GalleryList from "src/ui/gallery/gallery-list";
import HotelList from "src/ui/hotel/hotel-list";
import SponsorList from "src/ui/sponsor/sponsor-list";
import ProgramguideList from "src/ui/programguide/programguide-list";
import TimelineList from "src/ui/timeline/timeline-list";
import SocialPage from "src/ui/config/social-page";

window.addEventListener('load', () => {

        let pageManager = new PageManager();
        let listManager = new ListManager();
        let authApi = new AuthApi("/api/auth", () => {
            pageManager.add(new DashboardPage());
            // listManager.add(new UserList());
            // listManager.add(new ContentList());
        });

        function menu(user: I_User | null) {
            return [
                new MenuItem("Dashboard", FaIcon.s("dice-d6"), () => {
                    pageManager.add(new DashboardPage())
                }, "marketing"),
                new MenuItem("Site", FaIcon.s("pager"), [
                    new MenuItem("Contents", FaIcon.s("file"), () => {
                        listManager.add(new ContentList())
                    },"webmaster"),
                    new MenuItem("Gallery", FaIcon.s("images"), () => {
                        listManager.add(new GalleryList())
                    },),
                    new MenuItem("Hotel", FaIcon.s("hotel"), () => {
                        listManager.add(new HotelList())
                    },),
                    new MenuItem("Sponsor", FaIcon.s("dollar-sign"), () => {
                        listManager.add(new SponsorList())
                    },"webmaster"),
                    new MenuItem("Guide", FaIcon.s("book"), () => {
                        listManager.add(new ProgramguideList())
                    },"webmaster"),
                    new MenuItem("Timeline", FaIcon.s("stream"), () => {
                        listManager.add(new TimelineList())
                    },"webmaster")
                ], "marketing"),
                new MenuItem("Settings", FaIcon.s("cogs"), [
                    new MenuItem("Users", FaIcon.s("users"), () => {
                        listManager.add(new UserList())
                    }, "admin"),
                    new MenuItem("Config", FaIcon.s("toolbox"), () => {
                        pageManager.add(new SocialPage())
                    }, "webmaster"),
                ],"webmaster"),

            ]
        }

        function userMenu(user: I_User | null) {
            return [new MenuItem("Me", FaIcon.s("user"), () => {
                pageManager.add(new FormPage(new UserForm(user!.id)))
            },"marketing")]
        }

        new App({target: document.body, props: {pageManager, listManager, authApi, menu, userMenu}})
    }
)
