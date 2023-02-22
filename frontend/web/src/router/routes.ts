import Welcome from "src/pages/welcome/Welcome.svelte";
import Program from "src/pages/programs/Program.svelte";
import Accommodations from "src/pages/hotels/Accommodations.svelte";
import StudentRegistration from "src/pages/registration/StudentRegistration.svelte";
import ProgramGuide from "src/pages/programguide/ProgramGuide.svelte";
import Sponsors from "src/pages/sponsors/Sponsors.svelte";
import GalleryPage from "src/pages/gallery/GalleryPage.svelte";
import Services from "src/pages/services/Services.svelte";
import {wrap} from "svelte-spa-router/wrap";
import {_} from "svelte-i18n";


//
// const routes = {
//  "/" : Welcome,
//  "/programs" : Program,
//  "/programguide": ProgramGuide,
//  "/sponsors": Sponsors,
//  "/services": Services,
//  "/gallery": GalleryPage,
//  "/accommodation": Accommodations,
//  "/student": StudentRegistration,
// }
// export default routes;


export const routes = new Map();

routes.set('/', wrap({
    component: Welcome,
    userData: {hu: 'Kezdőlap', en: 'Welcome'}
}));
routes.set('/programs', wrap({
    component: Program,
    userData: {hu: 'Programok', en: 'Programs'}
}));
routes.set('/programguide', wrap({
    component: ProgramGuide,
    userData: {hu: 'Programfüzet', en: 'Programguide'}
}));
routes.set('/sponsors', wrap({
    component: Sponsors,
    userData: {hu: 'Szopnzorok', en: 'Sponsors'}
}));
routes.set('/services', wrap({
    component: Services,
    userData: {hu: 'Szolgáltatások', en: 'Services'}
}));
routes.set('/gallery', wrap({
    component: GalleryPage,
    userData: {hu: 'Galéria', en: 'Gallery'}
}));
routes.set('/accommodation', wrap({
    component: Accommodations,
    userData: {hu: 'Szálláslehetőségek', en: 'Accommodation'}

}));
routes.set('/student', wrap({
    component: StudentRegistration,
    userData: {hu: 'Regisztráció', en: 'Registration'}
}));

export default routes;