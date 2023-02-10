import Welcome from "src/pages/welcome/Welcome.svelte";
import Program from "src/pages/programs/Program.svelte";
import Accommodations from "src/pages/hotels/Accommodations.svelte";
import StudentRegistration from "src/pages/registration/StudentRegistration.svelte";
import ProgramGuide from "src/pages/programguide/ProgramGuide.svelte";
import Sponsors from "src/pages/sponsors/Sponsors.svelte";
import GalleryPage from "src/pages/gallery/GalleryPage.svelte";
import Services from "src/pages/services/Services.svelte";

const routes = {
 "/" : Welcome,
 "/programs" : Program,
 "/programguide": ProgramGuide,
 "/sponsors": Sponsors,
 "/services": Services,
 "/gallery": GalleryPage,
 "/accommodation": Accommodations,
 "/student": StudentRegistration,
}
export default routes;
