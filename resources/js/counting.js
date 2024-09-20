const counters = document.querySelectorAll('.value-number');

counters.forEach(counter => {
    const target = +counter.getAttribute('data-target');
    const isDollarCounter = counter.textContent.trim().startsWith('$');
    let count = 0;
    const duration = 2000; // 2 seconds
    const increment = target / (duration / 16); // assuming 60 frames per second

    function updateCounter() {
        count += increment;
        if (count < target) {
            counter.textContent = isDollarCounter ? `$${Math.ceil(count)}` : Math.ceil(count);
            requestAnimationFrame(updateCounter);
        } else {
            counter.textContent = isDollarCounter ? `$${target}` : target;
        }
    }

    requestAnimationFrame(updateCounter);
});