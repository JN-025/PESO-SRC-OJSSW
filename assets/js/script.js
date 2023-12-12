const datePickerInput = document.getElementById('birthday');
  const datepickerCalendar = document.getElementById('datepicker');

  datePickerInput.addEventListener('focus', showDatePicker);

  function showDatePicker() {
    datepickerCalendar.style.display = 'block';
    renderCalendar();
  }

  function renderCalendar() {
    // You can implement calendar rendering logic here
    // For simplicity, I'll just show a static calendar for the current month
    const currentDate = new Date();
    const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

    let calendarHTML = '<table>';
    calendarHTML += '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';
    calendarHTML += '<tr>';

    for (let day = 1; day <= daysInMonth; day++) {
      const dayOfWeek = new Date(currentDate.getFullYear(), currentDate.getMonth(), day).getDay();
      if (dayOfWeek === 0 && day !== 1) {
        calendarHTML += '</tr><tr>';
      }
      calendarHTML += `<td>${day}</td>`;
    }

    calendarHTML += '</tr>';
    calendarHTML += '</table>';

    datepickerCalendar.innerHTML = calendarHTML;
  }