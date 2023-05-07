/**
 * @param {Date} endsAt
 * @param {string} id
 */
function startCountdown(endsAt, id) {
    const elem = document.getElementById(id);
    const now = endsAt.getDate() - Date.now();
    setInterval(function () {
        elem.innerText = formatTimeToCountdown((new Date(now).getDate()) / 1000);
    }, 1000);
}

function formatTimeToCountdown(timestamp) {
    let totalSeconds = timestamp;
    let hours = Math.floor(totalSeconds / 3600);
    totalSeconds %= 3600;
    let minutes = Math.floor(totalSeconds / 60);
    let seconds = totalSeconds % 60;

    if (hours < 10) {
        hours = "0" + hours;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    if (seconds < 10) {
        seconds = "0" + seconds;
    }

    return hours + ":" + minutes + ":" + seconds;
}
