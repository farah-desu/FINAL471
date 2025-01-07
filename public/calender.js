let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();

const day = document.querySelector(".calendar-dates");
const currdate = document.querySelector(".calendar-current-date");
const prenexIcons = document.querySelectorAll(".calendar-navigation span");

// Array of month names
const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

// Mock dynamic data for study hours (replace with backend data as needed)
let studyData = {
    "2024-12": { // Example for December 2024
        "17": 2,
        "18": 5,
        "19": 8,
        "20": 3,
        "21": 10,
        "22": 6,
        "23": 14,
    },
    "2024-11": { // Example for November 2024
        "15": 7,
        "20": 5,
        "30": 9
    }
};

// Fixed gradient colors for specific study hours
const colorMapping = [
    { hours: 3, color: "rgb(210, 210, 240)" },
    { hours: 5, color: "rgb(255, 210, 230)" },
    { hours: 10, color: "rgb(255, 180, 190)" },
    { hours: 12, color: "rgb(255, 120, 150)" },
    { hours: 14, color: "rgb(255, 80, 100)" }
];

// Function to get the color based on hours studied
const getColorForHours = (hours) => {
    for (let i = colorMapping.length - 1; i >= 0; i--) {
        if (hours >= colorMapping[i].hours) {
            return colorMapping[i].color;
        }
    }
    return "#FFFFFF"; // Default white for 0 hours
};

// Function to generate the calendar
const manipulate = () => {
    let dayone = new Date(year, month, 1).getDay();
    let lastdate = new Date(year, month + 1, 0).getDate();
    let dayend = new Date(year, month, lastdate).getDay();
    let monthlastdate = new Date(year, month, 0).getDate();

    let lit = "";

    // Get study data for the current month
    const currentMonthData = studyData[`${year}-${String(month + 1).padStart(2, "0")}`] || {};

    // Previous month's days
    for (let i = dayone; i > 0; i--) {
        lit += `<li class="inactive">${monthlastdate - i + 1}</li>`;
    }

    // Current month's days
    for (let i = 1; i <= lastdate; i++) {
        let isToday = i === date.getDate() && month === new Date().getMonth() && year === new Date().getFullYear() ? "active" : "";
        let hours = currentMonthData[i] || 0; // Get study hours for the day or default to 0
        let bgColor = getColorForHours(hours); // Get color based on hours
        lit += `<li class="${isToday}" style="background-color: ${bgColor}">${i}</li>`;
    }

    // Next month's days
    for (let i = dayend; i < 6; i++) {
        lit += `<li class="inactive">${i - dayend + 1}</li>`;
    }

    currdate.innerText = `${months[month]} ${year}`;
    day.innerHTML = lit;
};

manipulate();

// Attach event listeners for navigation
prenexIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        month = icon.id === "calendar-prev" ? month - 1 : month + 1;

        if (month < 0 || month > 11) {
            date = new Date(year, month, new Date().getDate());
            year = date.getFullYear();
            month = date.getMonth();
        } else {
            date = new Date();
        }

        manipulate();
    });
});
