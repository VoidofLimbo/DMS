var sideBar = document.getElementById("mobile-nav");
var openSidebar = document.getElementById("openSideBar");
var closeSidebar = document.getElementById("closeSideBar");
sideBar.style.transform = "translateX(-260px)";

function sidebarHandler(flag) {
    sideBar.style.transform = (flag)  ? "translateX(0px)": "translateX(-260px)";

    closeSidebar.classList.toggle("hidden");
    openSidebar.classList.toggle("hidden");
}
