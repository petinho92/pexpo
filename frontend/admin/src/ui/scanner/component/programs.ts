export let programs = [
    {
        id: 1, time: "2023.04.13", room: [
            {
                id: 1, room: "Hamerli terem", phase: [
                    {
                        id: 1, phase: [
                            {id: 1, time: "9:30-12:00", phaseName: "Plenáris ülés"},
                            {id: 2, time: "12:30-12:00", phaseName: "Plenáris ülés"},
                        ]
                    }
                ]
            },
            {id: 2, room: "Vigan terem", phase: [{id: 1, phase: ""}]},
            {id: 3, room: "1. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 4, room: "3. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 5, room: "4. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 6, room: "6. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 7, room: "7. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 8, room: "8. szekcióterem", phase: [{id: 1, phase: ""}]},
        ]
    },
    {
        id: 2, time: "2023.04.14", room: [
            {id: 1, room: "Hamerli terem", phase: [{id: 1, phase: ""}]},
            {id: 2, room: "1. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 3, room: "3. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 4, room: "4. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 5, room: "6. szekcióterem", phase: [{id: 1, phase: ""}]},
            {id: 6, room: "7. szekcióterem", phase: [{id: 1, phase: ""}]},
        ]
    }
];

export let scannerData = [
    {id: 1, date: "2023.04.13.", room: "Hamerli terem", phase: "Plenáris Előadás", time: "9:30-12:00"},
    {id: 2, date: "2023.04.13.", room: "7. szekcióterem", phase: "Építészeti szakmai előadások", time: "13:00-18:20"},
    {
        id: 3,
        date: "2023.04.13.",
        room: "8. szekcióterem",
        phase: "Építőmérnöki szakmai előadások",
        time: "13:00-18:00"
    },
    {
        id: 4,
        date: "2023.04.13.",
        room: "Hamerli terem",
        phase: "Épületgépészeti szakmai előadások",
        time: "12:30-16:15"
    },
    {id: 5, date: "2023.04.13.", room: "3. szekcióterem", phase: "Gépészeti szakmai előadások", time: "12:30-16:15"},
    {
        id: 6,
        date: "2023.04.13.",
        room: "6. szekcióterem",
        phase: "Alkalmazott informatikai szakmai előadások",
        time: "13:00-17:05"
    },
    {
        id: 7,
        date: "2023.04.13.",
        room: "4. szekcióterem",
        phase: "Környezetipari, labortechnikai szakmai előadások",
        time: "13:00-16:25"
    },
    {
        id: 7,
        date: "2023.04.13.",
        room: "1. szekcióterem",
        phase: "Villamos energetika szakmai előadások",
        time: "13:00-16:10"
    },
    {id: 8, date: "2023.04.14.", room: "4. szekcióterem", phase: "A PTE MIK szakmérnöki képzései", time: "9:00-10:55"},
    {id: 9, date: "2023.04.14.", room: "8. szekcióterem", phase: "A PTE MIK szakmérnöki képzései", time: "9:00-11:20"},
    {
        id: 10,
        date: "2023.04.14.",
        room: "3. szekcióterem",
        phase: "Construction technologies section",
        time: "9:00-12:30"
    },
    {id: 11, date: "2023.04.14.", room: "7. szekcióterem", phase: "Építészeti szakmai előadások", time: "9:00-13:25"},
    {
        id: 12,
        date: "2023.04.14.",
        room: "Hamerli terem",
        phase: "Épületgépészeti szakmai előadások",
        time: "9:00-12:00"
    },
    {
        id: 13,
        date: "2023.04.14.",
        room: "6. szekcióterem",
        phase: "Alkalmazott informatikai szakmai előadások",
        time: "9:00-11:55"
    },
    {
        id: 14,
        date: "2023.04.14.",
        room: "1. szekcióterem",
        phase: "Villamosipari és informatikai szakmai előadások",
        time: "9:00-11:55"
    },
    {
        id: 15,
        date: "2023.04.14.",
        room: "Céglátogató túra",
        phase: "Céglátogató túra",
        time: "-"
    },
    {
        id: 16,
        date: "2023.04.13.",
        room: "Céglátogató túra",
        phase: "Céglátogató túra",
        time: "-"
    },
];

export let days = [
    {id: 1, name: "2023.04.13.", day:"Csütörtök"},
    {id: 2, name: "2023.04.14.", day:"Péntek"}
];

export let rooms = [
    {id: 1, name: "1. szekcióterem"},
    {id: 2, name: "3. szekcióterem"},
    {id: 3, name: "4. szekcióterem"},
    {id: 4, name: "6. szekcióterem"},
    {id: 5, name: "7. szekcióterem"},
    {id: 6, name: "8. szekcióterem"},
    {id: 7, name: "Céglátogató túra"},
    {id: 8, name: "Hamerli terem"},
];