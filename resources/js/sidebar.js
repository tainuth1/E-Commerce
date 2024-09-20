document.addEventListener("DOMContentLoaded", function () {
    const bar = document.getElementById("bar");
    const barPhone = document.getElementById("bar-phone");
    const barIpad = document.getElementById("bar-ipad");
    const sidebar = document.getElementById("sidebar");
    const textMenus = document.querySelectorAll(".text-menu");
    const dropSubs = document.querySelectorAll(".drop-sub");
    const dropBars = document.querySelectorAll(".drop-bar");
    const subMenus = document.querySelectorAll(".sub-menu");
    const chevrons = document.querySelectorAll(".chevron");

    bar.addEventListener("click", function () {
        sidebar.classList.toggle("xl:w-64");
        sidebar.classList.toggle("xl:w-20");
        setTimeout(() => {
            textMenus.forEach((textMenu) => {
                textMenu.classList.toggle("hidden");
            });
            dropSubs.forEach((dropSub) => {
                dropSub.classList.toggle("hidden");
            });
        }, 50);
        dropBars.forEach((dropBar, index) => {
            if (subMenus[index].classList.contains("block")) {
                subMenus[index].classList.toggle("hidden");
            }
        });
    });

    // Helper function to toggle visibility of text and dropSub
    function toggleMenuVisibility(isExpanded) {
        if (isExpanded) {
            setTimeout(() => {
                textMenus.forEach((textMenu) => {
                    textMenu.classList.remove("hidden");
                });
                dropSubs.forEach((dropSub) => {
                    dropSub.classList.remove("hidden");
                });
            }, 50);
        } else {
            textMenus.forEach((textMenu) => {
                textMenu.classList.add("hidden");
            });
            dropSubs.forEach((dropSub) => {
                dropSub.classList.add("hidden");
            });
        }
    }

    // Function to auto-toggle sidebar for lg screens
    function handleSidebarForLg() {
        if (window.innerWidth >= 1024 && window.innerWidth < 1280) {
            // lg screens
            if (sidebar.classList.contains("lg:w-64")) {
                toggleMenuVisibility(true); // show text and chevrons
            } else {
                toggleMenuVisibility(false); // hide text and chevrons
            }
        }
    }

    // Automatically apply sidebar behavior when the page loads or resized (for lg screens)
    handleSidebarForLg();

    // Handle window resizing (for lg screens)
    window.addEventListener("resize", function () {
        handleSidebarForLg();
    });

    // Manually toggle sidebar with barIpad click event (only for lg)
    barIpad.addEventListener("click", function () {
        sidebar.classList.toggle("lg:w-20");
        sidebar.classList.toggle("lg:w-64");
        if (sidebar.classList.contains("lg:w-64")) {
            toggleMenuVisibility(true); // show text and chevrons
        } else {
            toggleMenuVisibility(false); // hide text and chevrons
        }
    });

    barPhone.addEventListener("click", function () {
        sidebar.classList.toggle("sm:-left-64");
        sidebar.classList.toggle("sm:left-0");
    });

    // Drop-down logic for .drop-bar elements
    dropBars.forEach((dropBar, index) => {
        dropBar.addEventListener("click", function () {
            subMenus[index].classList.toggle("hidden");
            subMenus[index].classList.toggle("block");
            chevrons[index].classList.toggle("rotate-180");
        });
    });
});
