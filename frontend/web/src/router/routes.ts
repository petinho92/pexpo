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
import Registration from "src/pages/registration/Registration.svelte";
import Contact from "src/pages/contact/Contact.svelte";
import GetQRCode from "src/pages/qrcode/GetQRCode.svelte";


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
    userData: {hu: 'Kezdőlap', en: 'Welcome', active:true}
}));
routes.set('/programguide', wrap({
    component: ProgramGuide,
    userData: {hu: 'Programfüzet', en: 'Programguide', active:true}
}));
routes.set('/sponsors', wrap({
    component: Sponsors,
    userData: {hu: 'Szponzorok', en: 'Sponsors', active:true}
}));
routes.set('/services', wrap({
    component: Services,
    userData: {hu: 'Szolgáltatások', en: 'Services', active:true}
}));
routes.set('/gallery', wrap({
    component: GalleryPage,
    userData: {hu: 'Galéria', en: 'Gallery', active:true}
}));
routes.set('/accommodation', wrap({
    component: Accommodations,
    userData: {hu: 'Szálláslehetőségek', en: 'Accommodation', active:true}

}));
routes.set('/student', wrap({
    component: StudentRegistration,
    userData: {hu: 'Hallgatóknak', en: 'Student', active:false}
}));
routes.set('/asd', wrap({
    component: Registration,
    userData: {hu: 'Hallgatóknak', en: 'Student', active:true}
}));
routes.set('/contact', wrap( {
    component: Contact,
    userData: {hu: 'Kapcsolat', en: 'Contact', active: true}
}));
routes.set('/qr/:code', wrap( {
    component: GetQRCode,
    userData: {hu: 'QR kód', en: 'QC code', active: false}
}));

export default routes;