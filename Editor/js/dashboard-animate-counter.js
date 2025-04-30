// Function to animate the number
function animateCounter(elementId, start, end, duration) {
    const element = document.getElementById(elementId);
    const range = end - start;
    const increment = range / (duration / 10);
    let current = start;
    const timer = setInterval(() => {
        current += increment;
        if (current >= end) {
            current = end; // Ensure it stops at the final number
            clearInterval(timer);
        }
        element.textContent = Math.floor(current);
    }, 10);
}
let vala = document.getElementById('vala').value;
let vala2 = document.getElementById('vala2').value;
// Trigger the animation
animateCounter("published-counter", 1, vala, 2500); // Animate from 1 to 25 over 2 seconds
animateCounter("download-counter", 1, vala2, 2500); // Animate from 1 to 25 over 2 seconds



function MostCounterAnimation() {
    let mostDownloadedBook = document.getElementById('mostDownloadedBook').value;
    animateCounter("popup-most-counter", 1, mostDownloadedBook, 2500); // Animate from 1 to 45 over 2.5 seconds
}

function LeastCounterAnimation() {
    let leastDownloadedBook = document.getElementById('leastDownloadedBook').value;
    animateCounter("popup-least-counter", 1, leastDownloadedBook, 1500); // Animate from 1 to 45 over 2.5 seconds
}
