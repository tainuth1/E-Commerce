const showActions = document.querySelectorAll('.show-action');
const actions = document.querySelectorAll('.action');

showActions.forEach((showAction, index) => {
    showAction.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevents triggering the document click event
        actions.forEach((action, i) => {
            if (i !== index) {
                action.classList.remove('block');
                action.classList.add('hidden'); // Hide other actions
            }
        });
        actions[index].classList.toggle('block');
        actions[index].classList.toggle('hidden');
    });
});

// Close action when clicking outside
document.addEventListener('click', (e) => {
    actions.forEach((action) => {
        if (!action.contains(e.target)) { // If click is outside the action
            action.classList.remove('block');
            action.classList.add('hidden');
        }
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const deleteBtns = document.querySelectorAll('.deleteBtn');
    const cancelBtns = document.querySelectorAll('.cancelBtn');

    // Function to show the modal with transition
    function showModal(modalId) {
        const deleteModal = document.querySelector(modalId);
        const modalContent = deleteModal.querySelector('[id^="modalContent"]');
        deleteModal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.add('scale-100'); // Scale from 0 to normal size
        }, 10); // Slight delay to trigger transition

        // Close modal when clicking outside of modal content
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                closeModal(modalId);
            }
        });
    }

    // Function to close the modal
    function closeModal(modalId) {
        const deleteModal = document.querySelector(modalId);
        const modalContent = deleteModal.querySelector('[id^="modalContent"]');
        modalContent.classList.remove('scale-100'); // Scale back to 0
        setTimeout(() => {
            deleteModal.classList.add('hidden');
        }, 100); // Wait for the scale-down animation to finish
    }

    // Attach event listeners to all delete buttons
    deleteBtns.forEach((btn) => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const targetModalId = btn.getAttribute('data-target');
            showModal(targetModalId);
        });
    });

    // Close the modal on clicking cancel
    cancelBtns.forEach((btn) => {
        btn.addEventListener('click', function(e) {
            const modalId = '#' + e.target.closest('[id^="deleteModal"]').id;
            closeModal(modalId);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const alertBox = document.getElementById('alert');
    const closeButton = document.getElementById('close-alert');

    alertBox.classList.add('transform', 'translate-y-[-100%]', 'transition-transform', 'duration-300');
    setTimeout(() => {
        alertBox.classList.remove('translate-y-[-100%]');
    }, 100);

    closeButton.addEventListener('click', function() {
        alertBox.classList.add('translate-y-[-100%]');
        setTimeout(() => {
            alertBox.classList.add('hidden');
        }, 200);
    });
});
