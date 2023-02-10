export let hotels = [
    {
        id: 1,
        name: "Palatinus Grand Hotel",
        star: "⭐⭐⭐",
        location: "7621 Pécs, Király u. 5.",
        type_hu: "Szálloda",
        type_en: "Hotel",
        description_hu: "<p>A Palatinus Grand Hotel szállása Pécs történelmi központjában, a fő bevásárlóutcán található. A 3 csillagos szálloda wellnessrészleget és ingyenes wifit is kínál</p>" +
            "<p>A szálloda éttermében mindennap kiváló reggelit, valamint ízletes magyar és nemzetközi ételeket szolgálnak fel.</p>" +
            "<p>A Mecsek lábánál elterülő Pécs 2010-ben Európa kulturális fővárosa volt. A főtér mindössze egy rövid sétára, a legfontosabb látnivalók pedig a szálloda közvetlen közelében helyezkednek el.</p>",
        description_en: "<p>Located in the historic city centre on the main shopping street of Pécs, this 3-star hotel offers a wellness area. Free Wi-Fi is available.</p>" +
            "<p>There is also a restaurant in the hotel, offering excellent breakfast every morning and fine Hungarian and international cuisine.</p>" +
            "<p>Lying at the foot of the Mecsek Mountains, Pécs was Europe's Cultural Capital 2010. The main square is only a short walk away and the most important sights of Pecs are in the immediate vicinity of Palatinus Grand Hotel.</p>",
        services_hu: "🅿️ parkolás<br> 🌼 wellness<br>  📶 ingyenes wifi<br> 🐕 állatbarát<br> 🍴 étterem",
        services_en: "🅿️ Parking<br> 🌼 Spa and wellness centre<br>  📶 Free WiFi<br> 🐕 Pets allowed<br> 🍴 Restaurant",
        telephone: "+36 72 889 462",
        email: "reservation@palatinushotel.hu",
        picture: "/~web/images/accommodations/palatinus.jpg",
        website: "https://palatinusgrandhotel.hu/",
        maps: "https://g.page/palatinusgrand?share"
    },
    {
        id: 2,
        name: "Corso Hotel Pécs",
        star: "⭐⭐⭐⭐",
        location: "7626 Pécs, Koller u. 8.",
        type_hu: "Szálloda",
        type_en: "Hotel",
        description_hu: "<p>A Corso Hotel butik stílusú, egyedileg berendezett, légkondicionált szobákat kínál tea- és kávéfőzési lehetőséggel, valamint műholdas TV-vel Pécsen. A wifi ingyenes.</p>" +
            "<p>Az étteremben magyar és nemzetközi különlegességeket, valamint a pécsi és villányi régióik borait szolgálják fel.</p>" +
            "<p>A Corso Hotel Pécs szállásától Pécs történelmi központja és a Tudásközpont könnyedén elérhető.</p>",
        description_en: "<p>The boutique-style Corso Hotel in Pécs offers individually decorated, air-conditioned rooms with tea and coffee making facilities and SAT TV. Free Wi-Fi is available.</p>"+
            "<p>The restaurant serves Hungarian and international specialities as well as wines from the Pécs and Villány regions.</p>"+
            "<p>Corso Hotel Pécs is well-connected to the historical centre of Pécs and the Knowledge Centre.</p>",
        services_hu: "📶 ingyenes wifi<br> 🐕 állatbarát<br> 🍴 étterem",
        services_en: "📶 Free WiFi<br> 🐕 Pets allowed<br> 🍴 Restaurant",
        telephone: "+36 72 421 900",
        email: "reception@corsohotel.hu",
        picture: "/~web/images/accommodations/corso.jpg",
        website: "https://corso.accenthotels.com/hu",
        maps: "https://goo.gl/maps/dy2nm3JbpTGBNgiv5"
    },
    {
        id: 3,
        name: "Hotel Makar Sport & Wellness",
        star: "⭐⭐⭐⭐",
        location: "7635 Pécs, Középmakár dűlő 4.",
        type_hu: "Szálloda",
        type_en: "Hotel",
        description_hu: "<p>A Hotel Makár Sport & Wellness épülete csendes, zöld környezetben helyezkedik el, néhány perces sétára a Pécsi Orvostudományi Egyetemtől és 2 km-re a történelmi központtól. A wifi az egész épületben ingyenes.</p>" +
            "<p>A szabadtéri úszómedencét, pezsgőfürdőt, szaunát, gőzfürdőt és beltéri medencét kínáló, nagy kiterjedésű wellnessrészlegen kívül a komplexumhoz tenisz- és fallabdapályák is tartoznak.</p>" +
            "<p>A helyszíni étteremben mindennap svédasztalos reggelit szolgálnak fel. A vendégek ebédet és vacsorát is fogyaszthatnak.</p>",
        description_en: "<p>Hotel Makar Sports & Wellness is located in a quiet, green area, a few minutes' walk from the Medical University of Pecs and 2 km from the historic centre. Free WiFi is available throughout the property.</p>"+
            "<p>Apart from an extensive wellness centre with an indoor swimming pool, a hot tub, sauna, steam room, this complex also features tennis and squash courts as well.</p>"+
            "<p>Daily buffet breakfast is served at the restaurant. Lunches and dinners are available as well.</p>",
        services_hu: "🅿️ parkolás<br> 🌼 wellness<br> 📶 ingyenes wifi<br> 🐕 állatbarát<br> 🍸 bár",
        services_en: "🅿️ Free parking<br> 🌼 Spa and wellness centre<br> 📶 Free WiFi<br> 🐕 Pets allowed<br> 🍸 Bar",
        telephone: "+36 72 783 750",
        email: "reservation@hotelmakar.hu",
        picture: "/~web/images/accommodations/makar.jpg",
        website: "https://hotelmakar.hu/",
        maps: "https://g.page/hotelmakar?share"
    },
    {
        id: 4,
        name: "Hotel Laterum",
        star: "⭐⭐⭐⭐",
        location: "7633 Pécs, Hajnoczy u. 37-39.",
        type_hu: "Szálloda",
        type_en: "Hotel",
        description_hu: "<p>A Laterum Konferencia és Wellness Hotel szállása Dél-Magyarország tudományos és gazdasági központjában, Pécsett található. A 4 csillagos szálloda egy hazai és nemzetközi találkozóknak és szimpóziumoknak gyakran otthont adó területen található.</p>" +
            "<p>A város nyugati részén, az egyetemhez közel található szálloda remek hely nemzetközi és hazai konferenciákhoz, különféle eseményekhez és esküvőkhöz egyaránt.</p>" +
            "<p>Baranya megye közigazgatási és gazdasági központja, Pécs számos ókori és középkori építészeti emlékkel rendelkezik, amelyek mind felfedezhetők az üdülés alatt.</p>",
        description_en: "<p>Situated in southern Hungary's scientific and economic centre, Pécs, this 4-star hotel is set in an area which frequently hosts domestic and international gatherings and symposiums.</p>"+
            "<p>Located in the western area of the city, close to the university, the hotel serves as a meeting place for both international and domestic conferences, various events and weddings.</p>"+
            "<p>The administrative and economical centre of Baranya county, Pècs also houses examples of Medieval architecture for you to explore during your stay.</p>",
        services_hu: "🅿️ parkolás<br> 🌼 wellness<br> 📶 ingyenes wifi<br> 🐕 állatbarát<br> 🍸 bár",
        services_en: "🅿️ Free parking<br> 🌼 Spa and wellness centre<br> 📶 Free WiFi<br> 🐕 Pets allowed<br> 🍸 Bar",
        telephone: "+36 72 252 113",
        email: "laterum@laterum.hu",
        picture: "/~web/images/accommodations/laterum.jpg",
        website: "https://laterumhotel.hu/hu/",
        maps: "https://goo.gl/maps/ygxb5Gc5p47phAGv9"
    },
    {
        id: 5,
        name: "Boutique Hotel Sopianae",
        star: "⭐⭐⭐",
        location: "7621 Pécs, Felsőmalom u. 24.",
        type_hu: "Szálloda",
        type_en: "Hotel",
        description_hu: "<p>A Boutique Hotel Sopianae szálláshelyének egy teljesen felújított, 18. századi történelmi épület ad otthont. A Pécs történelmi központjában található szálloda ingyenes wifivel ellátott szobákkal, biliárdasztallal és ingyenesen használható fitneszteremmel várja vendégeit. Az Árkád bevásárlóközpont 3 perces sétával érhető el.</p>" +
            "<p>A szálloda minden szobája légkondicionált, és hajszárítóval felszerelt saját fürdőszobával rendelkezik. Fürdőköpenyek kérésre biztosítottak.</p>" +
            "<p>A helyi látnivalók közül a Szent Péter- és Szent Pál-székesegyház, valamint a Zsolnay Múzeum egyaránt mindössze néhány percre található. A vasútállomás alig 10 perces sétára található.</p>",
        description_en: "<p>Boutique Hotel Sopianae is set in a fully renovated historic building from the 18th century. It is located in the historic centre of Pécs and offers rooms with free WiFi, access to billiard and free access to fitness facilities. The Arkad Shopping Centre is a 3-minute walk away.</p>"+
            "<p>All rooms are air-conditioned and feature a private bathroom with a hairdryer. Bathrobes can be provided upon request.</p>"+
            "<p>Sights like St. Peter and Paul Cathedral, or Zsolnay Museum are only a few minutes away from Hotel Sopianae. The Train Station can be reached within a 10-minute walk.</p>",
        services_hu: "🅿️ parkolás<br> 📶 ingyenes wifi<br> 🐕 állatbarát",
        services_en: "🅿️ Parking<br> 📶 Free WiFi<br> 🐕 Pets allowed",
        telephone: "+36 72 517 770",
        email: "info@hotelsopianae.hu",
        picture: "/~web/images/accommodations/sopianae.jpg",
        website: "https://hotelsopianae.hu/",
        maps: "https://goo.gl/maps/NuPrzQCWfBcsyuP47"
    },



];