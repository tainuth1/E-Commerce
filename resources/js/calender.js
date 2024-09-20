const calendarBody = document.getElementById('calendarBody');
const currentMonth = document.getElementById('currentMonth');
const prevMonthBtn = document.getElementById('prevMonth');
const nextMonthBtn = document.getElementById('nextMonth');

let date = new Date();
let month = date.getMonth();
let year = date.getFullYear();
let today = new Date(); // Store today's date

// Function to render the calendar days
function renderCalendar(month, year) {
    calendarBody.innerHTML = ''; // Clear previous calendar
    const firstDay = new Date(year, month).getDay(); // Day of the week the month starts on
    const daysInMonth = new Date(year, month + 1, 0).getDate(); // Total days in the current month

    currentMonth.textContent = date.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });

    let dayCount = 1;
    for (let i = 0; i < 6; i++) {
        const row = document.createElement('tr');

        for (let j = 1; j <= 7; j++) {
            const cell = document.createElement('td');
            cell.classList.add('pt-5');
            const dayContainer = document.createElement('div');
            dayContainer.classList.add('px-2', 'py-2', 'cursor-pointer', 'flex', 'w-full', 'justify-center');

            // Skip days before the start of the month
            if (i === 0 && j < firstDay || dayCount > daysInMonth) {
                row.appendChild(cell);
                continue;
            }

            const dayText = document.createElement('p');
            dayText.classList.add('text-base', 'text-white-500', 'dark:text-gray-100', 'font-medium');
            dayText.textContent = dayCount;

            // Check if the current day is today
            if (
                dayCount === today.getDate() &&
                month === today.getMonth() &&
                year === today.getFullYear()
            ){
                dayContainer.classList.add('bg-blue-600', 'text-white', 'rounded-full'); // Add highlight class for today
            }

            dayContainer.appendChild(dayText);
            cell.appendChild(dayContainer);
            row.appendChild(cell);

            dayCount++;
        }

        calendarBody.appendChild(row);
    }
}

// Initial render
renderCalendar(month, year);

// Navigation
prevMonthBtn.addEventListener('click', () => {
    if (month === 0) {
        month = 11;
        year--;
    } else {
        month--;
    }
    date.setMonth(month);
    date.setFullYear(year);
    renderCalendar(month, year);
});

nextMonthBtn.addEventListener('click', () => {
    if (month === 11) {
        month = 0;
        year++;
    } else {
        month++;
    }
    date.setMonth(month);
    date.setFullYear(year);
    renderCalendar(month, year);
});