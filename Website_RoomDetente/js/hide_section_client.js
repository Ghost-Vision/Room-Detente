// Buttons
const buttonInfos = document.getElementById("buttonInfos");
const buttonNews = document.getElementById("buttonNews");
const buttonOrder = document.getElementById("buttonOrder");

// Sections
const dInfo = document.getElementById("dInfo");
const dNews = document.getElementById("dNews");
const dOrder = document.getElementById("dOrder");


buttonInfos.addEventListener("click", event =>
    {
        dInfo.style.display = "block";

        dOrder.style.display = "none";
        dNews.style.display = "none";
    }
)
buttonOrder.addEventListener("click", event =>
    {
        dOrder.style.display = "block";

        dInfo.style.display = "none";
        dNews.style.display = "none";
    }
)
buttonNews.addEventListener("click", event =>
    {
        dNews.style.display = "block";

        dOrder.style.display = "none";
        dInfo.style.display = "none";
    }
)