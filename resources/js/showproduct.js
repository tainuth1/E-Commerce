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
    const deleteModal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');
    const cancelBtn = document.getElementById('cancelBtn');

    // Function to show the modal with transition
    function showModal() {
        deleteModal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.add('scale-100'); // Scale from 0 to normal size
        }, 10); // Slight delay to trigger transition
    }

    // Function to close the modal
    function closeModal() {
        modalContent.classList.remove('scale-100'); // Scale back to 0
        setTimeout(() => {
            deleteModal.classList.add('hidden');
        }, 100); // Wait for the scale-down animation to finish
    }

    // Attach event listeners to all delete buttons
    deleteBtns.forEach((btn) => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            showModal();
        });
    });

    // Close the modal on clicking cancel or background
    cancelBtn.addEventListener('click', closeModal);

    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) { // Check if clicked outside the modal content
            closeModal();
        }
    });
});

