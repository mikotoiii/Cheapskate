/* 
 * TODO Ideas:
 * 
 * Countdown to close
 * Countdown to end of special
 * Driving/walking time
 * countdown to end of special including driving/walking time
 * Indicator if the special is currently in progress (and the countdown time remaining)
 *  Change color for those in progress
 * Socmed integration (checkin, share, etc.)
 * 
 * "Stop for smokes" waypoint
 * Subway/Pizza on the way home waypoint
 * Sticky walking/driving maps toggle
 * Click venue for our details, map, directions on one page
 * User reviews
 *  
 */


var testData = {
    days: [
        {
            day: 0,
            deals: [
                {
                    venue: "Grannans",
                    category: "drinks",
                    type: "bogo",
                    price: "",
                    saving: "",
                    info: "Two for one anything you can't carry!",
                    timeStart: 2100,
                    timeEnd: 2200,
                    applicableDays: "",
                    oneWeekOnly: "",
                    hasCover: false,
                    coverAmount: 0
                },
                {
                    venue: "Steamers",
                    category: "food",
                    type: "offer",
                    info: "Barely poison",
                    timeStart: 2100,
                    timeEnd: 2200
                },
                {
                    venue: "Peppers",
                    category: "drinks",
                    type: "2-Can-Dine",
                    info: "2 kan dine fer regaler pric",
                    timeStart: 2100,
                    timeEnd: 2200
                }
            ]
        },
        {
            day: 1,
            deals: [
                {
                    venue: "Peppers",
                    category: "food",
                    type: "Apps",
                    info: "1 for 1 appos with purchase of many full-price drinks!",
                    timeStart: 2100,
                    timeEnd: 2200
                }
            ]
        }
    ]
};

/*
var venueData = [
    {
        id: 0,
        name: "Grannans",
        city: "Saint John",
        province: "NB",
        address: "1 Market Square",
        website: "",
        hipFactor: 2,
        scaryFactor: 2,
        musicType: "",
        hasLiveMusic: ""
    }, 
    {
        id: 1,
        name: "Peppers",
        city: "Saint John",
        details: "Peppers pub is a flaming shithole at the bottom of a pissy pit.",
        province: "NB",
        address: "1 Market Square",
        hipFactor: 12,
        scaryFactor: 0
    },
    {
        id: 3,
        name: "Steamers",
        city: "Saint John",
        province: "NB",
        address: "4 Water Street",
        hipFactor: 0,
        scaryFactor: 0
    }
];
*/